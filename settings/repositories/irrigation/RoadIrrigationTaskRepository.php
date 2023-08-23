<?php


namespace settings\repositories\irrigation;


use settings\entities\irrigation\RoadIrrigationTask;
use settings\entities\NotFoundException;
use settings\status\GeneralStatus;
use settings\status\irrigation\RoadIrrigationTaskStatus;
use Yii;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;

class RoadIrrigationTaskRepository
{
    /**
     * @param $id
     * @return array|RoadIrrigationTask|ActiveRecord|null
     */
    public function get($id)
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @return array|RoadIrrigationTask[]|ActiveRecord[]
     */
    public static function findAllForSelect()
    {
        $roadIrrigationTask = 'rit';
        return RoadIrrigationTask::find()
            ->select('*')
            ->alias("{$roadIrrigationTask}")
            ->where(["{$roadIrrigationTask}.status" => GeneralStatus::STATUS_ENABLED])
            ->asArray()
            ->all();
    }

    /**
     * @param $id
     * @return RoadIrrigationTask|null
     */
    public function findOneColorStatus($id){
        return RoadIrrigationTask::findOne([
            'road_id' => $id,
            'color_status' => RoadIrrigationTaskStatus::COLOR_STATUS_PROCESS]);
    }

    public function findOneDate(){
        return RoadIrrigationTask::find()
            ->where(['color_status' => RoadIrrigationTaskStatus::COLOR_STATUS_PROCESS])
            ->orderBy('watering_time asc')
            ->one();
    }

    /**
     * @param $fields
     * @return array|RoadIrrigationTask[]|ActiveRecord[]
     */
    public function fieldAll($fields){
        return RoadIrrigationTask::find()
            ->where(['in', 'id', $fields])
            ->all();
    }

    /**
     * @param array $condition
     * @return array|RoadIrrigationTask|ActiveRecord|null
     */
    private function getBy(array $condition)
    {
        if (!empty($roadIrrigationTask = RoadIrrigationTask::find()->where($condition)->limit(1)->one())) {
            return $roadIrrigationTask;
        }
        throw new NotFoundException(Yii::t('app', 'Road Irrigation Task is not found!'));
    }

    /**
     * @param RoadIrrigationTask $roadIrrigationTask
     */
    public function save(RoadIrrigationTask $roadIrrigationTask)
    {
        if (!$roadIrrigationTask->save()) {
            throw new \RuntimeException(Yii::t('app', 'Saving error.'));
        }
    }

    /**
     * @param RoadIrrigationTask $road
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove(RoadIrrigationTask $roadIrrigationTask)
    {
        if (!$roadIrrigationTask->delete()) {
            throw new \RuntimeException(Yii::t('app', 'Removing error.'));
        }
    }
}