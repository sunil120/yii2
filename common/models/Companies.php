<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $company_address
 * @property string $company_email
 * @property string $created_dt
 * @property integer $status
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_address', 'company_email', 'created_dt', 'status'], 'required'],
            [['created_dt'], 'safe'],
            [['company_name'], 'unique', 'targetAttribute' => ['company_name']],
            [['status'], 'integer'],
            [['company_name', 'company_address', 'company_email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'company_address' => 'Company Address',
            'company_email' => 'Company Email',
            'created_dt' => 'Created Dt',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['company_id' => 'id']);
    }
}
