<?php

namespace settings\entities\user;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_profile}}".
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $middle_name
 * @property string $birthday
 * @property string $gender
 * @property int $status
 * @property string $address
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property User $createdBy
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'address', 'created_by'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 1],
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
            'user_id' =>        Yii::t('app', 'User ID'),
            'first_name' =>     Yii::t('app', 'Familiya'),
            'last_name' =>      Yii::t('app', 'Ism'),
            'middle_name' =>    Yii::t('app', 'Otasining ismi'),
            'birthday' =>       Yii::t('app', 'Tug\'ilgan kun'),
            'gender' =>         Yii::t('app', 'Jinsi'),
            'status' =>         Yii::t('app', 'Holati'),
            'address' =>        Yii::t('app', 'Manzil'),
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
