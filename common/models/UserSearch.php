<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    public $search;
    public $field;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name','user_type_id', 'last_name', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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
       
       $query = User::find();

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
        $query->joinWith('usertype');
        if(isset($params['UserSearch']['search']) && $params['UserSearch']['search'] !='') {
            if($params['UserSearch']['field'] == ''){
                $query->orFilterWhere(['=','user.id', $params['UserSearch']['search']])
                  ->orFilterWhere(['=', 'user.status', $params['UserSearch']['search']])
                  ->orFilterWhere(['like', 'user.first_name', $params['UserSearch']['search']])
                  ->orFilterWhere(['like', 'user.last_name', $params['UserSearch']['search']])
                  ->orFilterWhere(['like', 'user.email', $params['UserSearch']['search']])
                  ->orFilterWhere(['like', 'user.created_at', $params['UserSearch']['search']])
                  ->orFilterWhere(['like', 'user_type.title', $params['UserSearch']['search']])
                  ->orFilterWhere(['like', 'user.username', $params['UserSearch']['search']]);
            } else {
                if($params['UserSearch']['field'] == 'id' || $params['UserSearch']['field'] == 'status'){
                    $query->andFilterWhere(['=', 'user.'.$params['UserSearch']['field'], $params['UserSearch']['search']]);
                } elseif($params['UserSearch']['field'] == 'user_type_id'){
                    $query->andFilterWhere(['like', 'user_type.title', $params['UserSearch']['search']]);
                }else {
                    $query->andFilterWhere(['like', 'user.'.$params['UserSearch']['field'], $params['UserSearch']['search']]);
                }
            }
        } else {
            $query->andFilterWhere([
                'id' => $this->id,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]);

            $query->andFilterWhere(['like', 'first_name', $this->first_name])
                ->andFilterWhere(['like', 'last_name', $this->last_name])
                ->andFilterWhere(['like', 'username', $this->username])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'user_type.title', $this->user_type_id]);
        }
        return $dataProvider;
    }
}
