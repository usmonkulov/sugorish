<?php

namespace settings\entities\enums;

use settings\entities\irrigation\Road;
use settings\entities\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%enum_road_employees}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $phone
 * @property string|null $email
 * @property string $gender
 * @property int $status
 * @property int $position_id
 * @property int $region_id
 * @property int $district_id
 * @property string $address
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property EnumRoadPosition $position
 * @property Road[] $roadEnterpriseExpert
 * @property Road[] $roadPlotChief
 * @property Road[] $roadWaterEmployee
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'position_id', 'region_id', 'district_id', 'address', 'created_by'], 'required'],
            [['status', 'position_id', 'region_id', 'district_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'position_id', 'region_id', 'district_id', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['phone', 'email'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 1],
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
            'id' => Yii::t('app', 'ID raqami'),
            'first_name' => Yii::t('app', 'Familiya'),
            'last_name' => Yii::t('app', 'Ism'),
            'middle_name' => Yii::t('app', 'Otasining ismi'),
            'email' => Yii::t('app', 'Elektron pochta'),
            'phone' => Yii::t('app', 'Telefon'),
            'gender' => Yii::t('app', 'Jinsi'),
            'status' => Yii::t('app', 'Holati'),
            'position_id' => Yii::t('app', 'Lavozimi'),
            'region_id' => Yii::t('app', 'Region ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'address' => Yii::t('app', 'Manzil'),
            'created_by' => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by' => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at' => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' => Yii::t('app', 'Yangilangan vaqti'),
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
     * Gets query for [[Position]].
     *
     * @return ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(EnumRoadPosition::class, ['id' => 'position_id']);
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
     * Gets query for [[UpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}
