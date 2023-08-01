<?php

namespace settings\formsroad\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use settings\entities\road\RoadTask;

/**
 * RoadTaskSearch represents the model behind the search form of `settings\entities\road\RoadTask`.
 */
class RoadTaskSearch extends RoadTask
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'road_id', 'status', 'status_color', 'created_by', 'updated_by'], 'integer'],
            [['start_time', 'end_time', 'description', 'content', 'created_at', 'updated_at'], 'safe'],
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
        $query = RoadTask::find();

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
            'id' => $this->id,
            'road_id' => $this->road_id,
            'status' => $this->status,
            'status_color' => $this->status_color,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'start_time', $this->start_time])
            ->andFilterWhere(['ilike', 'end_time', $this->end_time])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'content', $this->content]);

        return $dataProvider;
    }
}
