<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_module".
 *
 * @property integer $id
 * @property string $title
 *
 * @property RoleAction[] $roleActions
 */
class RoleModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleActions()
    {
        return $this->hasMany(RoleAction::className(), ['module_id' => 'id']);
    }
}
