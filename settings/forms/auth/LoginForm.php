<?php
namespace settings\forms\auth;

use settings\entities\user\User;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'username' => Yii::t('app', 'Foydalanuvchi nomi'),
            'password' => Yii::t('app', 'Parol'),
            'rememberMe' => Yii::t('app', 'Eslab qolish'),
        ];
    }
}
