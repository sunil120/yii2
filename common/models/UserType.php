<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property integer $id
 * @property string $title
 * @property integer $status
 * @property string $created_dt
 *
 * @property RoleMaster[] $roleMasters
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status', 'created_dt'], 'required'],
            [['status'], 'integer'],
            [['created_dt'], 'safe'],
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
            'status' => 'Status',
            'created_dt' => 'Created Dt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleMasters()
    {
        return $this->hasMany(RoleMaster::className(), ['user_type_id' => 'id']);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasMany(User::className(), ['user_type_id' => 'id']);
    }
}
