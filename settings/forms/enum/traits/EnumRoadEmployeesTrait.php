<?php

namespace settings\forms\enum\traits;

use settings\entities\enums\EnumRoadEmployees;

trait EnumRoadEmployeesTrait
{
    public $id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $birthday;
    public $phone;
    public $email;
    public $gender;
    public $status;
    public $position_id;
    public $code_position;
    public $region_id;
    public $district_id;
    public $address;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new EnumRoadEmployees();
        return $label->attributeLabels();
    }
}