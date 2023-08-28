<?php

namespace settings\services\user;


use settings\entities\user\UserProfile;
use settings\forms\user\UserProfileForm;
use settings\repositories\UserProfileRepository;

class UserProfileService
{
    private $userProfileRepository;

    /**
     * EnumRoadPositionService constructor.
     * @param UserProfileRepository $userProfileRepository
     */
    public function __construct(
        UserProfileRepository $userProfileRepository
    ){
        $this->userProfileRepository = $userProfileRepository;
    }

    /**
     * @param $id
     * @param UserProfileForm $form
     * @return UserProfile
     */
    public function create($id, UserProfileForm $form): UserProfile
    {
        $userProfileRepository = UserProfile::create(
            $form->user_id = $id,
            $form->first_name,
            $form->last_name,
            $form->middle_name,
            $form->birthday,
            $form->gender,
            $form->region_id,
            $form->district_id,
            $form->address,
            $form->avatar,
        );
        $this->userProfileRepository->save($userProfileRepository);
        return $userProfileRepository;
    }

    /**
     * @param $id
     * @param UserProfileForm $form
     */
    public function edit($id, UserProfileForm $form)
    {
        $userProfile = $this->userProfileRepository->get($id);
        $userProfile->edit(
            $form->user_id,
            $form->first_name,
            $form->last_name,
            $form->middle_name,
            $form->birthday,
            $form->gender,
            $form->region_id,
            $form->district_id,
            $form->address,
            $form->avatar,
        );
        $this->userProfileRepository->save($userProfile);
    }
}