<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppErrorAsset;
use yii\helpers\Html;

AppErrorAsset::register($this);
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
    class="light-style"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <meta name="description" content="<?= Html::encode($this->title) ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
</head>

<body>
<?php $this->beginBody() ?>
<!-- Content -->
    <?=$content?>
<!-- / Content -->

<div class="buy-now">
    <?= Html::a('<i class="bx bx-home"></i>', ['/'], ['class' => 'btn btn-primary btn-buy-now','title'=>Yii::t('app','Qayta yuklash')]) ?>
</div>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();