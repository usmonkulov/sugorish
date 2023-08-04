<?php

namespace settings\entities\road;

use settings\entities\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%road}}".
 *
 * @property int $id
 * @property string $road_name
 * @property string $code_name
 * @property string $address
 * @property string $coordination
 * @property string $enterprise_expert
 * @property string $plot_chief
 * @property string $water_employee
 * @property int $status
 * @property string|null $image_url
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property RoadTask[] $roadTasks
 * @property User $updatedBy
 */
class Road extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%road}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['road_name', 'code_name', 'address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'created_by'], 'required'],
            [['address', 'coordination', 'enterprise_expert', 'plot_chief', 'water_employee', 'image_url'], 'string'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['road_name', 'code_name'], 'string', 'max' => 255],
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
            'id' =>                 Yii::t('app', 'ID raqami'),
            'road_name' =>          Yii::t('app', 'Yo\'l nomi'),
            'code_name' =>          Yii::t('app', 'Yo\'l kodi'),
            'address' =>            Yii::t('app', 'Manzil'),
            'coordination' =>       Yii::t('app', 'Kordinatasi'),
            'enterprise_expert' =>  Yii::t('app', 'Korxonadan biriktirilgan hodim'),
            'plot_chief' =>         Yii::t('app', 'Uchastka boshlig\'i'),
            'water_employee' =>     Yii::t('app', 'Suvchi'),
            'status' =>             Yii::t('app', 'Holati'),
            'image_url' =>          Yii::t('app', 'Rasim Url'),
            'created_by' =>         Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by' =>         Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at' =>         Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at' =>         Yii::t('app', 'Yangilangan vaqti'),
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
     * Gets query for [[RoadTasks]].
     *
     * @return ActiveQuery
     */
    public function getRoadTasks()
    {
        return $this->hasMany(RoadTask::class, ['road_id' => 'id']);
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
