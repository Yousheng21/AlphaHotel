<?php

use yii\helpers\Html;
use \yii\helpers\Url;

$in = $_GET['in']??'';
$out = $_GET['out']??'';

$guests = $_GET['guests']??'';

if(!$in && !$out && !$guests){
    $in = $_COOKIE['in']??'';
    $out = $_COOKIE['out']??'';
    $guests = $_COOKIE['guests']??'';
}

//$days = 1;
$guests? : $guests = 1;

if($in && $out){
    $days = date_diff(new DateTime($in),new DateTime($out))->d;
    if ($days == 1 || $days == 21) $outDay = 'сутки';
    else $outDay = 'суток';
}

$oneRoom = $_GET['id']??'';

if ($rooms):
    if ($oneRoom):
        foreach ($rooms as $room) :
            if ($room->id == $oneRoom):?>
        <div id="demo<?=$room->id?>" class="demo container" style="display: flex; justify-content: center;margin-bottom: 10%">
            <div style="display: flex; flex-direction: column;align-self: flex-end">
                <a href="/frontend/web/rooms" class="btn btn-primary" style="align-self: start">К списку номеров</a>
                <h1 style="align-self: center"><?=$room->name?></h1>
                <div class="carousel slide" data-ride="carousel" id="carousel<?=$room->id?>">
                    <ul class="carousel-indicators">
                        <li data-target="#carousel<?=$room->id?>" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel<?=$room->id?>" data-slide-to="1"></li>
                        <li data-target="#carousel<?=$room->id?>" data-slide-to="2"></li>
                    </ul>
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/frontend/web/img/<?= $room->name ?>1.jpg" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="/frontend/web/img/<?= $room->name ?>2.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="/frontend/web/img/<?= $room->name ?>3.jpg" alt="New York">
                        </div>
                    </div>
                    <a class="carousel-control-prev" data-target="#carousel<?=$room->id?>" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" data-target="#carousel<?=$room->id?>" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <section class="shortInfo">
                    <div class="row">
                        <div class="col-3 text-center"> <span><?=$room->feature?></span> </div>
                        <div class="col-3 text-center"> <span class="default"><img src="https://img.icons8.com/android/24/000000/resize-four-directions.png"/> /</span> <span><?=$room->square?>m²</span> </div>
                        <div class="col-3 text-center"> <span class="default"><img src="https://img.icons8.com/ios/30/000000/queue.png"/> /</span> <span><?=$room->guests?> взрослых</span> </div>
                        <div class="col-3 text-center"> <span class="default"><img src="https://img.icons8.com/ios-filled/24/000000/bed.png"/> /</span> <span><?=$room->bed?></span> </div>
                    </div>
                </section>
                <section class="infoDescription">
                    <p class="desc"><?=$room->long_description?></p>
                    <div class="services">
                        <div >
                            <h1>Сервисы и услуги</h1>
                        </div>
                        <div style="color: black">
                            <hr>
                        </div>
                    </div>
                </section>
                <div class="d-flex flex-wrap features">
                    <?php
                    $feat = explode(',',$room->features);
                    foreach ($feat as $feature):?>
                        <div>
                            <span>
                                <i aria-hidden="true" class="glyphicon glyphicon-chevron-right"></i>
                            </span>
                            <span><?= $feature ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <div class="d-flex flex-column">
                        <?php if($in && $out): ?>
                            <h2><?=$room->price*$days?> ₽</h2>
                            <span class="align-self-center text-danger ml-3" style="font-size: 16px">за <?= $days."  ".$outDay?> </span>
                        <?php else: ?>
                            <h2><?=$room->price?> ₽</h2>
                            <sub class="align-self-center text-danger ml-3" style="font-size: 16px">за сутки </sub>
                        <?php endif;?>
                    </div>
                    <form action="/frontend/web/rooms/reservation" class="align-self-center ml-5" method="get">
                        <button  class="btn btn-danger mt-3" name="name" value="<?=$room->name?>">
                            Забронировать
                            <img src="https://img.icons8.com/small/16/000000/right.png">
                        </button>
                    </form>
                </div>
            </div>

        </div>
    <?php
            endif;
        endforeach;
    else:
        ?>

<div class="d-flex flex-column">
    <section class="">
        <div class="container">
            <?php foreach ($rooms as $room):?>
                <div class="rooms-page-item mt-5">
                    <a href="/frontend/web/rooms/<?=$room->id?>" class="linking">
                        <div class="row mb-5" style="box-shadow: 1px 1px 30px 1px rgba(117, 115, 115, 1);"
<!--                             onclick="slider(event,'--><?//=$room->id?>//')"
                        >
                            <div class="col-lg-6 pl-0 pr-0">
                                <div class="owl-carousel">
                                    <div class="single-room">
                                        <img src="/frontend/web/img/<?=$room->name?>.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex flex-column justify-content-around" style="background-color: #a8a8a8">
                                    <div class="room-title justify-content-start">
                                        <h2><?=$room->name?></h2>
                                    </div>
                                    <div class="room-desc">
                                        <p><?=$room->description?></p>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <span>
                                                <img src="https://img.icons8.com/ios/35/000000/queue.png"/>
                                            </span>
                                            <span>до <?= $room->guests ?> мест</span>
                                        </div>
                                        <div class="col-4">
                                            <span>
                                                <img src="https://img.icons8.com/ios/30/000000/resize-diagonal.png"/>
                                            </span>
                                            <span><?= $room->square ?> кв.м</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end mb-3"  style="z-index: 999">
                                        <div class="d-flex flex-row">
                                            <?php if($in && $out): ?>
                                                <h2><?=$room->price*$days?> ₽ / </h2>

                                                <sub class="align-self-center text-primary ml-3" style="font-size: 16px;font-style: oblique; font-weight: bold">за <?= $days."  ".$outDay?> </sub>
                                            <?php else: ?>
                                                <h2><?=$room->price?> ₽</h2>
                                                <sub class="align-self-center ml-3" style="font-size: 16px">за сутки </sub>
                                            <?php endif;?>
                                        </div>
                                        <form action="/frontend/web/rooms/reservation" method="get">
                                            <button  class="btn btn-danger mt-3" name="name" value="<?=$room->name?>">
                                                Забронировать
                                                <img src="https://img.icons8.com/small/16/000000/right.png">
                                            </button>
                                        </form>
                                    </div>
                                <div>
                                    <span>Количество свободных номеров: </span>
                                    <?php
                                    $flag = false;
                                    foreach ($arrDate as $date) :
                                        if ($date['name'] === $room->name):?>
                                         <span><?=$room->amount - $date['count']?></span>
                                         <?php
                                        $flag = true;
                                         endif;
                                         endforeach;

                                         if (!$flag): ?>
                                    <span><?=$room->amount?></span>
                                    <?php
                                    endif;
                                     ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </section>
        <?php
    endif;
    else: ?>
        <?php \common\widgets\MainForm::widget() ?>
    <?php
    if ($info):
        foreach ($info as $item):?>
              <p>Номер <?=$item->room?>, вмещающий до <?=$item->guests?> человек уже забронирован с <?=$item->dateIn?> до <?=$item->dateOut?>.
    <?php
        endforeach;?>
              Пожалуйста, выберите другие параметры.</p>
    <?php
    endif;
         endif;?>
</div>




