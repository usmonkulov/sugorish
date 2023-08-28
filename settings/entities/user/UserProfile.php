<?php

namespace settings\entities\user;

use settings\behaviors\AuthorBehavior;
use settings\entities\enums\EnumRegions;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%user_profile}}".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $birthday
 * @property string $gender
 * @property int $region_id
 * @property int $district_id
 * @property string $address
 * @property string|null $avatar
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property EnumRegions $district
 * @property EnumRegions $region
 * @property User $updatedBy
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_profile}}';
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
        $user_id,
        $first_name,
        $last_name,
        $middle_name,
        $birthday,
        $gender,
        $region_id,
        $district_id,
        $address,
        $avatar
    ): UserProfile
    {
        $item = new static();
        $item->user_id = $user_id;
        $item->first_name = $first_name;
        $item->last_name = $last_name;
        $item->middle_name = $middle_name;
        $item->birthday = $birthday;
        $item->gender = $gender;
        $item->region_id = $region_id;
        $item->district_id = $district_id;
        $item->address = $address;
        $item->avatar = $avatar;
        return $item;
    }

    public function edit(
        $user_id,
        $first_name,
        $last_name,
        $middle_name,
        $birthday,
        $gender,
        $region_id,
        $district_id,
        $address,
        $avatar
    )
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->middle_name = $middle_name;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->region_id = $region_id;
        $this->district_id = $district_id;
        $this->address = $address;
        $this->avatar = $avatar;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'region_id', 'district_id', 'address'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['region_id'], 'default', 'value' => 1718],
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' =>        Yii::t('app', 'Foydalanuvchi'),
            'first_name' =>     Yii::t('app', 'Familiya'),
            'last_name' =>      Yii::t('app', 'Ism'),
            'middle_name' =>    Yii::t('app', 'Otasining ismi'),
            'birthday' =>       Yii::t('app', 'Tug\'ilgan kun'),
            'gender' =>         Yii::t('app', 'Jinsi'),
            'region_id' =>      Yii::t('app', 'Viloyat'),
            'district_id' =>    Yii::t('app', 'Tuman yoki Shahar'),
            'address' =>        Yii::t('app', 'Manzil'),
            'avatar' =>         Yii::t('app', 'Avatar rasm'),
            'created_by' =>     Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by' =>     Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at' =>     Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' =>     Yii::t('app', 'Yangilangan vaqti'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[District]].
     *
     * @return ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'region_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
