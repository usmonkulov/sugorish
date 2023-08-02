<?php

namespace settings\entities\user;

use settings\entities\road\Road;
use settings\entities\road\RoadTask;
use Yii;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $email_confirm_token
 * @property string $phone
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Road[] $roadsCreatedBy
 * @property Road[] $roadsUpdatedBy
 * @property RoadTask[] $roadTasksCreatedBy
 * @property RoadTask[] $roadTasksUpdatedBy
 * @property UserProfile $userProfile
 * @property UserProfile[] userProfilesUpdatedBy
 * @property UserProfile[] userProfilesCreatedBy
 * @property UserRefreshToken[] $userRefreshTokens
 */
class User extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'phone', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email', 'email_confirm_token', 'phone'], 'string', 'max' => 50],
            [['email_confirm_token'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['phone'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'email_confirm_token' => Yii::t('app', 'Email Confirm Token'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     * @return ActiveQuery
     */
    public function getRoadsCreatedBy()
    {
        return $this->hasMany(Road::class, ['created_by' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoadsUpdatedBy()
    {
        return $this->hasMany(Road::class, ['updated_by' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoadTasksCreatedBy()
    {
        return $this->hasMany(RoadTask::class, ['created_by' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoadTasksUpdatedBy()
    {
        return $this->hasMany(RoadTask::class, ['updated_by' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUserProfilesCreatedBy()
    {
        return $this->hasMany(UserProfile::class, ['created_by' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUserProfilesUpdatedBy()
    {
        return $this->hasMany(UserProfile::class, ['updated_by' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUserRefreshTokens()
    {
        return $this->hasMany(UserRefreshToken::class, ['user_id' => 'id']);
    }
}
