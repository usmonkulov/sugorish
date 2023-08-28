<?php

namespace settings\forms\user;

use settings\entities\enums\EnumRegions;
use settings\entities\user\User;
use settings\forms\user\traits\UserProfileTrait;
use yii\base\Model;

class UserProfileForm extends Model
{

    use UserProfileTrait;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'district_id', 'address'], 'required'],
            [['region_id'], 'default', 'value' => 1718],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['region_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name', 'avatar'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['district_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}