<?php

/** @var array $params */

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['backendHostInfo'],
//    'baseUrl' => '',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '' => 'site/index',
        'road'          => 'irrigation/road/index',
        'road/create'   => 'irrigation/road/create',
        'road/<action:(view)>/<id:\d+>'  => 'irrigation/road/<action>',
        '<_a:login|logout>' => 'auth/<_a>',

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ],
];