<?php

namespace settings\entities\enums;

use settings\behaviors\AuthorBehavior;
use settings\entities\irrigation\Road;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%enum_road_employees}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $birthday
 * @property string $phone
 * @property string|null $email
 * @property string $gender
 * @property int $status
 * @property int $position_id
 * @property int $region_id
 * @property int $district_id
 * @property string $code_position
 * @property string $address
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property EnumRegions $district
 * @property EnumRoadPosition $position
 * @property EnumRegions $region
 * @property Road[] $roadEnterpriseExpert
 * @property Road[] $roadPlotChief
 * @property Road[] $roadWaterEmployee
 * @property User $createdBy
 * @property User $updatedBy
 */
class EnumRoadEmployees extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%enum_road_employees}}';
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['timestamp'] = [
            'class' => TimestampBehavior::class,
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
            'value' => new Expression('NOW()'),
        ];
        $behaviors['author'] = [
            'class' => AuthorBehavior::class,
        ];

        return $behaviors;
    }

    public static function create
    (
        $first_name,
        $last_name,
        $middle_name,
        $birthday,
        $phone,
        $email,
        $gender,
        $status,
        $position_id,
        $code_position,
        $region_id,
        $district_id,
        $address

    ): EnumRoadEmployees
    {
        $item = new static();
        $item->first_name = $first_name;
        $item->last_name = $last_name;
        $item->middle_name = $middle_name;
        $item->birthday = $birthday;
        $item->phone = $phone;
        $item->email = $email;
        $item->gender = $gender;
        $item->status = $status;
        $item->position_id = $position_id;
        $item->code_position = $code_position;
        $item->region_id = $region_id;
        $item->district_id = $district_id;
        $item->address = $address;
        return $item;
    }

    public function edit(
        $first_name,
        $last_name,
        $middle_name,
        $birthday,
        $phone,
        $email,
        $gender,
        $status,
        $position_id,
        $code_position,
        $region_id,
        $district_id,
        $address
    )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->email = $email;
        $this->gender = $gender;
        $this->status = $status;
        $this->position_id = $position_id;
        $this->code_position = $code_position;
        $this->region_id = $region_id;
        $this->district_id = $district_id;
        $this->address = $address;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'phone', 'position_id', 'code_position', 'district_id', 'address'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['status', 'position_id', 'district_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['region_id'], 'default', 'value' => 1718],
            [['status', 'position_id', 'region_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['phone', 'email', 'code_position'], 'string', 'max' => 50],
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('app', 'ID raqami'),
            'first_name'    => Yii::t('app', 'Familiya'),
            'last_name'     => Yii::t('app', 'Ism'),
            'middle_name'   => Yii::t('app', 'Otasining ismi'),
            'birthday'      => Yii::t('app', 'Tug\'ilgan kun'),
            'email'         => Yii::t('app', 'Elektron pochta'),
            'phone'         => Yii::t('app', 'Telefon'),
            'gender'        => Yii::t('app', 'Jinsi'),
            'status'        => Yii::t('app', 'Holati'),
            'position_id'   => Yii::t('app', 'Lavozimi'),
            'code_position' => Yii::t('app', "Lavozim darajasi"),
            'region_id'     => Yii::t('app', 'Viloyat'),
            'district_id'   => Yii::t('app', 'Tuman'),
            'address'       => Yii::t('app', 'Manzil'),
            'created_by'    => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by'    => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at'    => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at'    => Yii::t('app', 'Yangilangan vaqti'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(EnumRoadPosition::class, ['id' => 'position_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'district_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'region_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoadEnterpriseExpert()
    {
        return $this->hasMany(Road::class, ['enterprise_expert_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoadPlotChief()
    {
        return $this->hasMany(Road::class, ['plot_chief_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoadWaterEmployee()
    {
        return $this->hasMany(Road::class, ['water_employee_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
