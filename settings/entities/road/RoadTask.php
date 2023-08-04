<?php

namespace settings\entities\road;

use settings\entities\user\User;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%road_task}}".
 *
 * @property int $id
 * @property int|null $road_id
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 * @property int $status_color
 * @property string|null $description
 * @property string|null $content
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property Road $road
 * @property User $updatedBy
 */
class RoadTask extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%road_task}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['road_id', 'status', 'status_color', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['road_id', 'status', 'status_color', 'created_by', 'updated_by'], 'integer'],
            [['start_time', 'end_time', 'created_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['start_time', 'end_time', 'description', 'content'], 'string', 'max' => 255],
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
            'start_time' =>         Yii::t('app', 'boshlanish vaqti'),
            'end_time' =>           Yii::t('app', 'Tugash vaqti'),
            'status' =>             Yii::t('app', 'Holati'),
            'status_color' =>       Yii::t('app', 'Holat rangi'),
            'description' =>        Yii::t('app', 'Description'),
            'content' =>            Yii::t('app', 'Content'),
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
