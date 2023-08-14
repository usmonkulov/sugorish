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
            [['id', 'title_uz', 'title_oz', 'title_ru', 'km', 'code_name', 'region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'created_by'], 'required'],
            [['address', 'coordination', 'image_url'], 'string'],
            [['region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'km', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique'],
//            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['region_id' => 'id']],
//            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['district_id' => 'id']],
//            [['enterprise_expert_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadEmployees::class, 'targetAttribute' => ['enterprise_expert_id' => 'id']],
//            [['plot_chief_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadEmployees::class, 'targetAttribute' => ['plot_chief_id' => 'id']],
//            [['water_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadEmployees::class, 'targetAttribute' => ['water_employee_id' => 'id']],
//            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadType::class, 'targetAttribute' => ['type_id' => 'id']],
//            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
//            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}