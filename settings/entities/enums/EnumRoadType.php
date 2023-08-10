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
 * This is the model class for table "{{%enum_road_type}}".
 *
 * @property int $id
 * @property string $title_uz
 * @property string $title_oz
 * @property string $title_ru
 * @property string $code_name
 * @property int $status
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property Road[] $roads
 * @property User $updatedBy
 */
class EnumRoadType extends ActiveRecord
{
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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%enum_road_type}}';
    }

    public static function create
    (
        $title_uz,
        $title_oz,
        $title_ru,
        $code_name,
        $status
    ): EnumRoadType
    {
        $item = new static();
        $item->title_uz = $title_uz;
        $item->title_oz = $title_oz;
        $item->title_ru = $title_ru;
        $item->code_name = $code_name;
        $item->status = $status;
        return $item;
    }

    public function edit(
        $title_uz,
        $title_oz,
        $title_ru,
        $code_name,
        $status
    )
    {
        $this->title_uz = $title_uz;
        $this->title_oz = $title_oz;
        $this->title_ru = $title_ru;
        $this->code_name = $code_name;
        $this->status = $status;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'string', 'max' => 255],
            [['title_uz', 'title_oz', 'title_ru', 'code_name'], 'unique', 'targetAttribute' => ['title_uz', 'title_oz', 'title_ru', 'code_name']],
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
            'title_uz'      => Yii::t('app', "Yo'l turi kiril"),
            'title_oz'      => Yii::t('app', "Yo'l turi lotin"),
            'title_ru'      => Yii::t('app', "Yo'l turi rus"),
            'code_name'     => Yii::t('app', 'Kodi'),
            'status'        => Yii::t('app', 'Holati'),
            'created_by'    => Yii::t('app', 'Yaratgan foydalanuvchi'),
            'updated_by'    => Yii::t('app', 'Tahrirlagan foydalanuvchi'),
            'created_at'    => Yii::t('app', 'Yaratilgan vaqti'),
            'updated_at'    => Yii::t('app', 'Yangilangan vaqti'),
        ];
    }

    /**
     * Gets query for [[Roads]].
     *
     * @return ActiveQuery
     */
    public function getRoads()
    {
        return $this->hasMany(Road::class, ['type_id' => 'id']);
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
}
