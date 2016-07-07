<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Companies;

/**
 * CompaniesSearch represents the model behind the search form about `common\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * @inheritdoc
     */
    public $search;
    public $field;
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['company_name', 'company_address', 'company_email', 'created_dt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Companies::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 2),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if(isset($params['CompaniesSearch']['search']) && $params['CompaniesSearch']['search'] !='') {
            
            if($params['CompaniesSearch']['field'] == ''){
                $query->orFilterWhere(['=','id', $params['CompaniesSearch']['search']])
                  ->orFilterWhere(['=', 'status', $params['CompaniesSearch']['search']])
                  ->orFilterWhere(['like', 'company_name', $params['CompaniesSearch']['search']])
                  ->orFilterWhere(['like', 'company_address', $params['CompaniesSearch']['search']])
                  ->orFilterWhere(['like', 'created_dt', $params['CompaniesSearch']['search']])
                  ->orFilterWhere(['like', 'company_email', $params['CompaniesSearch']['search']]);
            } else {
               $query->andFilterWhere(['like', $params['CompaniesSearch']['field'], $params['CompaniesSearch']['search']]);
            }
            
        } else {
            $query->andFilterWhere([
                    'id' => $this->id,
                    'created_dt' => $this->created_dt,
                    'company_name' => $this->status,
                ]);
            
            $query->andFilterWhere(['like', 'company_name', $this->company_name])
                  ->andFilterWhere(['like', 'company_address', $this->company_address])
                  ->andFilterWhere(['like', 'company_email', $this->company_email]);
        }
        
        return $dataProvider;
    }
}
