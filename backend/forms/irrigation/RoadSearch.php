<?php

namespace backend\forms\irrigation;

use settings\entities\irrigation\Road;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class RoadSearch extends Model
{

    public $id;
    public $road_name;
    public $code_name;
    public $address;
    public $coordination;
    public $enterprise_expert;
    public $plot_chief;
    public $water_employee;
    public $status;
    public $image_url;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public function rules()
    {
        return [
            [['id', 'road_name', 'code_name', 'address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'status', 'image_url'], 'integer'],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Road::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }
}