<?php

namespace settings\entities\enums;

use settings\entities\irrigation\Road;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%enum_regions}}".
 *
 * @property int $id
 * @property string|null $title_ru
 * @property string|null $title_uz
 * @property string|null $title_oz
 * @property int|null $parent_id
 * @property int $is_deleted
 * @property int $status
 * @property int|null $order
 *
 * @property EnumRegions[] $enumRegions
 * @property EnumRoadEmployees[] $enumRoadEmployeesRegion
 * @property EnumRoadEmployees[] $enumRoadEmployeesDistrict
 * @property EnumRegions $parent
 * @property Road[] $roadsRegion
 * @property Road[] $roadsDistrict
 */
class EnumRegions extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%enum_regions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'parent_id', 'is_deleted', 'status', 'order'], 'default', 'value' => null],
            [['id', 'parent_id', 'is_deleted', 'status', 'order'], 'integer'],
            [['title_ru', 'title_uz', 'title_oz'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('app', 'ID raqami'),
            'title_uz'      => Yii::t('app', 'Lug\'at kiril'),
            'title_oz'      => Yii::t('app', 'Lug\'at lotin'),
            'title_ru'      => Yii::t('app', 'Lug\'at rus'),
            'parent_id'     => Yii::t('app', 'Parent ID'),
            'is_deleted'    => Yii::t('app', "O'chirilgan"),
            'status'        => Yii::t('app', 'Holati'),
            'order'         => Yii::t('app', 'Joyi'),
        ];
    }

    /**
     * Gets query for [[EnumRegions]].
     *
     * @return ActiveQuery
     */
    public function getEnumRegions()
    {
        return $this->hasMany(EnumRegions::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadEmployeesRegion]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadEmployeesRegion()
    {
        return $this->hasMany(EnumRoadEmployees::class, ['region_id' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadEmployeesDistrict]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadEmployeesDistrict()
    {
        return $this->hasMany(EnumRoadEmployees::class, ['district_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[RoadsRegion]].
     *
     * @return ActiveQuery
     */
    public function getRoadsRegion()
    {
        return $this->hasMany(Road::class, ['region_id' => 'id']);
    }

    /**
     * Gets query for [[RoadsDistrict]].
     *
     * @return ActiveQuery
     */
    public function getRoadsDistrict()
    {
        return $this->hasMany(Road::class, ['district_id' => 'id']);
    }
}
