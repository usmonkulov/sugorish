<?php

namespace settings\forms\enum\search;

use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadPosition;
use settings\entities\user\User;
use settings\forms\enum\traits\EnumRoadEmployeesTrait;
use yii\base\Model;

class EnumRoadEmployeesSearchForm extends Model
{
    use EnumRoadEmployeesTrait;

    /**
     * @return array[]
     */
    public function rules()
    {
        return [
            [['id','first_name', 'last_name', 'birthday', 'phone', 'position_id', 'code_position', 'region_id', 'district_id', 'address'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['status', 'position_id', 'region_id', 'district_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'position_id', 'region_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['phone', 'email', 'code_position',], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 1],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['first_name', 'last_name', 'birthday'], 'unique', 'targetAttribute' => ['first_name', 'last_name', 'birthday']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['district_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadPosition::class, 'targetAttribute' => ['position_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}