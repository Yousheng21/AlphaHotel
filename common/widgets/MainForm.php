<?php


namespace common\widgets;


use Yii;
use yii\base\Widget;

class MainForm extends Widget
{
    public function run(){
        return $this->render('form');
    }

}