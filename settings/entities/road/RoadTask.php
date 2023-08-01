<?php

namespace settings\entities\road;

use settings\entities\user\Users;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%road_task}}".
 *
 * @property int $id
 * @property int $road_id
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 * @property int $status_color
 * @property string $description
 * @property string $content
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Road $road
 * @property Users $createdBy
 * @property Users $updatedBy
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
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'road_id' => Yii::t('app', 'Road ID'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'status' => Yii::t('app', 'Status'),
            'status_color' => Yii::t('app', 'Status Color'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getRoad()
    {
        return $this->hasOne(Road::class, ['id' => 'road_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::class, ['id' => 'created_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(Users::class, ['id' => 'updated_by']);
    }
}
