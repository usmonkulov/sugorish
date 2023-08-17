<?php

namespace settings\services\irrigation;

use settings\entities\irrigation\RoadIrrigationTask;
use settings\forms\irrigation\RoadIrrigationTaskForm;
use settings\repositories\irrigation\RoadIrrigationTaskRepository;
use yii\db\StaleObjectException;

class RoadIrrigationTaskService
{
    private $roadIrrigationTaskRepository;

    /**
     * RoadService constructor.
     * @param RoadIrrigationTaskRepository $roadIrrigationTaskRepository
     */
    public function __construct(
        RoadIrrigationTaskRepository $roadIrrigationTaskRepository
    ){
        $this->roadIrrigationTaskRepository = $roadIrrigationTaskRepository;
    }

    /**
     * @param RoadIrrigationTaskForm $form
     * @return RoadIrrigationTask
     */
    public function create(RoadIrrigationTaskForm $form): RoadIrrigationTask
    {
        $roadIrrigationTask = RoadIrrigationTask::create(
            $form->road_id,
            $form->start_time,
            $form->end_time,
            $form->status,
            $form->status_color,
            $form->description,
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
            $form->status,
            $form->status_color,
            $form->description,
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