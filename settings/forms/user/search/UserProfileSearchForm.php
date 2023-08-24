<?php

namespace settings\forms\user\search;

use settings\forms\user\traits\UserProfileTrait;

class UserProfileSearchForm
{
    use UserProfileTrait;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'region_id', 'district_id', 'address', 'created_by'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['region_id', 'district_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['region_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name', 'avatar'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
        ];
    }
}