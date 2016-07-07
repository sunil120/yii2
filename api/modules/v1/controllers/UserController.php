<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Response;
use common\components\ApiController;
use common\components\RestHttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use Firebase\JWT\JWT;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

/**
 * Api controller
 */
class UserController extends ApiController
{
    public $modelClass = "common\models\User";
    
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    
    
    public function init()
    {
        parent::init();
        
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create'],$actions['update'] , $actions['index']);
        return $actions;
    }
    
    
    /*Create user and upload file*/
    public function actionCreate(){
        $model = new User();
        $model->scenario = 'create';
        $users['User'] = Yii::$app->request->post(); 
        if (Yii::$app->request->isPost && $model->load($users)) {
            $model->password_hash = Yii::$app->request->post('password');
            if(!empty($_FILES)) {
                $upload = new UploadedFile();
                $upload->name = $_FILES['image']['name'];
                $upload->type = $_FILES['image']['type'];
                $upload->tempName = $_FILES['image']['tmp_name'];
                $upload->error = $_FILES['image']['error'];
                $upload->size = $_FILES['image']['size'];
                $model->image = $upload;
                $filepath = Yii::getAlias('@uploadpath'); 
                $model->image->saveAs($filepath.'/'.$model->image->baseName . '.' . $model->image->extension);
                $model->setImage($model->image->name ,FALSE);
            }
            if($model->save()){
                return $model;
            } else {
                return $model->getErrors();
            }
        } else {
             throw new ForbiddenHttpException('User is not saved successfully. Please try again with proper details.');
        }
    }
    
    /*Update user and upload file*/
    public function actionUpdate($id){
        $model = User::findOne($id);
        $old_password = $model->password_hash; 
        $users['User'] = Yii::$app->request->post(); 
        if (Yii::$app->request->isPost && $model->load($users)) {
            if(Yii::$app->request->post('password') == '') {
               $model->password_hash =  $old_password;
            } else {
                $model->setPassword(Yii::$app->request->post('password'));
            }
            if(!empty($_FILES)) {
                $upload = new UploadedFile();
                $upload->name = $_FILES['image']['name'];
                $upload->type = $_FILES['image']['type'];
                $upload->tempName = $_FILES['image']['tmp_name'];
                $upload->error = $_FILES['image']['error'];
                $upload->size = $_FILES['image']['size'];
                $model->image = $upload;
                $filepath = Yii::getAlias('@uploadpath'); 
                $model->image->saveAs($filepath.'/'.$model->image->baseName . '.' . $model->image->extension);
                $model->setImage($model->image->name ,FALSE);
            }
            if($model->save()){
                return $model;
            } else {
                return $model->getErrors();
            }
        } else {
             throw new ForbiddenHttpException('User is not updated successfully. Please try again with proper details.');
        }
    }
    
     /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider;
    }
    
   
    /* Create access token*/
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
        if(!empty($post["username"]) && !empty($post["password"])) {
            $model = User::findOne(["username" => $post["username"]]);
            if (empty($model)) {
                throw new NotFoundHttpException('Username is invalid.');
            }
            if ($model->validatePassword($post["password"])) {
                $base_token = JWT::encode($model, Yii::$app->params['security-salt']);
                $data = array(
                    'username' => $model->username,
                    'token' => $base_token,
                );
                $token = JWT::encode($data, Yii::$app->params['security-salt']);
                $model->updated_at = Yii::$app->formatter->asTimestamp(date_create());
                $model->access_token = $base_token;
                $model->save(false);
                return $data = array("X-ApiToken"=>$token); 
            } else {
                throw new NotFoundHttpException('The password you have entred is invalid.');
            }
        } else {
            throw new ForbiddenHttpException('You are requesting with an invalid credential.Please enter correct username and password');
        }
    }
    
    /* Error page for api request
     * (commented for future use) 
     */
    
    public function actionError(){
        echo json_encode(array('status'=>0,'error_code'=>404,'errors'=>'Page not found.'),JSON_PRETTY_PRINT);
    }
    
        
}


