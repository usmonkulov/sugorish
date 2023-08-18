<?php

/* @var $this \yii\web\View */
/* @var $content string */

use settings\repositories\UserNameRepository;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
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

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?= $this->render('left.php'); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <?= $this->render('header.php'); ?>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!--Content  -->
                <div class="container-xxl flex-grow-1 container-p-y">
                     <?=$content?>
                     <?= Alert::widget() ?>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?= $this->render('footer.php'); ?>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="buy-now">
    <a
            href="/"
            class="btn btn-primary btn-buy-now"
    ><?=Yii::t('app', "Bosh sahifa")?></a
    >
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();