<?php

namespace settings\repositories\enum;

use settings\entities\enums\EnumRegions;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class EnumRegionsRepository
{
    /**
     * @param $id
     * @return array|EnumRegions|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|EnumRegions[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $regions = 'r';
        return EnumRegions::find()
            ->select('*')
            ->alias("{$regions}")
            ->where(["{$regions}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|EnumRegions[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return EnumRegions::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|EnumRegions|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($regions = EnumRegions::find()->where($condition)->limit(1)->one())) {
            return $regions;
        }
        throw new NotFoundException(Yii::t('app', 'Enum Regions is not found!'));
    }

    /**
     * @param EnumRegions $regions
     */
    public function save(EnumRegions $regions)
    {
        if (!$regions->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param EnumRegions $regions
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(EnumRegions $regions)
    {
        if (!$regions->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}