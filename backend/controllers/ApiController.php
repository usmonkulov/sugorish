<?php

namespace backend\controllers;

use settings\entities\enums\EnumRegions;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;

class ApiController extends Controller
{
    public $titleLang = null;
    public $shortTitleLang = null;

    public function init()
    {
        parent::init();
        $this->titleLang = "title_" . Yii::$app->language;
        $this->shortTitleLang = "short_" . Yii::$app->language;
    }

    public function actionDistricts($selected = '')
    {
        $out = [];
        $titleLang = $this->titleLang;
        if (Yii::$app->request->post('depdrop_parents') != null && isset(Yii::$app->request->post('depdrop_parents')[0])) {
            $regionId = (int)Yii::$app->request->post('depdrop_parents')[0];
            $out = EnumRegions::find()->select('id,' . $titleLang . ' AS name')->where(["parent_id" => $regionId])->asArray()->all();
            return Json::encode(['output' => $out, 'selected' => $selected]);
        }
        return Json::encode(['output' => '', 'selected' => '1']);
    }
}