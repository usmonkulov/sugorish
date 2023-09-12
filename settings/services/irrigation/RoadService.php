<?php

namespace settings\services\irrigation;

use settings\entities\irrigation\Road;
use settings\entities\irrigation\RoadIrrigationTask;
use settings\forms\irrigation\RoadForm;
use settings\helpers\Transaction;
use settings\repositories\irrigation\RoadIrrigationTaskRepository;
use settings\repositories\irrigation\RoadRepository;
use settings\status\irrigation\RoadStatus;
use Yii;
use yii\db\StaleObjectException;

class RoadService
{
    private $transaction;
    private $roadRepository;
    private $roadIrrigationTaskRepository;


    public function __construct(
        Transaction     $transaction,
        RoadRepository  $roadRepository,
        RoadIrrigationTaskRepository $roadIrrigationTaskRepository

    ){
        $this->transaction = $transaction;
        $this->roadRepository = $roadRepository;
        $this->roadIrrigationTaskRepository = $roadIrrigationTaskRepository;
    }


    public function create(RoadForm $form)
    {
        return $this->transaction->wrap(function () use ($form) {
            $roadRepository = Road::create(
                $form->title_uz,
                $form->title_oz,
                $form->title_ru,
                $form->start_km,
                $form->end_km,
                $form->code_name,
                $form->field_number,
                $form->address,
                $form->coordination,
                $form->region_id,
                $form->district_id,
                $form->type_id,
                $form->enterprise_expert_id,
                $form->plot_chief_id,
                $form->water_employee_id,
                $form->status,
                $form->image_url,
            );

            $this->roadRepository->save($roadRepository);
            $date =  date('Y-m-d H:i:s');
            $diff = abs(strtotime($date) - strtotime($date));

            $years   = floor($diff / (365*60*60*24));
            $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));

            $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);

            $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60));
            $roadIrrigationTask = RoadIrrigationTask::create(
                $roadRepository->id,
                date('Y-m-d H:i:s', strtotime('0001-01-01 00:00:00')),
                date('Y-m-d H:i:s', strtotime('0001-01-01 00:00:00')),
                date('Y-m-d H:i:s', strtotime( date($this->roadIrrigationTaskRepository->findOneDate()->watering_time) . ' -48 hour')),
       $hours . ' soat ' . $minuts . ' minut ' . $seconds . ' sekund suv quyildi',
                Yii::t('app', "Iltimos Sug'orish rejimini kiriting"),
            );
            $this->roadIrrigationTaskRepository->save($roadIrrigationTask);

            return $roadRepository;
        });
    }

    /**
     * @param $id
     * @param RoadForm $form
     */
    public function edit($id, RoadForm $form)
    {
        $road = $this->roadRepository->get($id);
        $road->edit(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->start_km,
            $form->end_km,
            $form->code_name,
            $form->field_number,
            $form->address,
            $form->coordination,
            $form->region_id,
            $form->district_id,
            $form->type_id,
            $form->enterprise_expert_id,
            $form->plot_chief_id,
            $form->water_employee_id,
            $form->status,
            $form->image_url,
        );
        $this->roadRepository->save($road);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $road = $this->roadRepository->get($id);
        $road->status = ($road->status == RoadStatus::STATUS_INACTIVE) ? RoadStatus::STATUS_ACTIVE : RoadStatus::STATUS_INACTIVE;
        $this->roadRepository->save($road);
    }

    /**
     * @param $id
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $road = $this->roadRepository->get($id);
        $this->roadRepository->remove($road);
    }
}