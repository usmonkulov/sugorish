<?php

namespace settings\forms\irrigation\traits;


use settings\entities\irrigation\RoadIrrigationTask;

trait RoadIrrigationTaskTrait
{
    public $id;
    public $road_id;
    public $start_time;
    public $end_time;
    public $watering_time;
    public $how_long;
    public $status;
    public $content;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new RoadIrrigationTask();
        return $label->attributeLabels();
    }
}