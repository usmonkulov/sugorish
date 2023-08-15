<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

?>

<div class="col-md-6 col-xl-4" data-key="<?=$key?>">
    <a href="<?= Url::to(['irrigation/road/view', 'id' => $model->id])?>">
        <div class="card bg-primary text-white mb-3">
            <div class="card-header"><?=$model->code_name?></div>
            <div class="card-body">
                <p class="card-text"> "<?=$model->title_oz?>"</p>
                <h6 class="card-title text-white"><b>Korxona hodimi:</b> <?=$model->enterpriseExpert->first_name . ' ' . $model->enterpriseExpert->last_name?></h6>
                <h6 class="card-title text-white"><b>Uchastka boshlig'i:</b> <?=$model->plotChief->first_name . ' ' . $model->plotChief->last_name?></h6>
                <h6 class="card-title text-white"><b>Suvchi:</b> <?=$model->waterEmployee->first_name . ' ' . $model->waterEmployee->last_name?></h6>
            </div>
        </div>
    </a>
</div>