<?php

namespace backend\controllers;

use Yii;
use common\models\RoleAction;
use common\models\RoleMaster;
use common\models\RoleModule;
use common\models\RoleMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\AccessRule;

/**
 * RolemasterController implements the CRUD actions for RoleMaster model.
 */
class RolemasterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                       [
                           'actions' => AccessRule::userAccess(),
                           'allow' => true,
                           // Allow users, moderators and admins to create
                          
                       ],
                    ],   
                ],              
            ];
    }

    /**
     * Lists all RoleMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RoleMaster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RoleMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        
        $model = new RoleMaster();
        if ($model->load(Yii::$app->request->post())) {
            if(isset(Yii::$app->request->post()['RoleMaster']['action']) && !empty(Yii::$app->request->post()['RoleMaster']['action'])){
                $user_typeid = $model->user_type_id;
                RoleMaster::deleteAll('user_type_id = :user_type_id', [':user_type_id' => $user_typeid]);
                foreach (Yii::$app->request->post()['RoleMaster']['action'] as $action){
                    $model = new RoleMaster();
                    $model->user_type_id = $user_typeid;
                    $model->role_action_id = $action;
                    $model->save();
                }
            }
            return $this->redirect(['usertype/index']);
        } else {
            $tree_view = $this->getTreeModuleView($id);
            $model->user_type_id = $id;
            return $this->render('create', [
                'model' => $model,
                'tree_view'=>$tree_view
            ]);
        }
    }

    /**
     * Updates an existing RoleMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RoleMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RoleMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoleMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoleMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function getTreeModuleView($user_type_id = ''){
        $html_tree_view	=  "";
        $m = 1;
        $c = 1;
        $a = 1;
        $roleModule = RoleAction::find()->select('module_name')->groupBy('module_name')->all();
        if(!empty($roleModule)){
            $html_tree_view.='<div class="row">';
            foreach ($roleModule as $key => $module) {
                $module_name = $module->module_name;
                $html_tree_view.='<div class="col-md-12">';
                $html_tree_view.='<li id="module_'.$module_name.'">';
                $html_tree_view.='<input type="checkbox" id="'.$module_name.$m.'" class="module_group" name="RoleMaster[module][]" value="'.$module_name.'"/> ';
                $html_tree_view.='<label for="'.$module_name.$m.'">'.ucfirst($module_name).'</label>';
                $roleController = RoleAction::find()->select('controller_name')->where(['module_name'=>$module_name])->groupBy('controller_name')->all();
                if(!empty($roleController)){
                    $html_tree_view.='<ul>';
                    $html_tree_view.='<div class="row">';
                    $ca = 1;
                    foreach ($roleController as $key => $controller) {
                        $controller_name = $controller->controller_name;
                        if($ca == 4){
                            $ca = 1;
                            $html_tree_view.='</div><div class="row"><div class="col-md-4">';
                        } else {
                        $html_tree_view.='<div class="col-md-4">';
                        }
                        $html_tree_view.='<li>';
                        $html_tree_view.='<i class="icon-file"></i>';
                        $html_tree_view.='<input id="'.$controller_name.$m.$c.'" type="checkbox" class="controller_group" ref="main_grp'.$controller_name.'" name="RoleMaster[controller][]" value="'.$controller_name.'"/> ';
                        $html_tree_view.='<label for="'.$controller_name.$m.$c.'">'.ucfirst($controller_name).'</label>';
                        
                        $roleAction = RoleAction::find()->select('id,action_name')->where(['controller_name'=>$controller_name , 'module_name'=>$module_name])->groupBy('action_name')->all();
                        if(!empty($roleAction)){
                            $html_tree_view.='<ul>';
                            foreach ($roleAction as $key => $action) {
                                $action_name = $action->action_name;
                                $actionPermission = RoleMaster::find()->where(['role_action_id'=>$action->id , 'user_type_id'=>$user_type_id])->one();
                                $html_tree_view.='<li>';
                                $html_tree_view.='<i class="icon-file"></i>';
                                //if(empty($actionPermission)){echo 1; die;}
                                $action_check   = !empty($actionPermission) ? 'checked="checked"':'';  
                                $html_tree_view.='<input id="'.$action_name.$m.$c.$a.'" type="checkbox" class="action_group" ref="main_grp'.$action_name.'" name="RoleMaster[action][]" value="'.$action->id.'" '.$action_check.'/> ';
                                $html_tree_view.='<label for="'.$action_name.$m.$c.$a.'">'.ucfirst($action_name).'</label>'; 
                                $html_tree_view.='</li>';
                                $a++;
                            }
                            $html_tree_view.='</ul>';
                        }
                        $html_tree_view.='</li>';
                        $html_tree_view.='</div>';
                        $c++;
                        $ca++;
                    }
                    $html_tree_view.='</ul>';
                }
                $html_tree_view.='</li>';
                $html_tree_view.='</div>';
                $m++;
            }
        }
        $html_tree_view.='</div></div>';
        
       return $html_tree_view;
    }
}
