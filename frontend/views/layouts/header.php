<?php

use settings\helpers\GenderHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
>
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Qidirish..."
                    aria-label="Search..."
                />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <?php
                            if ($user->userProfile->gender == GenderHelper::GENDER_MALE) {
                                echo Html::img('@web/avatar/m.png', ['class' => 'w-px-40 h-auto rounded-circle', 'alt' => GenderHelper::GENDER_FEMALE]);
                            } elseif ($user->userProfile->gender == GenderHelper::GENDER_FEMALE) {
                                echo Html::img('@web/avatar/f.png', ['class' => 'w-px-40 h-auto rounded-circle', 'alt' => GenderHelper::GENDER_FEMALE]);
                            } else {
                                echo Html::img('@web/avatar/user.png', ['class' => 'w-px-40 h-auto rounded-circle', 'alt' => 'User Image']);
                            }
                        ?>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <?= Html::tag('span', !empty($user->userProfile->user_id) ? $user->userProfile->first_name . ' ' . $user->userProfile->last_name : $user->username, ['class' => 'fw-semibold d-block']);?>
                                    <?= Html::tag('small', implode(', ', ArrayHelper::getColumn(Yii::$app->authManager->getRolesByUser($user->id), 'description')), ['class' => 'text-muted'])?>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <?php
                            echo Html::a(Html::tag('i','', ['class' => 'bx bxs-user-account me-2']).Html::tag('span', Yii::t('app', "Mening profilim"),['class' => 'align-middle']), ['user-profile/update', 'id' => $user->id],
                            ['class' => 'dropdown-item']);
//                            if (empty($user->id)) {
//                                echo Html::a(Html::tag('i','', ['class' => 'bx bx-user me-2']).Html::tag('span', Yii::t('app', "Mening profilim"),['class' => 'align-middle']), ['user-profile/view', 'id' => $user->id],
//                                    ['class' => 'dropdown-item']);
//                            } else {
//                                echo Html::a(Html::tag('i','', ['class' => 'bx bx-user me-2']).Html::tag('span', Yii::t('app', "Mening profilim"),['class' => 'align-middle']), ['user-profile/update', 'id' => $user->id],
//                                    ['class' => 'dropdown-item']);
//                            }
                        ?>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <?= Html::a(
                            '<i class="bx bx-power-off me-2"></i> <span class="align-middle">' . Yii::t('app', ' Chiqish') .'</span>',
                            ['/auth/auth/logout'],
                            ['data-method' => 'post', 'class' => 'dropdown-item']
                        ) ?>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>