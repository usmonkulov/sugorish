<?php

namespace settings\forms\enum;

use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadEmployees;
use settings\entities\enums\EnumRoadPosition;
use settings\entities\user\User;
use settings\forms\enum\traits\EnumRoadEmployeesTrait;
use yii\base\Model;

class EnumRoadEmployeesForm extends Model
{
    use EnumRoadEmployeesTrait;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'phone', 'position_id', 'code_position', 'district_id', 'address'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['status', 'position_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['region_id'], 'default', 'value' => 1718],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['phone', 'email', 'code_position'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 1],
            [['email'], 'unique', 'targetClass' => EnumRoadEmployees::class, 'filter' =>  $this->email ? ['<>', 'email', $this->email] : null, 'targetAttribute' => ['email']],
            [['phone'], 'unique', 'targetClass' => EnumRoadEmployees::class, 'filter' =>  $this->phone ? ['<>', 'phone', $this->phone] : null, 'targetAttribute' => ['phone']],
            [['first_name', 'last_name', 'birthday'], 'unique', 'targetClass' => EnumRoadEmployees::class, 'filter' => $this->first_name ? ['<>', 'first_name', $this->first_name] : null, 'targetAttribute' => ['first_name', 'last_name', 'birthday']],
            [['first_name', 'last_name', 'birthday'], 'unique', 'targetClass' => EnumRoadEmployees::class, 'filter' => $this->last_name ? ['<>', 'last_name', $this->last_name] : null, 'targetAttribute' => ['first_name', 'last_name', 'birthday']],
            [['first_name', 'last_name', 'birthday'], 'unique', 'targetClass' => EnumRoadEmployees::class, 'filter' => $this->birthday ? ['<>', 'birthday', $this->birthday] : null, 'targetAttribute' => ['first_name', 'last_name', 'birthday']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['district_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadPosition::class, 'targetAttribute' => ['position_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
}