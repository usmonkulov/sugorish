<?php

namespace settings\entities\irrigation;

use settings\behaviors\AuthorBehavior;
use settings\entities\enums\EnumRegions;
use settings\entities\enums\EnumRoadEmployees;
use settings\entities\enums\EnumRoadType;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%road}}".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_oz
 * @property string $title_ru
 * @property string $km
 * @property string $code_name
 * @property string|null $address
 * @property string|null $coordination
 * @property int $region_id
 * @property int $district_id
 * @property int $type_id
 * @property int $enterprise_expert_id
 * @property int $plot_chief_id
 * @property int $water_employee_id
 * @property int $status
 * @property string|null $image_url
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property EnumRegions $district
 * @property EnumRoadEmployees $enterpriseExpert
 * @property EnumRoadEmployees $plotChief
 * @property EnumRegions $region
 * @property RoadIrrigationTasks[] $roadIrrigationTasks
 * @property EnumRoadType $type
 * @property User $updatedBy
 * @property EnumRoadEmployees $waterEmployee
 */

class Road extends ActiveRecord
{
    /**
     * {@inheritdoc}
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

    public static function tableName()
    {
        return '{{%road}}';
    }

    public static function create
    (
       $title_uz,
       $title_oz,
       $title_ru,
       $km,
       $code_name,
       $address,
       $coordination,
       $region_id,
       $district_id,
       $type_id,
       $enterprise_expert_id,
       $plot_chief_id,
       $water_employee_id,
       $status,
       $image_url
    ): Road
    {
        $item = new static();
        $item->title_uz = $title_uz;
        $item->title_oz = $title_oz;
        $item->title_ru = $title_ru;
        $item->km = $km;
        $item->code_name = $code_name;
        $item->address = $address;
        $item->coordination = $coordination;
        $item->region_id = $region_id;
        $item->district_id = $district_id;
        $item->type_id = $type_id;
        $item->enterprise_expert_id = $enterprise_expert_id;
        $item->plot_chief_id = $plot_chief_id;
        $item->water_employee_id = $water_employee_id;
        $item->status = $status;
        $item->image_url = $image_url;
        return $item;
    }

    public function edit(
        $title_uz,
        $title_oz,
        $title_ru,
        $km,
        $code_name,
        $address,
        $coordination,
        $region_id,
        $district_id,
        $type_id,
        $enterprise_expert_id,
        $plot_chief_id,
        $water_employee_id,
        $status,
        $image_url
    )
    {
        $this->title_uz = $title_uz;
        $this->title_oz = $title_oz;
        $this->title_ru = $title_ru;
        $this->km = $km;
        $this->code_name = $code_name;
        $this->address = $address;
        $this->coordination = $coordination;
        $this->region_id = $region_id;
        $this->district_id = $district_id;
        $this->type_id = $type_id;
        $this->enterprise_expert_id = $enterprise_expert_id;
        $this->plot_chief_id = $plot_chief_id;
        $this->water_employee_id = $water_employee_id;
        $this->status = $status;
        $this->image_url = $image_url;
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_uz', 'title_oz', 'title_ru', 'km', 'code_name', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id'], 'required'],
            [['address', 'coordination', 'image_url'], 'string'],
            [['region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['region_id'], 'default', 'value' => 1718],
            [['region_id', 'district_id', 'type_id', 'enterprise_expert_id', 'plot_chief_id', 'water_employee_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'km', 'code_name'], 'string', 'max' => 255],
            [['code_name'], 'unique'],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRegions::class, 'targetAttribute' => ['district_id' => 'id']],
            [['enterprise_expert_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadEmployees::class, 'targetAttribute' => ['enterprise_expert_id' => 'id']],
            [['plot_chief_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadEmployees::class, 'targetAttribute' => ['plot_chief_id' => 'id']],
            [['water_employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadEmployees::class, 'targetAttribute' => ['water_employee_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnumRoadType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' =>                     Yii::t('app', 'ID raqami'),
            'title_uz' =>               Yii::t('app', "Yo'l nomi Krilcha"),
            'title_oz' =>               Yii::t('app', "Yo'l nomi Lotincha"),
            'title_ru' =>               Yii::t('app', "Yo'l nomi Ruscha"),
            'km' =>                     Yii::t('app', 'Km'),
            'code_name' =>              Yii::t('app', "Yo'l kodi"),
            'address' =>                Yii::t('app', "Yo'l manzili"),
            'coordination' =>           Yii::t('app', 'Kordinatasi'),
            'region_id' =>              Yii::t('app', 'Viloyat'),
            'district_id' =>            Yii::t('app', 'Tuman'),
            'type_id' =>                Yii::t('app', "Yo'l toifasi"),
            'enterprise_expert_id' =>   Yii::t('app', 'Korxonadan biriktirilgan hodim (F.I.O)'),
            'plot_chief_id' =>          Yii::t('app', "Yo'lga biriktirilgan uchastka boshlig'i (F.I.O)"),
            'water_employee_id' =>      Yii::t('app', "Yo'lga biriktirilgan suvchi (F.I.O)"),
            'status' =>                 Yii::t('app', 'Holati'),
            'image_url' =>              Yii::t('app', 'Rasim Url'),
            'created_by' =>             Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by' =>             Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at' =>             Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' =>             Yii::t('app', 'Yangilangan vaqti'),
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
     * Gets query for [[UpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
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
     * Gets query for [[District]].
     *
     * @return ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(EnumRegions::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[EnterpriseExpert]].
     *
     * @return ActiveQuery
     */
    public function getEnterpriseExpert()
    {
        return $this->hasOne(EnumRoadEmployees::class, ['id' => 'enterprise_expert_id']);
    }

    /**
     * Gets query for [[PlotChief]].
     *
     * @return ActiveQuery
     */
    public function getPlotChief()
    {
        return $this->hasOne(EnumRoadEmployees::class, ['id' => 'plot_chief_id']);
    }

    /**
     * Gets query for [[RoadIrrigationTasks]].
     *
     * @return ActiveQuery
     */
    public function getRoadIrrigationTasks()
    {
        return $this->hasMany(RoadIrrigationTasks::class, ['road_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(EnumRoadType::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[WaterEmployee]].
     *
     * @return ActiveQuery
     */
    public function getWaterEmployee()
    {
        return $this->hasOne(EnumRoadEmployees::class, ['id' => 'water_employee_id']);
    }
}