<?php

namespace settings\readModels\irrigation;

use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadEmployees;
use settings\entities\enums\EnumRoadType;
use settings\entities\irrigation\Road;
use settings\entities\irrigation\RoadIrrigationTask;
use settings\entities\user\User;
use settings\forms\irrigation\search\RoadSearchForm;
use settings\status\GeneralStatus;
use settings\status\irrigation\RoadIrrigationTaskStatus;
use Yii;
use yii\data\ActiveDataProvider;

class RoadReadRepository
{
    public function frontendSearch(RoadSearchForm $form): ActiveDataProvider
    {
        $roadAlias = 'r';
        $taskAlias = 'rit';
        $districtAlias = 'd';
        $enterpriseExpertAlias = 'eea';
        $plotChiefAlias = 'pch';
        $waterEmployeeAlias = 'we';
        $typeAlias = 't';
        $userAlias = 'u';
        $query = Road::find()
            ->select([
                "{$roadAlias}.id",
                "CONCAT('<b>', $typeAlias.code_name, {$roadAlias}.code_name, '</b> ', {$roadAlias}.title_oz, ' ', {$roadAlias}.start_km, '-', {$roadAlias}.end_km, ' " .Yii::t('app', 'km'). " ') as road_full_name",
                "{$districtAlias}.title_oz as district_title",
                "{$roadAlias}.address",
                "{$roadAlias}.field_number",
                "{$roadAlias}.coordination",
                "CONCAT({$enterpriseExpertAlias}.first_name, ' ', {$enterpriseExpertAlias}.last_name) as enterprise_expert_full_name",
                "CONCAT({$plotChiefAlias}.first_name, ' ', {$plotChiefAlias}.last_name) as plot_chief_full_name",
                "CONCAT({$waterEmployeeAlias}.first_name, ' ', {$waterEmployeeAlias}.last_name) as water_employee_full_name",
                "CONCAT('<b>', {$taskAlias}.start_time, '</b>', ' " . Yii::t('app', 'dan') . " ', ' <b>', {$taskAlias}.end_time, '</b>', ' ', ' " . Yii::t('app', 'gacha') . " ') as start_end_time",
                "{$taskAlias}.how_long",
                "{$taskAlias}.watering_time",
                "{$taskAlias}.content",
                "{$userAlias}.username"
            ])
            ->from(["{$roadAlias}" =>                   Road::tableName()])
            ->innerJoin(["{$typeAlias}" =>              EnumRoadType::tableName()], "{$typeAlias}.id = {$roadAlias}.type_id")
            ->innerJoin(["{$enterpriseExpertAlias}" =>  EnumRoadEmployees::tableName()], "{$enterpriseExpertAlias}.id = {$roadAlias}.enterprise_expert_id")
            ->innerJoin(["{$plotChiefAlias}" =>         EnumRoadEmployees::tableName()], "{$plotChiefAlias}.id = {$roadAlias}.plot_chief_id")
            ->innerJoin(["{$waterEmployeeAlias}" =>     EnumRoadEmployees::tableName()], "{$waterEmployeeAlias}.id = {$roadAlias}.water_employee_id")
            ->innerJoin(["{$taskAlias}" =>              RoadIrrigationTask::tableName()], "{$roadAlias}.id = {$taskAlias}.road_id")
            ->innerJoin(["{$districtAlias}" =>          EnumRegions::tableName()], "{$districtAlias}.id = {$roadAlias}.district_id")
            ->innerJoin(["{$userAlias}" =>              User::tableName()], "{$userAlias}.id = {$roadAlias}.created_by")
            ->andWhere(["{$roadAlias}.status" =>        GeneralStatus::STATUS_ENABLED])
            ->andWhere(["{$taskAlias}.color_status" =>  RoadIrrigationTaskStatus::COLOR_STATUS_PROCESS])
            ->asArray()
            ->orderBy("{$taskAlias}.watering_time asc")
        ;

        if ($form->hasErrors()) {
            $query->andWhere('1=0');
        }

//        $query->andFilterWhere([
//            'id' =>                     $form->id,
//            'region_id' =>              $form->region_id,
//            'district_id' =>            $form->district_id,
//            'type_id' =>                $form->type_id,
//            'enterprise_expert_id' =>   $form->enterprise_expert_id,
//            'water_employee_id' =>      $form->water_employee_id,
//            'created_by' =>             $form->created_by,
//            'updated_by' =>             $form->updated_by
//        ]);

        $query
            ->orFilterWhere(['ilike', "{$roadAlias}.title_oz", $form->all])
            ->orFilterWhere(['ilike', "{$roadAlias}.title_oz", $form->all])
            ->orFilterWhere(['ilike', "{$roadAlias}.title_ru", $form->all])

            ->orFilterWhere(['ilike', "{$typeAlias}.code_name", $form->all])
            ->orFilterWhere(['ilike', "{$roadAlias}.code_name", $form->all])
        ;

        return new ActiveDataProvider([
            'query' => $query,

//            'pagination' => [
//                'pageSizeLimit' => [1, $query->count()],
//                'pageSize' => 1,
//            ]
        ]);
    }

    public function backendSearch(RoadSearchForm $form): ActiveDataProvider
    {
        $query = Road::find()->orderBy("id desc")
        ;

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

//            'pagination' => [
//                'pageSizeLimit' => [1, $query->count()],
//                'pageSize' => 1,
//            ]
        ]);
    }
}