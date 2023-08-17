<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAuthAsset;
use settings\repositories\UserNameRepository;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAuthAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="<?= Yii::$app->language ?>"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?= Html::encode($this->title) ?></title>

    <meta name="description" content="<?= Html::encode($this->title) ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <?=$content?>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->

<div class="buy-now">
    <?= Html::a('<i class="bx bx-rotate-right"></i>', ['/login'], ['class' => 'btn btn-primary btn-buy-now','title'=>Yii::t('app','Qayta yuklash')]) ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
