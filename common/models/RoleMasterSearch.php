<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RoleMaster;

/**
 * RoleMasterSearch represents the model behind the search form about `common\models\RoleMaster`.
 */
class RoleMasterSearch extends RoleMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_action_id', 'user_type_id'], 'integer'],
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
        $query = RoleMaster::find();

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
            'role_action_id' => $this->role_action_id,
            'user_type_id' => $this->user_type_id,
        ]);

        return $dataProvider;
    }
}
