<?php


namespace settings\repositories\enum;


use settings\entities\enums\EnumRoadEmployees;
use settings\entities\NotFoundException;
use settings\helpers\EmployeesPositionHelper;
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
     * @return array|EnumRoadEmployees[]|ActiveRecord[]
     */
    public static function findEnterpriseExpertAllForSelect()
    {
        $employees = 'e';
        return EnumRoadEmployees::find()
            ->select([
                "{$employees}.id",
                "CONCAT({$employees}.first_name, ' ', {$employees}.last_name, ' ', {$employees}.middle_name) as title",
            ])
            ->alias("{$employees}")
            ->andWhere(["{$employees}.status"           => GeneralStatus::STATUS_ENABLED])
            ->andWhere(["{$employees}.code_position"    => EmployeesPositionHelper::POSITION_ENTERPRISE_EXPERT])
            ->asArray()
            ->all();
    }

    /**
     * @return array|EnumRoadEmployees[]|ActiveRecord[]
     */
    public static function findPlotChiefAllForSelect()
    {
        $employees = 'e';
        return EnumRoadEmployees::find()
            ->select([
                "e.id",
                "CONCAT(e.first_name, ' ', e.last_name, ' ', e.middle_name) as title",
            ])
            ->alias("{$employees}")
            ->andWhere(["{$employees}.status"           => GeneralStatus::STATUS_ENABLED])
            ->andWhere(["{$employees}.code_position"    => EmployeesPositionHelper::POSITION_PLOT_CHIEF])
            ->asArray()
            ->all();
    }

    /**
     * @return array|EnumRoadEmployees[]|ActiveRecord[]
     */
    public static function findWorkerAllForSelect()
    {
        $employees = 'e';
        return EnumRoadEmployees::find()
            ->select([
                "e.id",
                "CONCAT(e.first_name, ' ', e.last_name, ' ', e.middle_name) as title",
            ])
            ->alias("{$employees}")
            ->andWhere(["{$employees}.status"           => GeneralStatus::STATUS_ENABLED])
            ->andWhere(["{$employees}.code_position"    => EmployeesPositionHelper::POSITION_WORKER])
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