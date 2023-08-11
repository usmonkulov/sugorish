<?php

namespace settings\repositories\enum;

use settings\entities\enums\EnumRoadType;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use Throwable;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class EnumRoadTypeRepository
{
    /**
     * @param $id
     * @return array|EnumRoadType|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|EnumRoadType[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $type = 't';
        return EnumRoadType::find()
            ->select('*')
            ->alias("{$type}")
            ->where(["{$type}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @return array|EnumRoadType[]|ActiveRecord[]
     */
    public static function findCodeTitleAllForSelect()
    {
        $type = 't';
        return EnumRoadType::find()
            ->select([
                "{$type}.id",
                "CONCAT({$type}.code_name, '', '(',{$type}.title_oz ,')') as title",
            ])
            ->alias("{$type}")
            ->andWhere(["{$type}.status"           => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|EnumRoadType[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return EnumRoadType::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|EnumRoadType|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($type = EnumRoadType::find()->where($condition)->limit(1)->one())) {
            return $type;
        }
        throw new NotFoundException(Yii::t('app', 'Enum Road Type is not found!'));
    }

    /**
     * @param EnumRoadType $type
     */
    public function save(EnumRoadType $type)
    {
        if (!$type->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param EnumRoadType $type
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove(EnumRoadType $type)
    {
        if (!$type->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}