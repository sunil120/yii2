<?php
namespace common\components;

use Yii;
use common\models\User;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\components\RestHttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use Firebase\JWT\JWT;
use yii\base\ErrorException;


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
        Yii::$app->response->format = 'json';
        
    }
    
    protected function verbs()
    {
        
        return [
            'index' => ['GET'],
            'view' => ['GET'],
            'create' => ['POST'],
            'update' => ['POST'],
            'delete' => ['DELETE'],
        ];
    }
 
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(), [
                'authenticator' => [
                    'class' => RestHttpBasicAuth::className(),
                    'except' => ['login'],
                ],
                'contentNegotiator' => [
                    'class' => ContentNegotiator::className(),
                    'formats' => [
                        'application/json' => Response::FORMAT_JSON,
                        'application/xml' => Response::FORMAT_XML,
                    ],
                ],
               
            ]
        );
    }
    
}


