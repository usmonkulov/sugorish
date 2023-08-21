<?php

namespace settings\status\irrigation;

use Yii;
use yii\helpers\Html;

class RoadIrrigationTaskStatus
{
    const COLOR_STATUS_PROCESS              = 'process';
    const COLOR_STATUS_PASSED_THE_PROCESS   = 'passed_the_process';

    /**
     * @return array
     */
    public static function setLabel()
    {
        return [
            self::COLOR_STATUS_PROCESS              => Yii::t('app', "Hozir jarayonda"),
            self::COLOR_STATUS_PASSED_THE_PROCESS   => Yii::t('app', "jarayondan o'tdi"),
        ];
    }

    public static function getLabel(int $colorStatus)
    {
        return self::setLabel()[$colorStatus];
    }

    /**
     * @param $data
     * @param $url
     * @return string
     */
    public static function getColorStatusHtml($data, $url)
    {
        return Html::a(self::getLabel($data->color_status),
            ['activate', 'id' => $data->id, 'color_status' => $url],
            [
                'title' => self::setLabel()[(!$data->color_status == self::COLOR_STATUS_PROCESS || $data->color_status == self::COLOR_STATUS_PASSED_THE_PROCESS)]." qilish",
                'class' => $data->color_status === self::COLOR_STATUS_PROCESS ? 'btn btn-success btn-sm text-white' : 'btn btn-danger btn-sm text-white'
            ]
        );
    }

    /**
     * @return array
     */
    public static function getStatusForSelect()
    {
        $list = [];
        foreach (self::setLabel() as $key => $item) {
            $list[] = [
                'id'    => $key,
                'value' => $item
            ];
        }
        return $list;
    }
}