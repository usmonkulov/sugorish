<?php

namespace settings\services\enum;

use settings\entities\enums\EnumRoadEmployees;
use settings\forms\enum\EnumRoadEmployeesForm;
use settings\repositories\enum\EnumRoadEmployeesRepository;
use settings\status\enum\EnumRoadEmployeesStatus;
use Throwable;
use yii\db\StaleObjectException;

class EnumRoadEmployeesService
{
    private $employeesRepository;

    /**
     * EnumRoadPositionService constructor.
     * @param EnumRoadEmployeesRepository $employeesRepository
     */
    public function __construct(
        EnumRoadEmployeesRepository $employeesRepository
    ){
        $this->employeesRepository = $employeesRepository;
    }

    /**
     * @param EnumRoadEmployeesForm $form
     * @return EnumRoadEmployees
     */
    public function create(EnumRoadEmployeesForm $form): EnumRoadEmployees
    {
        $employeesRepository = EnumRoadEmployees::create(
            $form->first_name,
            $form->last_name,
            $form->middle_name,
            $form->birthday,
            $form->phone,
            $form->email,
            $form->gender,
            $form->status,
            $form->position_id,
            $form->code_position,
            $form->region_id,
            $form->district_id,
            $form->address
        );
        $this->employeesRepository->save($employeesRepository);
        return $employeesRepository;
    }

    /**
     * @param $id
     * @param EnumRoadEmployeesForm $form
     */
    public function edit($id, EnumRoadEmployeesForm $form)
    {
        $employees = $this->employeesRepository->get($id);
        $employees->edit(
            $form->first_name,
            $form->last_name,
            $form->middle_name,
            $form->birthday,
            $form->phone,
            $form->email,
            $form->gender,
            $form->status,
            $form->position_id,
            $form->code_position,
            $form->region_id,
            $form->district_id,
            $form->address
        );
        $this->employeesRepository->save($employees);
    }

    /**
     * @param $id
     */
    public function activate($id)
    {
        $employees = $this->employeesRepository->get($id);
        $employees->status = ($employees->status == EnumRoadEmployeesStatus::STATUS_INACTIVE) ? EnumRoadEmployeesStatus::STATUS_ACTIVE : EnumRoadEmployeesStatus::STATUS_INACTIVE;
        $this->employeesRepository->save($employees);
    }

    /**
     * @param $id
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function remove($id)
    {
        $road = $this->employeesRepository->get($id);
        $this->employeesRepository->remove($road);
    }
}