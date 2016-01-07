<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Page;

/**
 * PageSearch represents the model behind the search form about `common\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'is_url', 'is_seo', 'status'], 'integer'],
            [['page_url', 'page_name', 'page_content', 'page_seo_name', 'meta_values', 'created_dt'], 'safe'],
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
        $query = Page::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'is_url' => $this->is_url,
            'is_seo' => $this->is_seo,
            'status' => $this->status,
            'created_dt' => $this->created_dt,
        ]);

        $query->andFilterWhere(['like', 'page_url', $this->page_url])
            ->andFilterWhere(['like', 'page_name', $this->page_name])
            ->andFilterWhere(['like', 'page_content', $this->page_content])
            ->andFilterWhere(['like', 'page_seo_name', $this->page_seo_name])
            ->andFilterWhere(['like', 'meta_values', $this->meta_values]);

        return $dataProvider;
    }
}
