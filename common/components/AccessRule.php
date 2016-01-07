<?php
namespace common\components;
 
use Yii;
use common\models\User;
use common\models\UserType;
use common\models\RoleMaster;
use common\models\RoleAction;

class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    static function userAccess()
    {
       $action = Yii::$app->controller->action->id;
       $controller = Yii::$app->controller->id; 
       $userid = Yii::$app->user->id;
       $user = User::find()->select('user_type_id')->where(['id'=>$userid])->one();
       if($user->user_type_id == 1) {
           return [strtolower($action)];
       }
       $roleAction = RoleAction::find()->where(['action_name'=>strtolower($action) , 'controller_name'=>strtolower($controller)])->one();
       if(!empty($roleAction)){
           $actionPermission = RoleMaster::find()->where(['role_action_id'=>$roleAction->id , 'user_type_id'=>$user->user_type_id])->one();
           if(!empty($actionPermission)){
                return [strtolower($action)];
           } else {
               return [''];
           }
       } else {
           return [strtolower($action)];
       }
       
    }
    
    /**
     * @inheritdoc
     */
    static function accessRule($controller = '' , $action = '')
    {
       $userid = Yii::$app->user->id;
       $user = User::find()->select('user_type_id')->where(['id'=>$userid])->one();
       if($user->user_type_id == 1) {
           return true;
       }
       $roleAction = RoleAction::find()->where(['action_name'=>strtolower($action) , 'controller_name'=>strtolower($controller)])->one();
       if(!empty($roleAction)){
           $actionPermission = RoleMaster::find()->where(['role_action_id'=>$roleAction->id , 'user_type_id'=>$user->user_type_id])->one();
           if(!empty($actionPermission)){
                return true;
           } else {
               return false;
           }
       } else {
           return true;
       }
       
    }
}