<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2"><?= Html::encode($this->title) ?> :(</h2>
            <p class="mb-4 mx-2">Kechirasiz! 😖  bunday sahifa mavjud emas.</p>
            <a href="/" class="btn btn-primary"><?=Yii::t('app', "Bosh sahifaga o'tish")?></a>
            <div class="mt-3">
                <?= Html::img('/assets/img/illustrations/page-misc-error-light.png', [
                    'alt' => 'page-misc-error-light',
                    'width' => '500',
                    'class' => 'img-fluid',
                    'data-app-dark-img' => 'illustrations/page-misc-error-dark.png',
                    'data-app-light-img' => 'illustrations/page-misc-error-light.png'
                ])?>
            </div>
        </div>
    </div>
    <!-- /Error -->

</div>
