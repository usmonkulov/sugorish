<?php

namespace settings\repositories\enum;

use settings\entities\enums\EnumRoadPosition;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use Throwable;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class EnumRoadPositionRepository
{
    /**
     * @param $id
     * @return array|EnumRoadPosition|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|EnumRoadPosition[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $position = 'p';
        return EnumRoadPosition::find()
            ->select('*')
            ->alias("{$position}")
            ->where(["{$position}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|EnumRoadPosition[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return EnumRoadPosition::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|EnumRoadPosition|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($position = EnumRoadPosition::find()->where($condition)->limit(1)->one())) {
            return $position;
        }
        throw new NotFoundException(Yii::t('app', 'Enum Road Position is not found!'));
    }

    /**
     * @param EnumRoadPosition $position
     */
    public function save(EnumRoadPosition $position)
    {
        if (!$position->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param EnumRoadPosition $position
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove(EnumRoadPosition $position)
    {
        if (!$position->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}