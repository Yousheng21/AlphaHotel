<?php


namespace app\assets;

use yii\web\AssetBundle;

class RoomsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/rooms.css',
        'css/datepicker.min.css'
    ];
    public $js = [
        "js/datepicker.min.js",
        "js/Myscript.js",
        "js/setCookie.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',

    ];
}