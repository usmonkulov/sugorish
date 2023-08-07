<?php

namespace settings\forms\irrigation;

use settings\forms\irrigation\traits\RoadTrait;
use settings\status\GeneralStatus;
use yii\base\Model;

class RoadForm extends Model
{
    use RoadTrait;

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['road_name', 'code_name', 'address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee'], 'required'],
            [['address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'image_url'], 'string'],
            [['status'], 'integer'],
//            ['status', 'in', 'range' => [GeneralStatus::STATUS_ENABLED, GeneralStatus::STATUS_DISABLED]],
            [['road_name', 'code_name'], 'string', 'max' => 255],
        ];
    }
}