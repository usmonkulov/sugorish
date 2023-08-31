<?php

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\widgets\Select2;
use mihaildev\ckeditor\CKEditor;
use settings\entities\enums\EnumRegions;
use settings\helpers\CommonHelper;
use settings\helpers\GenderHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form settings\forms\user\UserProfileForm */
/* @var $activeForm yii\widgets\ActiveForm */
?>

<div class="user-profile-form">
    <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
                    src="../assets/img/avatars/1.png"
                    alt="user-avatar"
                    class="d-block rounded"
                    height="100"
                    width="100"
                    id="uploadedAvatar"
            />
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Yangi rasm yuklang</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                            type="file"
                            id="upload"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"
                    />
                </label>

                <?= Html::a(Html::tag('i', '', ['class' => 'bx bx-reset d-block d-sm-none']) . Html::tag('span', Yii::t('app', "Bekor qilish"), ['class' => 'd-none d-sm-block']), ['/'], ['class' => 'btn btn-outline-secondary account-image-reset mb-4','title' => Yii::t('yii','Bosh sahifa')]) ?>


                <p class="text-muted mb-0">JPG, GIF, PNG Max size 800K</p>
            </div>
        </div>
    </div>
    <hr class="my-0" />
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
            <div class="row">
                <div class="mb-3 col-md-6">
                    <?= $activeForm->field($form, 'first_name', [
                        'labelOptions' => [ 'class' => 'form-label' ]
                    ])->textInput([
                        'autofocus' => 'autofocus',
                        'class' => 'form-control'
                    ]) ?>

                    <?= $activeForm->field($form, 'last_name', [
                        'labelOptions' => [ 'class' => 'form-label' ]
                    ])->textInput([
                        'autofocus' => 'autofocus',
                        'class' => 'form-control'
                    ]) ?>

                    <?= $activeForm->field($form, 'middle_name', [
                        'labelOptions' => [ 'class' => 'form-label' ]
                    ])->textInput([
                        'autofocus' => 'autofocus',
                        'class' => 'form-control'
                    ]) ?>

                    <?= $activeForm->field($form, 'birthday', [
                        'labelOptions' => [ 'class' => 'form-label' ]
                    ])->widget(DatePicker::class, [
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'options' => [
                            'placeholder' => Yii::t('app',"Tug'ilgan kunni tanlang"),
                        ],
                        'pluginOptions' => [
                            'calendarWeeks' => true,
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy',
                            'startDate' =>  date('d-m-Y', strtotime( date('d-m-Y') . ' -70 year')),
                            'endDate' =>  date('d-m-Y', strtotime( date('d-m-Y') . ' -20 year')),
                        ],
                        'removeIcon' => Html::tag('i', '', ['class' => 'bx bxs-calendar-x', 'style' => 'margin-left: -8px;']),
                        'pickerIcon' =>  Html::tag('i', '', ['class' => 'bx bxs-calendar', 'style' => 'margin-left: -8px;']),
                        'removeButton' => ['title' => Yii::t('app', "Tozalash")],
                        'pickerButton' => ['title' => Yii::t('app', "Tug'ulgan kunni tanlang")],
                    ]);?>

                    <?= $activeForm->field($form, 'gender', [
                        'labelOptions' => [ 'class' => 'form-label' ]
                    ])->radioList(ArrayHelper::map(GenderHelper::getGenderForSelect(), 'id', 'value')) ?>
                </div>

                <div class="mb-3 col-md-6">
                <?= $activeForm->field($form, 'region_id', [
                    'labelOptions' => [ 'class' => 'form-label' ]
                ])->widget(Select2::class, [
                    'data' => CommonHelper::getList(EnumRegions::find()->where(['parent_id' => null])->orderBy('order')->all()),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Viloyatni tanlang") . ' --', 'value' => 1718, 'disabled' => 'disabled'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]) ?>

                <?= $activeForm->field($form, 'district_id', [
                    'labelOptions' => [ 'class' => 'form-label' ]
                ])->widget(DepDrop::class, [
                    'data' => ArrayHelper::map(EnumRegions::findAll(['parent_id' => 1718]),'id','title_oz'),
                    'options' => ['placeholder' => '-- ' . Yii::t('app',"Tuman yoki shaharni tanlang") . ' --'],
                    'pluginOptions' => [
                        'depends' => [Html::getInputId($form, 'region_id')],
                        'placeholder' => Yii::t('app',"Tuman yoki shaharni tanlang"),
                        'url' => Url::to(['/api/districts'])
                    ]
                ]) ?>

                <?= $activeForm->field($form, 'address', [
                    'labelOptions' => [ 'class' => 'form-label' ]
                ])->widget(CKEditor::class,[
                    'editorOptions' => [
                        'preset' => 'basic',
                        'inline' => false,
                    ],
                ]);?>

                </div>
            </div>
            <div class="mt-2">
                <?= Html::submitButton(!isset($model->isNewRecord) ? Yii::t('app', "Qo'shish") : Yii::t('app','Tahrirlash'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success me-2' : 'btn btn-primary me-2']) ?>
                <?= Html::a(Yii::t('app', "Bekor qilish"), ['/'], ['class' => 'btn btn-outline-secondary me-2','title' => Yii::t('yii','Bosh sahifa')]) ?>
            </div>
        </form>
        <?php ActiveForm::end(); ?>
    </div>
</div>
