<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ND5QGEK7R7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ND5QGEK7R7');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-183878434-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-183878434-1');
    </script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="../../web/img/favicon.ico">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--    <a href="/frontend/web/site/index">-->
<!--                <span class="logo">-->
<!--                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"-->
<!--                       width="120" height="120"-->
<!--                       viewBox="0 0 172 172"-->
<!--                       style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M47.87781,10.32c-1.43448,0 -2.7126,0.88575 -3.21828,2.22391l-37.55781,99.76c-0.3956,1.05608 -0.25359,2.24589 0.38969,3.17125c0.63984,0.93224 1.70027,1.48485 2.82859,1.48485h13.115c1.43792,0 2.73292,-0.89558 3.23172,-2.24406l9.33906,-25.27594h37.90047l3.9775,10.75672l10.23938,-27.1975l-22.75641,-60.45531c-0.50568,-1.33816 -1.79052,-2.22391 -3.225,-2.22391zM55.01313,34.4l13.76,37.90047h-27.52zM109.79781,41.28c-1.43448,0 -2.7126,0.88574 -3.21828,2.2239l-37.55781,99.76c-0.3956,1.05608 -0.25359,2.24589 0.38969,3.17125c0.63984,0.93224 1.70028,1.48485 2.8286,1.48485h13.115c1.43792,0 2.7262,-0.89558 3.225,-2.24406l9.34578,-25.27594h37.90047l9.33906,25.27594c0.50224,1.34848 1.7938,2.24406 3.23172,2.24406h13.22922c1.12832,0 2.18876,-0.55605 2.8286,-1.48485c0.64328,-0.9288 0.78529,-2.11173 0.38969,-3.17125l-37.55781,-99.76c-0.50912,-1.33816 -1.79052,-2.2239 -3.225,-2.2239zM116.93313,65.36l13.76,37.90047h-27.52zM72.18625,154.8c-1.24059,-0.01754 -2.39452,0.63425 -3.01993,1.7058c-0.62541,1.07155 -0.62541,2.39684 0,3.46839c0.62541,1.07155 1.77935,1.72335 3.01993,1.7058h89.44c1.24059,0.01754 2.39452,-0.63425 3.01993,-1.7058c0.62541,-1.07155 0.62541,-2.39684 0,-3.46839c-0.62541,-1.07155 -1.77935,-1.72335 -3.01993,-1.7058z"></path></g></g></svg>-->
<!--                </span>-->
<!--    </a>-->
<!--    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">-->
<!--        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="/frontend/web/rooms/index">Номера</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="/frontend/web/site/restaurant">Ресторан</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="/frontend/web/site/gallery">Фотогаллерея</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <a href="/frontend/web/site/signup" class="btn btn-danger">Личный кабинет</a>-->
<!--        </form>-->
<!--    </div>-->
<!--</nav>-->
<?php
NavBar::begin([ // отрываем виджет
    'brandLabel' => 'Alpha', // название организации
    'brandUrl' => Yii::$app->homeUrl, // ссылка на главную страницу сайта
    'options' => [
        'class' => 'navbar-fixed-top bg-danger',
        'style'=>'background-color:red;',
        // стили главной панели
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right ','style'=>'color:black'], // стили ul
    'items' => [
        ['label' => 'Главная', 'url' => ['/site']],
        ['label' => 'Номера', 'url' => ['/rooms']],
        ['label' => 'Ресторан', 'url' => ['/site/restaurant']],
        Yii::$app->user->isGuest ? // Если пользователь гость, показыаем ссылку "Вход", если он авторизовался "Выход"
            ['label' => 'Вход', 'url' => ['/site/login']] :
            [
                'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
    ],
    'encodeLabels' =>false,
]);
NavBar::end();


?>

<div class="container" style="margin-top: 5%">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
