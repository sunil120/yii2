<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_master".
 *
 * @property integer $id
 * @property integer $role_action_id
 * @property integer $user_type_id
 *
 * @property RoleAction $roleAction
 * @property UserType $userType
 */
class RoleMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_action_id', 'user_type_id'], 'required'],
            [['role_action_id', 'user_type_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_action_id' => 'Role Action ID',
            'user_type_id' => 'User Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleAction()
    {
        return $this->hasOne(RoleAction::className(), ['id' => 'role_action_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }
}
