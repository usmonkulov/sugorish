<?php


namespace settings\helpers;


use Yii;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class CommonHelper extends BaseObject
{
    /**
     * @return string
     */
    public static function getNameLang()
    {
        return "name_" . Yii::$app->language;
    }

    public static function getTitleLang()
    {
        return "title_" . Yii::$app->language;
    }

    public static function getShortTitleLang()
    {
        return 'short_' . Yii::$app->language;
    }

    public static function getList($array, $from = null, $to = null)
    {
        if (!isset($from))
            $from = 'id';
        if (!isset($to))
            $to = "title_" . Yii::$app->language;
        return ArrayHelper::map($array, $from, $to);
    }
}