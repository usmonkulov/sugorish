<?php

namespace settings\readModels\irrigation;

use settings\entities\irrigation\Road;
use settings\entities\irrigation\RoadIrrigationTask;
use settings\forms\irrigation\search\RoadSearchForm;
use settings\status\GeneralStatus;
use settings\status\irrigation\RoadIrrigationTaskStatus;
use yii\data\ActiveDataProvider;

class RoadReadRepository
{
    public function search(RoadSearchForm $form): ActiveDataProvider
    {
        $roadAlias = 'r';
        $query = Road::find()
            ->joinWith(['roadIrrigationTask'])
            ->alias("{$roadAlias}")
            ->andWhere(["{$roadAlias}.status" => GeneralStatus::STATUS_ENABLED]);
//            ->andWhere(["{$roadIrrigationTaskAlias}.color_status" => RoadIrrigationTaskStatus::COLOR_STATUS_PROCESS])
//            ->orderBy("{$roadIrrigationTaskAlias}.watering_time asc");
//        $roadAlias = 'r';
//        $roadIrrigationTaskAlias = 'rit';
//        $query = Road::find()
//            ->from(["{$roadAlias}" => Road::tableName()])
//            ->select([
//                "{$roadAlias}.id",
//                "{$roadAlias}.title_uz",
//                "{$roadAlias}.title_oz",
//                "{$roadAlias}.title_ru",
//                "{$roadAlias}.start_km",
//                "{$roadAlias}.end_km",
//                "{$roadAlias}.code_name",
//                "{$roadAlias}.field_number",
//                "{$roadAlias}.address",
//                "{$roadAlias}.coordination",
//                "{$roadAlias}.region_id",
//                "{$roadAlias}.district_id",
//                "{$roadAlias}.type_id",
//                "{$roadAlias}.enterprise_expert_id",
//                "{$roadAlias}.plot_chief_id",
//                "{$roadAlias}.water_employee_id",
//                "{$roadAlias}.status",
//                "{$roadAlias}.image_url",
//                "{$roadAlias}.created_by",
//                "{$roadAlias}.updated_by",
//                "{$roadAlias}.created_at",
//                "{$roadAlias}.updated_at",
//                "{$roadIrrigationTaskAlias}.start_time",
//                "{$roadIrrigationTaskAlias}.end_time",
//                "{$roadIrrigationTaskAlias}.watering_time",
//                "{$roadIrrigationTaskAlias}.how_long",
//                "{$roadIrrigationTaskAlias}.color_status",
//                "{$roadIrrigationTaskAlias}.content",
//            ])
//            ->innerJoin(["{$roadIrrigationTaskAlias}" => RoadIrrigationTask::tableName()], "{$roadIrrigationTaskAlias}.road_id={$roadAlias}.id")
//            ->andWhere(["{$roadIrrigationTaskAlias}.color_status" => RoadIrrigationTaskStatus::COLOR_STATUS_PROCESS])
//            ->andWhere(["{$roadAlias}.status" => GeneralStatus::STATUS_ENABLED])
//            ->orderBy("{$roadIrrigationTaskAlias}.watering_time asc");

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

        $query->andFilterWhere([
            'id' =>                     $form->id,
            'region_id' =>              $form->region_id,
            'district_id' =>            $form->district_id,
            'type_id' =>                $form->type_id,
            'enterprise_expert_id' =>   $form->enterprise_expert_id,
            'water_employee_id' =>      $form->water_employee_id,
            'created_by' =>             $form->created_by,
            'updated_by' =>             $form->updated_by
        ]);

        $query
            ->andFilterWhere(['ilike', 'title_uz', $form->title_uz])
            ->andFilterWhere(['ilike', 'title_oz', $form->title_oz])
            ->andFilterWhere(['ilike', 'title_ru', $form->title_ru])
            ->andFilterWhere(['ilike', 'code_name', $form->code_name])
            ->andFilterWhere(['ilike', 'address', $form->address])
            ->andFilterWhere(['ilike', 'coordination', $form->coordination])
            ->andFilterWhere(['ilike', 'image_url', $form->image_url])
            ->andFilterWhere(['ilike', 'created_at', $form->created_at])
            ->andFilterWhere(['ilike', 'updated_at', $form->updated_at])
        ;

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 100]
            ]
        ]);
    }
}