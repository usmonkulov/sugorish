<?php

namespace settings\entities\user;

use settings\entities\enums\EnumRoadEmployees;
use settings\entities\enums\EnumRoadPosition;
use settings\entities\enums\EnumRoadType;
use settings\entities\EventTrait;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use settings\entities\AggregateRoot;
use settings\entities\irrigation\Road;
use settings\entities\irrigation\RoadIrrigationTask;
use settings\entities\user\events\UserSignUpConfirmed;
use settings\entities\user\events\UserSignUpRequested;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $email_confirm_token
 * @property string $phone
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EnumRoadEmployees[] $enumRoadEmployeesCreatedBy
 * @property EnumRoadEmployees[] $enumRoadEmployeesUpdatedBy
 * @property EnumRoadPosition[] $enumRoadPositionCreatedBy
 * @property EnumRoadPosition[] $enumRoadPositionsUpdatedBy
 * @property EnumRoadType[] $enumRoadTypesCreatedBy
 * @property EnumRoadType[] $enumRoadTypesUpdatedBy
 * @property RoadIrrigationTask[] $roadIrrigationTasksCreatedBy
 * @property RoadIrrigationTask[] $roadIrrigationTasksUpdatedBy
 * @property Road[] $roadsCreatedBy
 * @property Road[] $roadsUpdatedBy
 * @property UserProfile $userProfile
 * @property UserProfile[] $userProfilesCreatedBy
 * @property UserProfile[] $userProfilesUpdatedBy
 * @property UserRefreshToken[] $userRefreshTokens
 */

class User extends ActiveRecord implements AggregateRoot
{
    use EventTrait;

    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;

    public static function create(string $username, string $email, string $phone, string $password): self
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->phone = $phone;
        $user->setPassword(!empty($password) ? $password : Yii::$app->security->generateRandomString());
        $user->created_at = time();
        $user->status = self::STATUS_ACTIVE;
        $user->auth_key = Yii::$app->security->generateRandomString();
        return $user;
    }

    public function edit(string $username, string $email, string $phone, string $password): void
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->setPassword(!empty($password) ? $password : Yii::$app->security->generateRandomString());
        $this->updated_at = time();
    }

    public function editProfile(string $email, string $phone): void
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->updated_at = time();
    }

    public static function requestSignup(string $username, string $email, string $phone, string $password): self
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->phone = $phone;
        $user->setPassword($password);
        $user->created_at = time();
        $user->status = self::STATUS_ACTIVE;
        $user->email_confirm_token = Yii::$app->security->generateRandomString();
        $user->generateAuthKey();
        $user->recordEvent(new UserSignUpRequested($user));
        return $user;
    }

    public function confirmSignup(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException(Yii::t("app","Foydalanuvchi allaqachon faol."));
        }
        $this->status = self::STATUS_ACTIVE;
        $this->email_confirm_token = null;
        $this->recordEvent(new UserSignUpConfirmed($this));
    }

    public function requestPasswordReset(): void
    {
        if (!empty($this->password_reset_token) && self::isPasswordResetTokenValid($this->password_reset_token)) {
            throw new \DomainException(Yii::t("app","Parolni tiklash allaqachon so'ralgan."));
        }
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function resetPassword($password): void
    {
        if (empty($this->password_reset_token)) {
            throw new \DomainException(Yii::t("app","Parolni tiklash talab qilinmaydi."));
        }
        $this->setPassword($password);
        $this->password_reset_token = null;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => SaveRelationsBehavior::className(),
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' =>             Yii::t('app', 'ID raqami'),
            'username' =>       Yii::t('app', 'Login'),
            'email' =>          Yii::t('app', 'Pochta'),
            'phone' =>          Yii::t('app', 'Telefon'),
            'status' =>         Yii::t('app', 'Holati'),
            'created_at' =>     Yii::t('app', 'Yaratilgan vaqt'),
            'updated_at' =>     Yii::t('app', "O'zgartirilgan vaqt"),
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    private function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    private function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Gets query for [[EnumRoadEmployeesCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadEmployeesCreatedBy()
    {
        return $this->hasMany(EnumRoadEmployees::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadEmployeesUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadEmployeesUpdatedBy()
    {
        return $this->hasMany(EnumRoadEmployees::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadPositionsCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadPositionCreatedBy()
    {
        return $this->hasMany(EnumRoadPosition::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadPositionsUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadPositionsUpdatedBy()
    {
        return $this->hasMany(EnumRoadPosition::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadTypesCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadTypesCreatedBy()
    {
        return $this->hasMany(EnumRoadType::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[EnumRoadTypesUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getEnumRoadTypesUpdatedBy()
    {
        return $this->hasMany(EnumRoadType::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[RoadIrrigationTasks]].
     *
     * @return ActiveQuery
     */
    public function getRoadIrrigationTasksCreatedBy()
    {
        return $this->hasMany(RoadIrrigationTask::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[RoadIrrigationTasksUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getRoadIrrigationTasksUpdatedBy()
    {
        return $this->hasMany(RoadIrrigationTask::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[RoadsCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getRoadsCreatedBy()
    {
        return $this->hasMany(Road::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[RoadsUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getRoadsUpdatedBy()
    {
        return $this->hasMany(Road::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserProfile]].
     *
     * @return ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserProfilesCreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUserProfilesCreatedBy()
    {
        return $this->hasMany(UserProfile::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[UserProfilesUpdatedBy]].
     *
     * @return ActiveQuery
     */
    public function getUserProfilesUpdatedBy()
    {
        return $this->hasMany(UserProfile::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserRefreshTokens]].
     *
     * @return ActiveQuery
     */
    public function getUserRefreshTokens()
    {
        return $this->hasMany(UserRefreshToken::class, ['user_id' => 'id']);
    }
}
