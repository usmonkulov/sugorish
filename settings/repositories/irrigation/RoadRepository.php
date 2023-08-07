<?php

namespace settings\repositories\irrigation;

use settings\entities\irrigation\Road;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use Yii;

class RoadRepository
{
    /**
     * @param $id
     * @return array|Road|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|Road[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $road = 'r';
        return Road::find()
            ->select('*')
            ->alias("{$road}")
            ->where(["{$road}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|Road[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return Road::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|Road|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($road = Road::find()->where($condition)->limit(1)->one())) {
            return $road;
        }
        throw new NotFoundException(Yii::t('app', 'Road is not found!'));
    }

    /**
     * @param Road $road
     */
    public function save(Road $road)
    {
        if (!$road->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param Road $road
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(Road $road)
    {
        if (!$road->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}