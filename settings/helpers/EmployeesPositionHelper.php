<?php

namespace settings\helpers;

use Yii;
use yii\helpers\Html;

class EmployeesPositionHelper
{
    const POSITION_ENTERPRISE_EXPERT    = 'enterprise_expert';
    const POSITION_PLOT_CHIEF           = 'plot_chief';
    const POSITION_WORKER               = 'worker';

    /**
     * @return array
     */
    public static function setLabel(): array
    {
        return [
            self::POSITION_ENTERPRISE_EXPERT    => Yii::t('app', "Apparat hodimi"),
            self::POSITION_PLOT_CHIEF           => Yii::t('app', "Uchastka boshlig'i"),
            self::POSITION_WORKER               => Yii::t('app', "Ishchi"),
        ];
    }

    /**
     * @param string $gender
     * @return mixed
     */
    public static function getLabel(string $gender)
    {
        return self::setLabel()[$gender];
    }

    /**
     * @return array
     */
    public static function getPositionForSelect()
    {
        $list = [];
        foreach (self::setLabel() as $key => $item) {
            $list[] = [
                'id' => $key,
                'value' => $item
            ];
        }
        return $list;
    }
}