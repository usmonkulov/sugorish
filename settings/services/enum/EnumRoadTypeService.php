<?php

namespace settings\services\enum;

use settings\entities\enums\EnumRoadType;
use settings\forms\enum\EnumRoadTypeForm;
use settings\repositories\enum\EnumRoadTypeRepository;
use settings\status\enum\EnumRoadTypeStatus;
use Throwable;
use yii\db\StaleObjectException;

class EnumRoadTypeService
{
    private $typeRepository;

    /**
     * EnumRoadPositionService constructor.
     * @param EnumRoadTypeRepository $typeRepository
     */
    public function __construct(
        EnumRoadTypeRepository $typeRepository
    ){
        $this->typeRepository = $typeRepository;
    }

    /**
     * @param EnumRoadTypeForm $form
     * @return EnumRoadType
     */
    public function create(EnumRoadTypeForm $form): EnumRoadType
    {
        $typeRepository = EnumRoadType::create(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->code_name,
            $form->status
        );
        $this->typeRepository->save($typeRepository);
        return $typeRepository;
    }

    /**
     * @param $id
     * @param EnumRoadTypeForm $form
     */
    public function edit($id, EnumRoadTypeForm $form)
    {
        $position = $this->typeRepository->get($id);
        $position->edit(
            $form->title_uz,
            $form->title_oz,
            $form->title_ru,
            $form->code_name,
            $form->status,
        );
        $this->typeRepository->save($position);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $position = $this->typeRepository->get($id);
        $position->status = ($position->status == EnumRoadTypeStatus::STATUS_INACTIVE) ? EnumRoadTypeStatus::STATUS_ACTIVE : EnumRoadTypeStatus::STATUS_INACTIVE;
        $this->typeRepository->save($position);
    }

    /**
     * @param $id
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $road = $this->typeRepository->get($id);
        $this->typeRepository->remove($road);
    }
}