<?php

namespace settings\forms\user\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use settings\entities\user\UserProfile;

/**
 * UserProfileSearch represents the model behind the search form of `settings\entities\user\UserProfile`.
 */
class UserProfileSearch extends UserProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'birthday', 'gender', 'address', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = UserProfile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'birthday' => $this->birthday,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'first_name', $this->first_name])
            ->andFilterWhere(['ilike', 'last_name', $this->last_name])
            ->andFilterWhere(['ilike', 'middle_name', $this->middle_name])
            ->andFilterWhere(['ilike', 'gender', $this->gender])
            ->andFilterWhere(['ilike', 'address', $this->address]);

        return $dataProvider;
    }
}
