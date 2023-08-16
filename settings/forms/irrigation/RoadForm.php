<?php

namespace settings\forms\irrigation;

use settings\entities\irrigation\Road;
use settings\forms\irrigation\traits\RoadTrait;
use settings\status\GeneralStatus;
use yii\base\Model;

class RoadForm extends Model
{
    use RoadTrait;

    public function rules()
    {
        return [
            [['title_uz', 'title_oz', 'title_ru', 'start_km', 'end_km', 'code_name', 'field_number', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id'], 'required'],
            [['address', 'coordination', 'image_url'], 'string'],
            [['region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'status', 'created_by', 'updated_by',  'start_km', 'end_km'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'code_name', 'field_number'], 'string', 'max' => 255],
            [['field_number'], 'unique', 'targetClass' => Road::class, 'filter' =>  $this->field_number ? ['<>', 'field_number', $this->field_number] : null, 'targetAttribute' => ['field_number']],
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