<?php

use settings\helpers\GenderHelper;
use settings\repositories\enum\EnumRoadEmployeesRepository;
use settings\repositories\enum\EnumRoadPositionRepository;
use settings\repositories\irrigation\RoadRepository;
use settings\repositories\UserNameRepository;
use settings\repositories\UserRepository;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">AD</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

<!--                <li class="dropdown messages-menu">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                        <i class="fa fa-road"></i>-->
<!--                        <span class="label label-success">4</span>-->
<!--                    </a>-->
<!--                </li>-->

                <?=Html::tag('li', Html::a(Html::tag('i', '', ['class' => 'fa fa-road']) . Html::tag('span', (new RoadRepository())->roadAllCount(), ['class' => 'label label-danger']), '/admin/irrigation/road/index'), ['class' => 'dropdown tasks-menu', 'title' => Yii::t('app', "Yo'llar")])?>
                <?=Html::tag('li', Html::a(Html::tag('i', '', ['class' => 'fa fa-user-secret']) . Html::tag('span', (new EnumRoadEmployeesRepository())->employeesAllCount(), ['class' => 'label label-danger']), '/admin/enum/enum-road-employees'), ['class' => 'dropdown tasks-menu', 'title' => Yii::t('app', "Hodimlar")])?>
                <?=Html::tag('li', Html::a(Html::tag('i', '', ['class' => 'fa fa-align-center']) . Html::tag('span', (new EnumRoadPositionRepository())->positionAllCount(), ['class' => 'label label-danger']), '/admin/enum/enum-road-position'), ['class' => 'dropdown tasks-menu', 'title' => Yii::t('app', "Lavozimlar")])?>
                <?=Html::tag('li', Html::a(Html::tag('i', '', ['class' => 'fa fa-users']) . Html::tag('span', (new UserNameRepository())->userAllCount(), ['class' => 'label label-danger']), '/admin/user/index'), ['class' => 'dropdown tasks-menu', 'title' => Yii::t('app', "Foydalanuvchilar")])?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                            if ($user->userProfile->gender == GenderHelper::GENDER_MALE) {
                                echo Html::img('@web/avatar/m.png', ['class' => 'user-image', 'alt' => GenderHelper::GENDER_FEMALE]);
                            } elseif ($user->userProfile->gender == GenderHelper::GENDER_FEMALE) {
                                echo Html::img('@web/avatar/f.png', ['class' => 'user-image', 'alt' => GenderHelper::GENDER_FEMALE]);
                            } else {
                                echo Html::img('@web/avatar/user.png', ['class' => 'user-image', 'alt' => 'User Image']);
                            }
                        ?>
                        <?= Html::tag('span', !empty($user->userProfile->user_id) ? $user->userProfile->first_name . ' ' . $user->userProfile->last_name : $user->username, ['class' => 'hidden-xs'])?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
<!--                                <a href="#" class="btn btn-default btn-flat">Profilga kirish</a>-->
                                <?= Html::a(
                                    '<i class="fa fa-user"></i> ' . Yii::t('app', ' Profilga kirish'),
                                    ['/user/view', 'id' => Yii::$app->user->id],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                     '<i class="fa fa-sign-out"></i> ' . Yii::t('app', ' Chiqish'),
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
