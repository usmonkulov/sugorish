<?php

/** @var array $params */

return [
    'class' => 'yii\web\UrlManager',
    'hostInfo' => $params['backendHostInfo'],
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '' => 'site/index',
        'road'          => 'irrigation/road/index',
        'road/create'   => 'irrigation/road/create',
        'enum-road-position'          => 'enum/enum-road-position/index',
        'enum-road-position/create'   => 'enum/enum-road-position/create',
        'enum-road-type'          => 'enum/enum-road-type/index',
        'enum-road-type/create'   => 'enum/enum-road-type/create',
        'enum-road-employees'          => 'enum/enum-road-employees/index',
        'enum-road-employees/create'   => 'enum/enum-road-employees/create',
        'road/<action:(view|update|delete)>/<id:\d+>'  => 'irrigation/road/<action>',
        '<_a:login|logout>' => 'auth/<_a>',

        'user'                                          => 'user/index',
        'user/<action:(view|update|delete)>/<id:\d+>'   => 'user/<action>',

        '<_c:[\w\-]+>' => '<_c>/index',
        '<_c:[\w\-]+>/<id:\d+>' => '<_c>/view',
        '<_c:[\w\-]+>/<_a:[\w-]+>' => '<_c>/<_a>',
        '<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_c>/<_a>',
    ],
];