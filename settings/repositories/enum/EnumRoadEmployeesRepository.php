<?php


namespace settings\repositories\enum;


use settings\entities\enums\EnumRoadEmployees;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class EnumRoadEmployeesRepository
{
    /**
     * @param $id
     * @return array|EnumRoadEmployees|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|EnumRoadEmployees[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $employees = 'e';
        return EnumRoadEmployees::find()
            ->select('*')
            ->alias("{$employees}")
            ->where(["{$employees}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @param $fields
     * @return array|EnumRoadEmployees[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return EnumRoadEmployees::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|EnumRoadEmployees|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($employees = EnumRoadEmployees::find()->where($condition)->limit(1)->one())) {
            return $employees;
        }
        throw new NotFoundException(Yii::t('app', 'Enum Road Employees is not found!'));
    }

    /**
     * @param EnumRoadEmployees $employees
     */
    public function save(EnumRoadEmployees $employees)
    {
        if (!$employees->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param EnumRoadEmployees $employees
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(EnumRoadEmployees $employees)
    {
        if (!$employees->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}