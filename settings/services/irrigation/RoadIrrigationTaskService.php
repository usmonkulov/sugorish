<?php

namespace settings\services\irrigation;

use settings\entities\irrigation\RoadIrrigationTask;
use settings\forms\irrigation\RoadIrrigationTaskForm;
use settings\repositories\irrigation\RoadIrrigationTaskRepository;
use settings\repositories\irrigation\RoadRepository;
use settings\status\irrigation\RoadIrrigationTaskStatus;
use Yii;
use yii\db\StaleObjectException;

class RoadIrrigationTaskService
{
    private $roadIrrigationTaskRepository;
    private $roadRepository;

    public function __construct(
        RoadIrrigationTaskRepository $roadIrrigationTaskRepository,
        RoadRepository $roadRepository
    ){
        $this->roadIrrigationTaskRepository = $roadIrrigationTaskRepository;
        $this->roadRepository = $roadRepository;
    }

    public function create($road_id, RoadIrrigationTaskForm $form)
    {
        $roadIrrigationTask = $this->roadIrrigationTaskRepository->findOneColorStatus($road_id);
        if(!empty($roadIrrigationTask->color_status)){
            $roadIrrigationTask->color_status = RoadIrrigationTaskStatus::COLOR_STATUS_PASSED_THE_PROCESS;
            $this->roadIrrigationTaskRepository->save($roadIrrigationTask);
        }

        $diff = abs(strtotime($form->end_time) - strtotime($form->start_time));

        $years   = floor($diff / (365*60*60*24));
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60));

        $roadIrrigationTask = RoadIrrigationTask::create(
            $road_id,
            $form->start_time,
            $form->end_time,
            $form->watering_time = date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' +48 hour')),
            $form->how_long = $hours . ' soat ' . $minuts . ' minut ' . $seconds . ' sekund suv quyildi',
            $form->content,
        );

        $this->roadIrrigationTaskRepository->save($roadIrrigationTask);
        return $roadIrrigationTask;
    }

    /**
     * @param $id
     * @param RoadIrrigationTaskForm $form
     */
    public function edit($id, RoadIrrigationTaskForm $form)
    {
        $roadIrrigationTask = $this->roadIrrigationTaskRepository->get($id);
        $roadIrrigationTask->edit(
            $form->road_id,
            $form->start_time,
            $form->end_time,
            $form->watering_time,
            $form->how_long,
            $form->content,
        );
        $this->roadIrrigationTaskRepository->save($roadIrrigationTask);
    }

    /**
     * @param $id
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $roadIrrigationTask = $this->roadIrrigationTaskRepository->get($id);
        $this->roadIrrigationTaskRepository->remove($roadIrrigationTask);
    }
}