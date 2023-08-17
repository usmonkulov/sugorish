<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/vendor/fonts/boxicons.css',
        'assets/vendor/css/core.css',
        'assets/vendor/css/theme-default.css',
        'assets/css/demo.css',
        'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
        'assets/vendor/css/pages/page-auth.css'
    ];
    public $js = [
          'assets/vendor/js/helpers.js',
          'assets/js/config.js',
          'assets/vendor/libs/jquery/jquery.js',
          'assets/vendor/libs/popper/popper.js',
          'assets/vendor/js/bootstrap.js',
          'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
          'assets/vendor/js/menu.js',
          'assets/js/main.js',
          'https://buttons.github.io/buttons.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}