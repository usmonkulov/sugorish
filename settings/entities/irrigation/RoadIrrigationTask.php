<?php

namespace settings\entities\irrigation;

use settings\behaviors\AuthorBehavior;
use settings\entities\user\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
/**
 * This is the model class for table "{{%road_irrigation_tasks}}".
 *
 * @property int $id
 * @property int|null $road_id
 * @property string $start_time
 * @property string $end_time
 * @property string $watering_time
 * @property string $how_long
 * @property int $status
 * @property string $content
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property Road $road
 * @property User $updatedBy
 */

class RoadIrrigationTask extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%road_irrigation_tasks}}';
    }

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


    public static function create
    (
        $road_id,
        $start_time,
        $end_time,
        $watering_time,
        $how_long,
        $content
    ): RoadIrrigationTask
    {
        $item = new static();
        $item->road_id = $road_id;
        $item->start_time = $start_time;
        $item->end_time = $end_time;
        $item->watering_time = $watering_time;
        $item->how_long = $how_long;
        $item->content = $content;
        return $item;
    }

    public function edit(
        $road_id,
        $start_time,
        $end_time,
        $watering_time,
        $how_long,
        $content
    )
    {
        $this->road_id = $road_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->watering_time = $watering_time;
        $this->how_long = $how_long;
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['road_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
//            [['created_by'], 'default', 'value' => 1],
//            [['status'], 'default', 'value' => 1],
//            [['created_at'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['road_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['start_time', 'end_time', 'content'], 'required'],
            [['start_time', 'end_time', 'watering_time', 'created_at', 'updated_at'], 'safe'],
            [['content','how_long'], 'string', 'max' => 255],
            [['road_id'], 'exist', 'skipOnError' => true, 'targetClass' => Road::class, 'targetAttribute' => ['road_id' => 'id']],
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
            'road_id' =>            Yii::t('app', 'Yo\'l id raqami'),
            'start_time' =>         Yii::t('app', 'Boshlanish vaqti'),
            'end_time' =>           Yii::t('app', 'Tugash vaqti'),
            'watering_time' =>      Yii::t('app', 'Qachon quyiladi'),
            'how_long' =>           Yii::t('app', 'Qancha vaqt quyildi'),
            'status' =>             Yii::t('app', 'Holati'),
            'content' =>            Yii::t('app', 'Qisqacha izoh'),
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
     * Gets query for [[Road]].
     *
     * @return ActiveQuery
     */
    public function getRoad()
    {
        return $this->hasOne(Road::class, ['id' => 'road_id']);
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
