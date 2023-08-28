<?php

namespace settings\repositories;

use settings\entities\NotFoundException;
use settings\entities\user\UserProfile;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class UserProfileRepository
{
    /**
     * @param $id
     * @return array|UserProfile|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['user_id' => $id]);
    }

    /**
     * @return array|UserProfile[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $userProfile = 'up';
        return UserProfile::find()
            ->select('*')
            ->alias("{$userProfile}")
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|UserProfile[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return UserProfile::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|UserProfile|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($userProfile = UserProfile::find()->where($condition)->limit(1)->one())) {
            return $userProfile;
        }
        throw new NotFoundException(Yii::t('app', 'User Profile is not found!'));
    }

    /**
     * @param UserProfile $userProfile
     */
    public function save(UserProfile $userProfile)
    {
        if (!$userProfile->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param UserProfile $userProfile
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(UserProfile $userProfile)
    {
        if (!$userProfile->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}