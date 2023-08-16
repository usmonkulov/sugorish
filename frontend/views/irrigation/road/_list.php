<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/* @var $model settings\entities\irrigation\Road */
/* @var $key int*/
?>

<div class="col-md-6 col-xl-4" data-key="<?=$key?>">
    <a href="<?= Url::to(['irrigation/road/view', 'id' => $model->id])?>">
        <div class="card bg-primary text-white mb-3">
            <div class="card-header"><b><?=$model->type->code_name . $model->code_name?></b> "<?=$model->title_oz;?>" <?=$model->start_km . '-' . $model->end_km?> km</div>
            <div class="card-body">
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('district_id')?>:</b> <?=$model->district->title_oz;?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('address')?>:</b> <?=strip_tags($model->address);?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('field_number')?>:</b> <?=strip_tags($model->field_number);?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('coordination')?>:</b> <?=strip_tags($model->coordination);?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('enterprise_expert_id')?>:</b> <?=$model->enterpriseExpert->first_name . ' ' . $model->enterpriseExpert->last_name?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('plot_chief_id')?>:</b> <?=$model->plotChief->first_name . ' ' . $model->plotChief->last_name?></h6>
                <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('water_employee_id')?>:</b> <?=$model->waterEmployee->first_name . ' ' . $model->waterEmployee->last_name?></h6>
            </div>
        </div>
    </a>
</div>