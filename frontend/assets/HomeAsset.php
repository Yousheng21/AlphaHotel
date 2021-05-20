<?php


namespace frontend\assets;


use yii\web\AssetBundle;

class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site_style.css',
        'css/gallery.css',
        'css/datepicker.min.css',
        'css/gallery.css',
    ];
    public $js = [
        "js/datepicker.min.js",
        "js/Myscript.js",
        "js/setCookie.js",
    ];
    public $depends = [
//        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}