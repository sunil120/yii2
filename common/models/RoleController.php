<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "role_controller".
 *
 * @property integer $id
 * @property string $title
 *
 * @property RoleAction[] $roleActions
 */
class RoleController extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_controller';
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
        return $this->hasMany(RoleAction::className(), ['controller_id' => 'id']);
    }
}
