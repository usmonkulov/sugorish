<?php

namespace settings\services\irrigation;

use settings\entities\irrigation\Road;
use settings\forms\irrigation\RoadForm;
use settings\repositories\irrigation\RoadRepository;

class RoadService
{
    private $roadRepository;

    public function __construct(
        RoadRepository $roadRepository
    ){
        $this->roadRepository = $roadRepository;
    }

    public function create(RoadForm $form): Road
    {
        $roadRepository = Road::create(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->km,
            $form->code_name,
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


    public function edit($id, RoadForm $form)
    {
        $road = $this->roadRepository->get($id);
        $road->edit(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->km,
            $form->code_name,
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

    public function remove($id)
    {
        $road = $this->roadRepository->get($id);
        $this->roadRepository->remove($road);
    }
}