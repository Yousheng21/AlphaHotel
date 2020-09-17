<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>
<aside class="hotel">

</aside>
    <form action="" method="post">
    <div class="row" style="margin-top: 10%">
        <div class=" ml-3 col">
            <label for="" style="font-size: 24px">Дата въезда</label>
            <input type="date" class="form-control h-50" name="in" placeholder="Дата въезда">
        </div>
        <div class="col">
            <label for="" style="font-size: 24px">Дата выезда</label>
            <input type="date" class="form-control h-50" name="out" placeholder="Дата выезда">
        </div>
        <div class="col">
            <label for="" style="font-size: 24px">Количество человек</label>
            <input type="number" min="1" max="4" name="count" class="form-control h-50" placeholder="">
        </div>
        <button class="btn btn-success mr-3" style="margin-top: 2%">Подобрать номер</button>
    </div>
    </form>

<aside id="loc" class="location">
    <section>
        <h1>Добро пожаловать в отель «Alpha»</h1>
        <p>Трехзвездочный европейский отель «Alpha» предлагает своим гостям недорогое и комфортабельное размещение в центральной части Санкт-Петербурга.
            Отель располагается по адресу ул. Расстанная, д. 2К1,  в десяти минутах езды от Московского вокзала. В 2011 году отель был полностью перестроен согласно современным требованиям дизайна и архитектуры, и на сегодняшний день предлагает своим гостям 119 новых, просторных и светлых номеров.
            На всей территории отеля действует бесплатный Wi-Fi.

            Мы будем рады видеть Вас в числе наших гостей и напоминаем, что самую низкую цену номера Вы можете получить при бронировании на нашем сайте.
        </p>
    </section>
    <section>
        <div class="map">

        </div>
    </section>
</aside>
<aside id="caffe" class="restoran">
    <h1>Ресторан</h1>
    <hr id="firsthr"><h2>Alpha Restoran</h2><hr>
    <div class="photo"></div>
    <p>Ресторан Crazy Hunter расположен в здании отеля, на тихой и зеленой улице Расстанная. В ресторане два зала, интерьер которых выполнен в классическом английском стиле. Наш шеф-повар приготовит для Вас вкуснейшие блюда европейской и русской кухни. <br>Бронирование столов — по телефону:<span><img src="https://img.icons8.com/plasticine/100/000000/phone-office.png"></span> <a href="#">+79896758965</a> или в <span style="color:green;">WhatsApp</span>:<span><img src="https://img.icons8.com/color/48/000000/whatsapp.png"></span> <a href="#">+78769804323</a>. <br>
        Мы рады будем видеть Вас на завтрак в формате шведского стола с 7-30 до 11-00. Для гостей нашего отеля завтрак бесплатен, для остальных посетителей он обойдется в 400 рублей. Гости отеля также имеют скидку 10% на все основное меню ресторана.</p>
</aside>
<aside id="news" class="news">
    <h1>Новости и предложения</h1>
    <hr id="firsthr"><h2>Отеля и ресторана</h2><hr>
    <?php
    foreach ($newsList as $newsItem) :?>
    <aside class="aside1">
        <div class="first" style="background-image: url(<?=$newsItem->image?>)"></div>
        <div class="description">
            <h2><?=$newsItem->name?></h2>
            <p> <?=$newsItem->description?></p>
            <a href="#">Подробнее</a>
        </div>
    </aside>
    <?php endforeach; ?>
</aside>
<aside id="contacts" class="contact">
    <div class="wrapper1">
        <h3 style="text-align:center;">Контакты</h3>
        <div class="ico-wrap"> <i class="fa fa-map-marker ico-contact"></i></div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Наш фактический адрес:</h4>
            <div class="aio-icon-description">
                192019, г.Санкт-Петербург, ул. Расстанная
                <br>дом 2, корпус 1, офис 28</div>
        </div>
        <span class="clearfix"></span>
        <div class="ico-wrap"> <i class="fa fa-clock-o ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Время работы офиса и склада:</h4>
            <div class="aio-icon-description">
                пн.-пт. с 9:00 до 18:00, без перерыва.
                <br>сб, вс — выходной</div>
        </div>
        <span class="clearfix"></span>
        <div class="ico-wrap">
            <i class="fa fa-envelope ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Электронная почта:</h4>
            <div class="aio-icon-description">
                transtrek.spb@mail.ru
                <br>transtrek.spb@mail.ru</div>
        </div>
        <span class="clearfix"></span>
        <div class="ico-wrap">
            <i class="fa fa-phone ico-contact"></i>
        </div>
        <div class="descript-wrapper">
            <h4 class="aio-icon-title">Наши Телефоны:</h4>
            <div class="aio-icon-description">
                8 (812) 703-70-46
                <br>8 (812) 703-70-46</div>
        </div>
        <span class="clearfix"></span>
    </div>
    <p>Наши администраторы всегда на связи, поэтому вы можете позвонить им в любое время. Они готовы ответить на интересующие вас вопросы и забронировать номер.<br><br>Мы всегда рады увидеть вас в нашем отеле, поэтому не задерживайтесь и приезжайте. Уютный номер с комфортной мебелью и всем необходимым ждут вас и вашу семью, а мы готовы сделать все, чтобы ваше проживание стало самым лучшим и незабываемым.</p>
    <ul>
        <h2>Расстояние от отеля до:</h2>
        <li>Стадиона «Зенит-Арена» - 0,5 км</li>
        <li>Театральной площади - 1 км</li>
        <li>Ж\Д вокзала - 3 км</li>
        <li>ТРК «Галерея» - 1 км</li>
    </ul>
</aside>