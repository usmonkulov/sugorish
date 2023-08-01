<?php

namespace settings\forms\road\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use settings\entities\road\Road;

/**
 * RoadSearch represents the model behind the search form of `settings\entities\road\Road`.
 */
class RoadSearch extends Road
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['road_name', 'code_name', 'address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'image_url', 'created_at', 'updated_at'], 'safe'],
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
        $query = Road::find();

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
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'road_name', $this->road_name])
            ->andFilterWhere(['ilike', 'code_name', $this->code_name])
            ->andFilterWhere(['ilike', 'address', $this->address])
            ->andFilterWhere(['ilike', 'coordination', $this->coordination])
            ->andFilterWhere(['ilike', 'enterprise_expert', $this->enterprise_expert])
            ->andFilterWhere(['ilike', 'plot_chief', $this->plot_chief])
            ->andFilterWhere(['ilike', 'water_employee', $this->water_employee])
            ->andFilterWhere(['ilike', 'image_url', $this->image_url]);

        return $dataProvider;
    }
}
