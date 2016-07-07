<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\filters\VerbFilter;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

/**
 * Api controller
 */
class ApiController extends ActiveController
{
    public $modelClass = "common\models\User";
    
        public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    private $format = 'json';
    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
    }
    
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(), [
                'authenticator' => [
                    'class' => HttpBasicAuth::className(),
                    'except' => ['create', 'login', 'resetpassword'],
                    
                ],
                'contentNegotiator' => [
                    'class' => ContentNegotiator::className(),
                    'formats' => [
                        'application/json' => Response::FORMAT_JSON,
                        'application/xml' => Response::FORMAT_XML,
                    ],
                ],
                //['contentNegotiator']['formats']['text/html'] => Response::FORMAT_HTML
            ]
        );
    }
    
    public function actions()
    {
        
        $actions = parent::actions();
        unset($actions['create'],$actions['delete']);
        return $actions;
    }
    
   
    
    public function actionLogin()
    {
        $post = Yii::$app->request->post();
        if(!empty($post)){
            $model = User::findOne(["username" => $post["username"]]);
            if (empty($model)) {
                throw new NotFoundHttpException('Username is invalid.');
            }
            if ($model->validatePassword($post["password_hash"])) {
                $model->updated_at = Yii::$app->formatter->asTimestamp(date_create());
                $model->access_token = Yii::$app->security->generateRandomString();
                $model->save(false);
                return $data = array("BasicAuth Username"=>$model->getAccessToken()); 
              //  $this->_sendResponse(200, 'login successful',$data);
            } else {
                throw new NotFoundHttpException('The password you have entred is invalid.');
            }
        } else {
            throw new ForbiddenHttpException('You are requesting with an invalid credential.    ');
        }
    }
    
    public function actionIndex(){
        return new ActiveDataProvider([
            'query' => User::find(),
        ]);
    }
    
    
    public function actionView($id){
        return User::findOne($id);
    }
    
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        if($model->delete()) { 
            $this->setHeader(200);
            echo json_encode(array('status'=>1,'Message'=>'Records has been deleted seccessfully.'),JSON_PRETTY_PRINT);
        }
        else
        {
        $this->setHeader(400);
        echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
        }
    }
    
    /**
     * Update an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        echo $id; die;
    }
    
     
    /**
     * Update an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionCreate()
    {
        $params=Yii::$app->request->post();
        $model = new User();
        $model->attributes=$params;
        //echo "<pre>"; print_r($params); die;
        if ($model->save()) {
            $this->setHeader(200);
            echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);
        } else{

            $this->setHeader(400);
            echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
        }
    }
    
    /**
    * Finds the User model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return User the loaded model
    */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {

          $this->setHeader(400);
          echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'Bad request'),JSON_PRETTY_PRINT);
          exit;
        }
    }
 
    private function setHeader($status)
    {

    $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
    $content_type="application/json; charset=utf-8";

    header($status_header);
    header('Content-type: ' . $content_type);
    header('X-Powered-By: ' . "Nintriva <nintriva.com>");
    }
    
    
    private function _getStatusCodeMessage($status)
    {
    // these could be stored in a .ini file and loaded
    // via parse_ini_file()... however, this will suffice
    // for an example
    $codes = Array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
    );
    return (isset($codes[$status])) ? $codes[$status] : '';
    }
}


