<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php
    if (Yii::$app->user->can('admin')){
        echo "Hello admin";
    }
    ?>
    <ul style="margin-top: 5%;font-size: 24px">
        <li><a href="/backend/web/menu">Редактировать меню ресторана</a></li>
        <li><a href="/backend/web/rooms">Редактировать номера отеля</a></li>
        <li><a href="/backend/web/news">Редактировать новости отеля</a></li>
        <li><a href="/backend/web/user">Редактировать пользователей</a></li>
    </ul>
</div>
