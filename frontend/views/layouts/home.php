<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
use frontend\assets\HomeAsset;

HomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="../../web/img/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light navigat">
    <a href="/frontend/web/site/index">
                <span class="logo">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                       width="120" height="120"
                       viewBox="0 0 172 172"
                       style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M47.87781,10.32c-1.43448,0 -2.7126,0.88575 -3.21828,2.22391l-37.55781,99.76c-0.3956,1.05608 -0.25359,2.24589 0.38969,3.17125c0.63984,0.93224 1.70027,1.48485 2.82859,1.48485h13.115c1.43792,0 2.73292,-0.89558 3.23172,-2.24406l9.33906,-25.27594h37.90047l3.9775,10.75672l10.23938,-27.1975l-22.75641,-60.45531c-0.50568,-1.33816 -1.79052,-2.22391 -3.225,-2.22391zM55.01313,34.4l13.76,37.90047h-27.52zM109.79781,41.28c-1.43448,0 -2.7126,0.88574 -3.21828,2.2239l-37.55781,99.76c-0.3956,1.05608 -0.25359,2.24589 0.38969,3.17125c0.63984,0.93224 1.70028,1.48485 2.8286,1.48485h13.115c1.43792,0 2.7262,-0.89558 3.225,-2.24406l9.34578,-25.27594h37.90047l9.33906,25.27594c0.50224,1.34848 1.7938,2.24406 3.23172,2.24406h13.22922c1.12832,0 2.18876,-0.55605 2.8286,-1.48485c0.64328,-0.9288 0.78529,-2.11173 0.38969,-3.17125l-37.55781,-99.76c-0.50912,-1.33816 -1.79052,-2.2239 -3.225,-2.2239zM116.93313,65.36l13.76,37.90047h-27.52zM72.18625,154.8c-1.24059,-0.01754 -2.39452,0.63425 -3.01993,1.7058c-0.62541,1.07155 -0.62541,2.39684 0,3.46839c0.62541,1.07155 1.77935,1.72335 3.01993,1.7058h89.44c1.24059,0.01754 2.39452,-0.63425 3.01993,-1.7058c0.62541,-1.07155 0.62541,-2.39684 0,-3.46839c-0.62541,-1.07155 -1.77935,-1.72335 -3.01993,-1.7058z"></path></g></g></svg>
                </span>
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/frontend/web/rooms/index">Номера</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/frontend/web/site/restaurant">Ресторан</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/frontend/web/site/gallery">Фотогаллерея</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0" style="margin-left: 70%">
            <?php
            echo Nav::widget([

                'items' => [
                    Yii::$app->user->isGuest?'':
                    [
                        'label' => 'Личный кабинет',
                        'items' => [
                            ['label' => 'Профиль - '.Yii::$app->user->identity->username, 'url' => '#'],
                            ['label' => 'Мои заказы', 'url' => '#'],
                            ['label' => 'Список желаемого', 'url' => '#']
                        ],
                    ],
                    Yii::$app->user->isGuest ? // Если пользователь гость, показыаем ссылку "Вход", если он авторизовался "Выход"
                        ['label' => 'Вход', 'url' => ['/site/login']] :
                        [
                            'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                            'url' => ['site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ],
                ],
            ]);
            ?>
        </div>
    </div>
</nav>
<?php
//    [
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => ['/site/index'],
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);


?>

<div class="">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<footer style="margin-top: 10%">
    <div class="foot">
        <div class="link">
            <h2>Свяжитесь с нами:</h2>
            <a href="#">+797648929</a>
            <div class="img">
                <a href="https://www.facebook.com/ermachenkovvova" target="_blank" class="fb"></a>
                <a href="https://www.instagram.com/ermachenkovvladimir/" target="_blank" class="insta"></a>
                <a href="https://www.youtube.com/channel/UC18Du0cQnku1rLuv_JjBEFg?view_as=subscriber" target="_blank" class="youtube"></a>
            </div>
        </div>
        <div class="first">
            <a href="/site">Об отеле</a>
            <a href="/frontend/web/rooms">Номера</a>
            <a href="/frontend/web/site/restaurant">Ресторан</a>
            <a href="/frontend/web/site/gallery" target="_blank">Фотогаллерея</a>
        </div>
        <div class="second">
            <h3>Политика конфиденциальности</h3>
            <a href="#">УСЛОВИЯ ПРОЖИВАНИЯ</a>
            <a href="#">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
            <a href="#">ПРОГРАММА ЛОЯЛЬНОСТИ</a>
            <a href="#">CПЕЦИАЛЬНАЯ ОЦЕНКА УСЛОВИЙ ТРУДА</a>
        </div>
    </div>
    <div class="foot1">
        <hr>
        <a href="/site"><img src="https://img.icons8.com/material-outlined/64/000000/circled-up.png"></a>
        <h2>Россия, г.Санкт-Петербург, ул. Расстанная, д. 2К1</h2>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

