<?php

use andrewdanilov\yandexmap\YandexMap;
use kartik\widgets\DateTimePicker;
use kartik\widgets\TimePicker;
use settings\forms\irrigation\RoadIrrigationTaskForm;
use settings\repositories\irrigation\RoadIrrigationTaskRepository;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model settings\entities\irrigation\Road */
/* @var $form RoadIrrigationTaskForm */
/* @var $activeForm ActiveForm */

$this->title = $model->title_oz;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', "Yo'llar"), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$roadIrrigationDate = (new RoadIrrigationTaskRepository())->findOneColorStatus($model->id);
?>
<div class="road-view">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?=Yii::t('app',"Yo'llar")?> /</span> <?=$this->title?></h4>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Sug'orish vaqtini kiritish</h5>
                        <small class="text-muted float-end">Sug'orish</small>
                    </div>
                <div class="card-body">
                    <!-- START ALERTS AND CALLOUTS -->
                    <?php if(Yii::$app->session->hasFlash('success') ): ?>
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif;?>
                    <!-- END ALERTS AND CALLOUTS -->
                    <?php $activeForm = ActiveForm::begin(); ?>

                    <?= $activeForm->field($form, 'start_time', [
                        'options' => [
                            'tag' => 'div',
                            'class' => 'mb-3'
                        ],
                        'labelOptions' => [ 'class' => 'form-label' ],
                        'inputOptions' => ['value' => date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' -30 minutes')),],
                    ])->widget(DateTimePicker::class, [
                        'options' => ['placeholder' => Yii::t('app', "Boshlanish vaqtini kiriting")],
                        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd hh:ii',
                            'startDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' -4 hour')),
                            'endDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' +4 hour')),
                        ],
                        'removeIcon' => Html::tag('i', '', ['class' => 'bx bxs-calendar-x', 'style' => 'margin-left: -8px;']),
                        'pickerIcon' =>  Html::tag('i', '', ['class' => 'bx bxs-calendar', 'style' => 'margin-left: -8px;']),
                    ]);?>

                    <?= $activeForm->field($form, 'end_time', [
                        'options' => [
                            'tag' => 'div',
                            'class' => 'mb-3'
                        ],
                        'labelOptions' => [ 'class' => 'form-label' ],
                        'inputOptions' => ['value' => date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . '30 minutes')),],
                    ])->widget(DateTimePicker::class, [
                        'options' => ['placeholder' => Yii::t('app', "Boshlanish vaqtini kiriting")],
                        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd hh:ii',
                            'startDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' -4 hour')),
                            'endDate' =>  date('Y-m-d H:i:s', strtotime( date('Y-m-d H:i:s') . ' +4 hour')),
                        ],
                        'removeIcon' => Html::tag('i', '', ['class' => 'bx bxs-calendar-x', 'style' => 'margin-left: -8px;']),
                        'pickerIcon' =>  Html::tag('i', '', ['class' => 'bx bxs-calendar', 'style' => 'margin-left: -8px;']),
                    ]);?>

                    <?= $activeForm->field($form, 'content', [
                        'options' => [
                            'tag' => 'div',
                            'class' => 'mb-3'
                        ],
                        'labelOptions' => [ 'class' => 'form-label' ],
                    ])->textarea(
                        [
                            'class' => 'form-control',
                            'maxlength' => true,
                            'rows' => '2'
                        ]
                    ) ?>

                    <?= Html::submitButton(Yii::t('app', "Sug'orish"), ['class' => 'btn btn-primary']) ?>
                    <?php ActiveForm::end(); ?>
<!--                    <form>-->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label" for="basic-icon-default-fullname">Tavsifi</label>-->
<!--                            <div class="input-group input-group-merge">-->
<!--                            <span id="basic-icon-default-fullname2" class="input-group-text"-->
<!--                            ><i class="bx bx-user"></i-->
<!--                                ></span>-->
<!--                                <input-->
<!--                                    type="text"-->
<!--                                    class="form-control"-->
<!--                                    id="basic-icon-default-fullname"-->
<!--                                    placeholder="John Doe"-->
<!--                                    aria-label="John Doe"-->
<!--                                    aria-describedby="basic-icon-default-fullname2"-->
<!--                                />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label" for="basic-icon-default-company">Mazmuni</label>-->
<!--                            <div class="input-group input-group-merge">-->
<!--                            <span id="basic-icon-default-company2" class="input-group-text"-->
<!--                            ><i class="bx bx-buildings"></i-->
<!--                                ></span>-->
<!--                                <input-->
<!--                                    type="text"-->
<!--                                    id="basic-icon-default-company"-->
<!--                                    class="form-control"-->
<!--                                    placeholder="ACME Inc."-->
<!--                                    aria-label="ACME Inc."-->
<!--                                    aria-describedby="basic-icon-default-company2"-->
<!--                                />-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label" for="basic-icon-default-start-time">Boshlanish vaqti</label>-->
<!--                            <div class="input-group input-group-merge">-->
<!--                            <span id="basic-icon-default-phone2" class="input-group-text"-->
<!--                            ><i class="bx bxs-hourglass-top"></i-->
<!--                                ></span>-->
<!--                                <input-->
<!--                                    type="time"-->
<!--                                    value="12:30:00"-->
<!--                                    id="html5-time-input"-->
<!--                                    class="form-control"-->
<!--                                />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="mb-3">-->
<!--                            <label class="form-label" for="basic-icon-default-phone">Tugash vaqti</label>-->
<!--                            <div class="input-group input-group-merge">-->
<!--                            <span id="basic-icon-default-phone2" class="input-group-text"-->
<!--                            ><i class="bx bxs-hourglass-bottom"></i-->
<!--                                ></span>-->
<!--                                <input-->
<!--                                    type="time"-->
<!--                                    value="12:30:00"-->
<!--                                    id="html5-time-input"-->
<!--                                    class="form-control"-->
<!--                                />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <button type="submit" class="btn btn-primary">Sug'orish</button>-->
<!--                    </form>-->
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-<?= $roadIrrigationDate->watering_time <= date('Y-m-d H:i:s') ? 'danger' : 'primary'?> text-white mb-3">
            <div class="card-header"><b><?=$model->type->code_name . $model->code_name?></b> "<?=$model->title_oz;?>" <?=$model->start_km . '-' . $model->end_km?> km</div>
                <div class="card-body">
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('district_id')?>:</b> <?=$model->district->title_oz;?></h6>
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('address')?>:</b> <?=strip_tags($model->address);?></h6>
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('field_number')?>:</b> <?=strip_tags($model->field_number);?></h6>
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('coordination')?>:</b> <?=strip_tags($model->coordination);?></h6>
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('enterprise_expert_id')?>:</b> <?=$model->enterpriseExpert->first_name . ' ' . $model->enterpriseExpert->last_name?></h6>
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('plot_chief_id')?>:</b> <?=$model->plotChief->first_name . ' ' . $model->plotChief->last_name?></h6>
                    <h6 class="card-title text-white"><b><?=$model->getAttributeLabel('water_employee_id')?>:</b> <?=$model->waterEmployee->first_name . ' ' . $model->waterEmployee->last_name?></h6>
                    <h6 class="card-title text-white"><b><?=$roadIrrigationDate->start_time?></b> dan <b><?=$roadIrrigationDate->end_time?></b> gacha </h6>
                    <h6 class="card-title text-white"><b><?=$roadIrrigationDate->how_long?></b></h6>
                    <h6 class="card-title text-white"><b>Suv quyish vaqti:</b> <?=$roadIrrigationDate->watering_time?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4" data-key="<?=$key?>">
            <div class="card bg-default text-white mb-3">
                <?= YandexMap::widget([
                    'id'  => 'some-unique-dom-id', // optional, an ID applied to widget wrapper
                    'apikey' => '', // optional, yandex map api key
                    'center' => [
                        'latitude' => explode (",", $model->coordination)[0],
                        'longitude' => explode (",", $model->coordination)[1],
                    ],
                    'zoom' => 19, // optional, default 12
                    'points' => [
                        [
                            'id' => $model->id,
                            'title' => $model->type->code_name . $model->code_name . ' ' . $model->title_oz .' '. $model->coordination,
                            'text' => $model->address,
                            'color' => '#0000ff',
                            'latitude' => explode (",", $model->coordination)[0],
                            'longitude' => explode (",", $model->coordination)[1],
                        ],
                    ],
                    //'pointsUrl' => '/points.json', // url used to get an array of points instead of manual setting the 'points' param
                    'scroll' => true, // optional, zoom map by scrolling, default false
                    'wrapperTag' => 'div', // optional, html tag to wrap the map, default 'div'
                    'wrapperOptions' => [ // optional, attributes passed to \yii\helpers\Html::tag() method for constructing map wrapper
                        'class' => 'map-wrapper',
                        'style' => 'width:100%;height:310px;',
                    ],
                    'jsPointsClickCallback' => 'myCallback',
                ]) ?>
            </div>
        </div>
    </div>
</div>
