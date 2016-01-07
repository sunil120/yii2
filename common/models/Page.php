<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $is_url
 * @property string $page_url
 * @property string $page_name
 * @property string $page_content
 * @property integer $is_seo
 * @property string $page_seo_name
 * @property string $meta_values
 * @property integer $status
 * @property string $created_dt
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_url', 'is_seo', 'status'], 'integer'],
            [['page_url', 'page_content'], 'string'],
            [['page_name', 'status'], 'required'],
            [['is_url'], 'checkUrl','skipOnEmpty' => true],
            [['is_seo'], 'checkSeo','skipOnEmpty' => true],
            [['page_name'], 'string', 'max' => 100],
            [['page_seo_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'is_url' => 'Is Url',
            'page_url' => 'Page Url',
            'page_name' => 'Page Name',
            'page_content' => 'Page Content',
            'is_seo' => 'Is Seo',
            'page_seo_name' => 'Page Seo Name',
            'meta_key' => 'Meta Key',
            'meta_values' => 'Meta Values',
            'status' => 'Status',
            'created_dt' => 'Created Dt',
        ];
    }
    
    public function checkUrl($attribute, $params) {
       if($this->$attribute && $this->page_url == ''){
           $this->addError('page_url', 'Page Url cannot be blank.');
       }
     
    }
    
    public function checkSeo($attribute, $params) {
       if($this->$attribute && $this->page_seo_name == ''){
           $this->addError('page_seo_name', 'Page seo name cannot be blank.');
       }
     
    }
    
    /**
     * @return \yii\db\ActiveQuery
    */
    public function getParent()
    {
        return $this->hasOne(Page::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasMany(Page::className(), ['parent_id' => 'id']);
    }
}
