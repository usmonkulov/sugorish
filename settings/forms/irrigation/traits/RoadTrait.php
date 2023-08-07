<?php

namespace settings\forms\irrigation\traits;

use settings\entities\irrigation\Road;

trait RoadTrait
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

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new Road();
        return $label->attributeLabels();
    }
}