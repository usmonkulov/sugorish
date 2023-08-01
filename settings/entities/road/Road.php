<?php

namespace settings\entities\road;

use settings\entities\user\Users;
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
 * @property string $image_url
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property RoadTask[] $roadTasks
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
            'road_name' => Yii::t('app', 'Road Name'),
            'code_name' => Yii::t('app', 'Code Name'),
            'address' => Yii::t('app', 'Address'),
            'coordination' => Yii::t('app', 'Coordination'),
            'enterprise_expert' => Yii::t('app', 'Enterprise Expert'),
            'plot_chief' => Yii::t('app', 'Plot Chief'),
            'water_employee' => Yii::t('app', 'Water Employee'),
            'status' => Yii::t('app', 'Status'),
            'image_url' => Yii::t('app', 'Image Url'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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

    /**
     * @return ActiveQuery
     */
    public function getRoadTasks()
    {
        return $this->hasMany(RoadTask::class, ['road_id' => 'id']);
    }
}
