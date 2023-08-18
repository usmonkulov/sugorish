<?php

namespace settings\forms\irrigation\search;

use settings\entities\irrigation\Road;
use settings\entities\user\User;
use settings\forms\irrigation\traits\RoadIrrigationTaskTrait;
use yii\base\Model;

class RoadIrrigationTaskSearchForm extends Model
{
    use RoadIrrigationTaskTrait;

    public function rules()
    {
        return [
            [['road_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['road_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['start_time', 'end_time', 'watering_time', 'how_long', 'content', 'created_by'], 'required'],
            [['start_time', 'end_time', 'watering_time', 'created_at', 'updated_at'], 'safe'],
            [['how_long'], 'string', 'max' => 10],
            [['content'], 'string', 'max' => 255],
            [['road_id'], 'exist', 'skipOnError' => true, 'targetClass' => Road::class, 'targetAttribute' => ['road_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}