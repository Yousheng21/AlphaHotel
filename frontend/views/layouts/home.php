<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
use common\widgets\MainForm;
use frontend\assets\HomeAsset;

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../web/img/favicon.ico">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">

<!--    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<nav id="desktop" class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-start">
    <div class="col-2 d-flex justify-content-center">
        <a href="/frontend/web/site/index">
                <span class="logo">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                       width="120" height="120"
                       viewBox="0 0 172 172"
                       style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-size="none"  style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M47.87781,10.32c-1.43448,0 -2.7126,0.88575 -3.21828,2.22391l-37.55781,99.76c-0.3956,1.05608 -0.25359,2.24589 0.38969,3.17125c0.63984,0.93224 1.70027,1.48485 2.82859,1.48485h13.115c1.43792,0 2.73292,-0.89558 3.23172,-2.24406l9.33906,-25.27594h37.90047l3.9775,10.75672l10.23938,-27.1975l-22.75641,-60.45531c-0.50568,-1.33816 -1.79052,-2.22391 -3.225,-2.22391zM55.01313,34.4l13.76,37.90047h-27.52zM109.79781,41.28c-1.43448,0 -2.7126,0.88574 -3.21828,2.2239l-37.55781,99.76c-0.3956,1.05608 -0.25359,2.24589 0.38969,3.17125c0.63984,0.93224 1.70028,1.48485 2.8286,1.48485h13.115c1.43792,0 2.7262,-0.89558 3.225,-2.24406l9.34578,-25.27594h37.90047l9.33906,25.27594c0.50224,1.34848 1.7938,2.24406 3.23172,2.24406h13.22922c1.12832,0 2.18876,-0.55605 2.8286,-1.48485c0.64328,-0.9288 0.78529,-2.11173 0.38969,-3.17125l-37.55781,-99.76c-0.50912,-1.33816 -1.79052,-2.2239 -3.225,-2.2239zM116.93313,65.36l13.76,37.90047h-27.52zM72.18625,154.8c-1.24059,-0.01754 -2.39452,0.63425 -3.01993,1.7058c-0.62541,1.07155 -0.62541,2.39684 0,3.46839c0.62541,1.07155 1.77935,1.72335 3.01993,1.7058h89.44c1.24059,0.01754 2.39452,-0.63425 3.01993,-1.7058c0.62541,-1.07155 0.62541,-2.39684 0,-3.46839c-0.62541,-1.07155 -1.77935,-1.72335 -3.01993,-1.7058z"></path></g></g></svg>
                </span>
        </a>
    </div>
        <div class="col-7 d-flex flex-wrap justify-content-start pr-0">
            <div class="nav-item">
                <a class="nav-link" href="/frontend/web/rooms">Номера</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="/frontend/web/site/restaurant">Ресторан</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="/frontend/web/site/gallery">Фотогаллерея</a>
            </div>
        </div>

        <div class="col-3 flex-row justify-content-end pl-0" >
            <?php
            echo Nav::widget([
                'items' => [
                    Yii::$app->user->isGuest?
                         [
                             'label' => 'Личный кабинет',
                             'url'=>'/frontend/web/site/account'
                         ]
                        :
                    [
                        'label' => 'Личный кабинет',
                        'url'=>'/frontend/web/site/account',

//                        'items' => [
//                            ['label' => 'Профиль - '.Yii::$app->user->identity->username, 'url' => '/frontend/web/site/account'],
//                            ['label' => 'Мои заказы', 'url' => '/frontend/web/site/orders'],
//                            Yii::$app->user->identity->username === 'admin'?
//                                ['label'=>'Admin Panel','url'=>'/backend/web']:'',
//                             [
//                                'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
//                                 'url' => 'site/logout',
//                                 'linkOptions' => ['data-method' => 'post']
//                             ],
//                        ],

                    ],
                    Yii::$app->getUser()->identity->getId() === 23?
                                ['label'=>'Admin Panel','url'=>'/backend/web']:''
                    ]
            ]
                    );
            ?>
        </div>
</nav>
<nav id="mobile">
    <div class="wrapper3">
        <div class="burger-nav">
            <!--     <img class="burger-icon" src="http://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png" height="35" width="35"> -->
        </div>

        <div id="contain">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>

        <ul id="nav" >
            <li><a href="/">Об отеле</a></li>
            <li><a href="/frontend/web/rooms">Номера</a></li>
            <li><a href="/frontend/web/site/restaurant">Ресторан</a></li>
            <li><a href="/frontend/web/site/gallery">Фотогаллерея</a></li>
            <li><a href="/frontend/web/site/account">Личный кабинет</a></li>
        </ul>
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
    <?= MainForm::widget() ?>
    <?= $content ?>
</div>
<footer>
    <div class="d-flex justify-content-around footer">
        <div class="d-flex flex-column ml-5">
            <h3>Свяжитесь с нами:</h3>
            <a href="#" class="text-center">+797648929</a>
            <div class="d-flex justify-content-around">
                <a href="https://www.facebook.com/ermachenkovvova" target="_blank" class="fb"></a>
                <a href="https://www.instagram.com/ermachenkovvladimir/" target="_blank" class="insta"></a>
                <a href="https://www.youtube.com/channel/UC18Du0cQnku1rLuv_JjBEFg?view_as=subscriber" target="_blank" class="youtube"></a>
            </div>
        </div>
        <div class="d-flex flex-column">
            <h3>Главное меню</h3>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-10" href="/site">Об отеле</a>
            </div>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-10" href="/frontend/web/rooms">Номера</a>
            </div>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-10" href="/frontend/web/site/restaurant">Ресторан</a>
            </div>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-10" href="/frontend/web/site/gallery" target="_blank">Фотогаллерея</a>
            </div>
        </div>
        <div class="d-flex flex-column mr-5">
            <h3>Политика конфиденциальности</h3>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-10" href="/frontend/web/site/accomodations">Условия проживания</a>
            </div>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-11" href="/frontend/web/site/privacy_policy">Политика конфиденциальности</a>
            </div>
            <div class="row">
                <span class="col-md-1"><i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i></span>
                <a class="col-md-10" href="/frontend/web/site/loyalty">Программа лояльности</a>
            </div>
        </div>
    </div>
    <div class="">
        <hr>
            <div class="d-flex justify-content-center">
                <h3 style="color: #CD8C6E" class="mb-5 text-left">Россия, г.Санкт-Петербург, ул. Расстанная, д. 2К1</h3>
            </div>

    </div>
</footer>
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

