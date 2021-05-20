<?php

//var_dump(Yii::$app->user->identity->username);
 // Исходные секунды
echo $_GET['user']??'';
 ?>

<div class="container">
    <?php if (empty($orders)): ?>
    <div>
        <p>Ваш список бронирования пока пуст. Вы можете прямо сейчас выбрать <a href="/frontend/web/rooms">выбрать номер</a> </p>
    </div>
    <?php
    else:
    ?>
    <div class="row">
        <div class="col-md-2">
            Номер
        </div>
        <div class="col-md-2">
           Заселение
        </div>
        <div class="col-md-2">
            Выезд
        </div>
        <div class="col-md-2">
            Гости
        </div>
        <div class="col-md-2">
           Цена
        </div>
    </div>
    <?php foreach ($orders as $order) {?>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-2">
                <?=$order->room?>
            </div>
            <div class="col-md-2" style="width: 15%">
                <img style="width: 100%;" src="/frontend/web/img/<?=$order->room?>.jpg" alt="">
            </div>
            <div class="col-md-2">
                <?=$order->dateIn?>
            </div>
            <div class="col-md-2">
                <?=$order->dateOut?>
            </div>
            <div class="col-md-2">
                <?=$order->guests?>
            </div>
            <div class="col-md-2">
                <?=$order->price?>
            </div>
        </div>
    <?php
    }
    endif;
    ?>

</div>
