<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $branch_id
 * @property string $department_name
 * @property string $created_dt
 * @property integer $status
 *
 * @property Companies $company
 * @property Branches $branch
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'branch_id', 'department_name', 'created_dt', 'status'], 'required'],
            [['company_id', 'branch_id', 'status'], 'integer'],
            [['created_dt'], 'safe'],
            [['department_name'], 'string', 'max' => 100]
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
            'branch_id' => 'Branch Name',
            'department_name' => 'Department Name',
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
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch_id']);
    }
}
