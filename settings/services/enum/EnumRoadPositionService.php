<?php

namespace settings\services\enum;

use settings\entities\enums\EnumRoadPosition;
use settings\forms\enum\EnumRoadPositionForm;
use settings\repositories\enum\EnumRoadPositionRepository;
use settings\status\enum\EnumRoadPositionStatus;
use Throwable;
use yii\db\StaleObjectException;

class EnumRoadPositionService
{
    private $positionRepository;

    /**
     * EnumRoadPositionService constructor.
     * @param EnumRoadPositionRepository $positionRepository
     */
    public function __construct(
        EnumRoadPositionRepository $positionRepository
    ){
        $this->positionRepository = $positionRepository;
    }

    /**
     * @param EnumRoadPositionForm $form
     * @return EnumRoadPosition
     */
    public function create(EnumRoadPositionForm $form): EnumRoadPosition
    {
        $positionRepository = EnumRoadPosition::create(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->code_name,
            $form->status
        );
        $this->positionRepository->save($positionRepository);
        return $positionRepository;
    }

    /**
     * @param $id
     * @param EnumRoadPositionForm $form
     */
    public function edit($id, EnumRoadPositionForm $form)
    {
        $position = $this->positionRepository->get($id);
        $position->edit(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->code_name,
            $form->status,
        );
        $this->positionRepository->save($position);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $position = $this->positionRepository->get($id);
        $position->status = ($position->status == EnumRoadPositionStatus::STATUS_INACTIVE) ? EnumRoadPositionStatus::STATUS_ACTIVE : EnumRoadPositionStatus::STATUS_INACTIVE;
        $this->positionRepository->save($position);
    }

    /**
     * @param $id
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $road = $this->positionRepository->get($id);
        $this->positionRepository->remove($road);
    }
}