<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        '/js/getApp.js',
//        '/css/autocomplete.css',
//        'assets/d8517caef8dd37d97df732690454e50b/css/bootstrap.min.css',
//        '/css/new-design.css?89',
//        'assets/6f03a141abe2f6097646edbe6a6d9993/themes/smoothness/jquery-ui.min.css',
//        '/css/font-awesome.min.css',
//        'css/main.css?132',
//        '/css/media.css?v23',
//        'css/new-design-media.css',
//        '/css/owl.carousel.min.css',
//        'css/actual_banner/banner.css',
//        '/js/favorite_widgets/favoriteServices.4b693657.css',
//        '/assets/41c862862f60bfcc60ddcef2dd62933c/jquery.min.js',
//        'assets/55fefd705b8622f73bd17f2d3db07f87/yii.js',
//        '/assets/d8517caef8dd37d97df732690454e50b/js/bootstrap.min.js',
//        'js/jquery.cookie.min.js',
//        '/js/mousetrap.min.js',
//        'js/jquery-ui.js',
//        '/js/specialView.js',
//        'js/copy-clipboard-helper.js',
//        '/js/owl.carousel.min.js',
//        'js/lottie.js',
//        '/js/flashcanvas.js',
//        'js/jSignature.min.js',
//        '/js/mindmap/mindmap.js',
//        'js/main.js'
    ];
    public $js = [

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}