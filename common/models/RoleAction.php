<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_action".
 *
 * @property integer $id
 * @property integer $module_id
 * @property integer $controller_id
 * @property string $action_name
 *
 * @property RoleController $controller
 * @property RoleModule $module
 * @property RoleMaster[] $roleMasters
 */
class RoleAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module_name', 'controller_name', 'action_name'], 'required'],
            [['action_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module_id' => 'Module ID',
            'controller_id' => 'Controller ID',
            'action_name' => 'Action Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getController()
    {
        return $this->hasOne(RoleController::className(), ['id' => 'controller_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(RoleModule::className(), ['id' => 'module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleMasters()
    {
        return $this->hasMany(RoleMaster::className(), ['role_action_id' => 'id']);
    }
}
