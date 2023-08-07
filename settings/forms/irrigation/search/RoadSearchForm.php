<?php

namespace settings\forms\irrigation\search;

use settings\forms\irrigation\traits\RoadTrait;
use yii\base\Model;

class RoadSearchForm extends Model
{
    use RoadTrait;

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['road_name', 'code_name', 'address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee'], 'string'],
            [['address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'image_url'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }
}