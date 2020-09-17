<?php


namespace app\assets;

use yii\web\AssetBundle;

class RoomsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/rooms.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',

    ];
}