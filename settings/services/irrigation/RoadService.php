<?php

namespace settings\services\irrigation;

use settings\entities\irrigation\Road;
use settings\forms\irrigation\RoadForm;
use settings\repositories\irrigation\RoadRepository;
use yii\db\StaleObjectException;

class RoadService
{
    private $roadRepository;

    /**
     * RoadService constructor.
     * @param RoadRepository $roadRepository
     */
    public function __construct(
        RoadRepository $roadRepository
    ){
        $this->roadRepository = $roadRepository;
    }

    /**
     * @param RoadForm $form
     * @return Road
     */
    public function create(RoadForm $form): Road
    {
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
        return $roadRepository;
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
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $road = $this->roadRepository->get($id);
        $this->roadRepository->remove($road);
    }
}