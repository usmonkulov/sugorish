<?php

namespace settings\forms\irrigation\traits;

use settings\entities\irrigation\Road;

trait RoadTrait
{
    public $all;

    public $id;
    public $title_uz;
    public $title_oz;
    public $title_ru;
    public $start_km;
    public $end_km;
    public $code_name;
    public $field_number;
    public $address;
    public $coordination;
    public $region_id;
    public $district_id;
    public $type_id;
    public $enterprise_expert_id;
    public $plot_chief_id;
    public $water_employee_id;
    public $status;
    public $image_url;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new Road();
        return $label->attributeLabels();
    }
}