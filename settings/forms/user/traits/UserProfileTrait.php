<?php

namespace settings\forms\user\traits;

use settings\entities\user\UserProfile;

trait UserProfileTrait
{
    public $user_id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $birthday;
    public $gender;
    public $region_id;
    public $district_id;
    public $address;
    public $avatar;
    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        $label = new UserProfile();
        return $label->attributeLabels();
    }
}