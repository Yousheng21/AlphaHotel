<?php

?>

<div class="container">
    <div class="row col-md-12">
        <h1>Спасибо за бронирование!</h1>
    </div>
    <div class="row" style="border-bottom: black 2px solid">

    </div>
    <div class="row" style="margin-top: 5%">
        <p>Мы получили ваше бронирования и свяжемся с Вами в ближайшее время. Ниже указана информация о Вашем бронировании. </p>
    </div>
    <div>
        <h3>Данные о бронировании</h3>
    </div>
    <div class="row" style="border-bottom: black 2px solid; margin-bottom: 2%"></div>
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
    <div class="row" style="margin-top: 0.5%">
        <div class="row" style="margin-top: 3%">
            <div class="col-md-2">
                <?=$_GET['name']?>
            </div>
            <div class="col-md-2">
                <?=$_GET['in']?>
            </div>
            <div class="col-md-2">
                <?=$_GET['out']?>
            </div>
            <div class="col-md-2">
                <?=$_GET['guests']?>
            </div>
            <div class="col-md-2">
                <?=$_GET['price']?>
            </div>
        </div>
    </div>
</div>
