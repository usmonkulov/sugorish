<?php

/** @var array $params */

return [
    'class' => 'yii\web\UrlManager',
    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'cache' => false,
    'rules' => [
        '' => 'site/index',
        'road' => 'road/road/index',
        'user' => 'user/user/index',
    ],
];