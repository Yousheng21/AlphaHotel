<?php

/* @var $this yii\web\View */

$this->title = 'Alpha';
?>
<div class="site-index">
    <?php
    if (Yii::$app->user->can('admin')){
        echo "Hello admin";
    }
    ?>
    <ul style="margin-top: 5%;font-size: 24px">
        <li><a href="/backend/web/restaurant">Редактировать меню ресторана</a></li>
        <li><a href="/backend/web/rooms">Редактировать номера отеля</a></li>
<!--        <li><a href="/backend/web/news">Редактировать новости отеля</a></li>-->
        <li><a href="/backend/web/orders">Редактировать заказы пользователей</a></li>
        <li><a href="/backend/web/user">Редактировать пользователей</a></li>
    </ul>
</div>
