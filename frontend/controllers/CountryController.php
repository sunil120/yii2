<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\web\Response;
use common\components\ApiController;
use common\components\RestHttpBasicAuth;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use Firebase\JWT\JWT;
use yii\rest\ActiveController;

/**
 * Api controller
 */
class CountryController extends ActiveController
{
    public $modelClass = "common\models\Country";
    
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
       
    private $format = 'json';
    public function init()
    {
        parent::init();
    }
  
}


