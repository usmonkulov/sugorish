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
            $form->road_name,
            $form->code_name,
            $form->address,
            $form->coordination,
            $form->enterprise_expert,
            $form->plot_chief,
            $form->water_employee,
            $form->status,
            $form->image_url
        );
        $this->roadRepository->save($roadRepository);
        return $roadRepository;
    }


    public function edit($id, RoadForm $form)
    {
        $road = $this->roadRepository->get($id);
        $road->edit(
            $form->road_name,
            $form->code_name,
            $form->address,
            $form->coordination,
            $form->enterprise_expert,
            $form->plot_chief,
            $form->water_employee,
            $form->status,
            $form->image_url
        );
        $this->roadRepository->save($road);
    }

    public function remove($id)
    {
        $road = $this->roadRepository->get($id);
        $this->roadRepository->remove($road);
    }
}