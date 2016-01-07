<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $branch_name
 * @property string $branch_address
 * @property string $created_dt
 * @property integer $status
 *
 * @property Companies $company
 * @property Departments[] $departments
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'branch_name', 'branch_address', 'created_dt', 'status'], 'required'],
            [['company_id', 'status'], 'integer'],
            [['created_dt'], 'safe'],
            [['branch_name', 'branch_address'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company Name',
            'branch_name' => 'Branch Name',
            'branch_address' => 'Branch Address',
            'created_dt' => 'Created Dt',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['branch_id' => 'id']);
    }
}
