<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

use \yii\helpers\Url;
$in = $_COOKIE['in']??'';
$out = $_COOKIE['out']??'';
$guests = $_COOKIE['guests']??'';


?>
<aside class="hotel">

</aside>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2816.1696061709667!2d38.977978815908344!3d45.10262977909835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40f0475f704a8539%3A0x859267a339c1a51f!2z0J7RgtC10LvRjCBHcmFuZCBTcGEgSG90ZWwgQVZBWA!5e0!3m2!1sru!2sru!4v1606911866486!5m2!1sru!2sru" width="90%" height="80%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>
</aside>
<aside id="caffe" class="restoran">
    <div style="display: flex;justify-content: space-around;margin-bottom: 5%">
        <div class="col-4 d-flex flex-column justify-content-center">
            <hr class="w-100">
        </div>
        <div class="col-3 text-center">
            <span class="h">Ресторан Alpha</span>
        </div>
        <div class="col-4 d-flex flex-column justify-content-center">
            <hr class="w-100">
        </div>

    </div>
    <div class="photo"></div>
    <p>Ресоран Crazy Hunter расположен в здании отеля, на тихой и зеленой улице Расстанная. В ресторане два зала, интерьер которых выполнен в классическом английском стиле. Наш шеф-повар приготовит для Вас вкуснейшие блюда европейской и русской кухни. <br>Бронирование столов — по телефону:<span><img src="https://img.icons8.com/plasticine/100/000000/phone-office.png"></span> <a href="tel:+79892952040">+79892952040</a> или в <span style="color:green;">WhatsApp</span>:<span><img src="https://img.icons8.com/color/48/000000/whatsapp.png"></span> <a style="color:green;" href="https://wa.me/+79892952040">+79892952040</a>. <br>
        Мы рады будем видеть Вас на завтрак в формате шведского стола с 7-30 до 11-00. Для гостей нашего отеля завтрак бесплатен, для остальных посетителей он обойдется в 400 рублей. Гости отеля также имеют скидку 10% на все основное меню ресторана.
    </p>
</aside>
<aside id="news" class="news">
    <div style="display: flex;justify-content: space-around;margin-bottom: 5%;margin-top: 5%">
        <div class="col-4 d-flex flex-column justify-content-center">
            <hr class="w-100">
        </div>
        <div class="col-4 text-center">
            <span class="h">Специальные предложения</span>
        </div>
        <div class="col-4 d-flex flex-column justify-content-center">
            <hr class="w-100">
        </div>

    </div>
    <?php
    foreach ($newsList as $newsItem) :?>
    <aside id="news<?=$newsItem->id?>" class="aside1">
        <div class="first"
             onclick="{
                     location.href = '/frontend/web/site/news/<?=$newsItem->id?>'}"
             style="background-image: url('/frontend/web/img/news<?=$newsItem->id?>.jpg')"></div>
        <div class="description">
            <h2 style="color: #3072a1;font-family: 'Lobster', cursive;vertical-align: top"
                onclick="{
                        location.href = '/frontend/web/site/news/<?=$newsItem->id?>'}"
            ><?=$newsItem->name?></h2>
            <p> <?=$newsItem->description?></p>
            <div class="align-self-end mr-5">
                <a style="text-decoration: underline" href="/frontend/web/site/news/<?=$newsItem->id?>">Подробнее</a>
            </div>

        </div>
    </aside>
    <?php endforeach; ?>
</aside>

<aside id="contacts">
    <h3 style="text-align:center;">Контакты</h3>
    <div class="d-flex justify-content-around contact">
        <div class="d-flex flex-column wrapper1">
            <h4>Адрес и контактная информация</h4>
            <div class="row">
                <div class="ico-wrap"> <i class="fa fa-map-marker ico-contact"></i></div>
                <div class="column">
                    <div class="descript-wrapper">
                        <h4 class="aio-icon-title">Наш фактический адрес:</h4>
                        <div class="aio-icon-description">
                            192019, г.Санкт-Петербург, ул. Расстанная
                            <br>дом 2, корпус 1, офис 28</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ico-wrap"> <i class="fa fa-clock-o ico-contact"></i></div>
                <div class="column">
                    <div class="descript-wrapper">
                        <h4 class="aio-icon-title">Время работы офиса и склада:</h4>
                        <div class="aio-icon-description">
                            пн.-пт. с 9:00 до 18:00, без перерыва.
                            <br>сб, вс — выходной</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ico-wrap"> <i class="fa fa-envelope ico-contact"></i></div>
                <div class="column">
                    <div class="descript-wrapper">
                        <h4 class="aio-icon-title">Электронная почта:</h4>
                        <div class="aio-icon-description">
                            transtrek.spb@mail.ru
                            <br>transtrek.spb@mail.ru</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ico-wrap"> <i class="fa fa-phone ico-contact"></i></div>
                <div class="column">
                    <div class="descript-wrapper">
                        <h4 class="aio-icon-title">Наши Телефоны:</h4>
                        <div class="aio-icon-description">
                            8 (812) 703-70-46
                            <br>8 (812) 703-70-46</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column wrapper1">
            <div class="column">
                <h4>Удобное расположение</h4>
                <div class="row mb-4">
                    <div class="ico-wrap"> <img src="/frontend/web/img/stadium.png"/></div>
                    <div class=" column">
                        <div class="descript-wrapper">
                            <h4 class="aio-icon-title">Зенит-Арена:</h4>
                            <div class="aio-icon-description">
                                <span>2 километра</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="ico-wrap"> <img src="/frontend/web/img/movie-theater.png"/></div>
                   <div class="column">
                        <div class="descript-wrapper">
                            <h4 class="aio-icon-title">Театральной площади:</h4>
                            <div class="aio-icon-description">
                                <span>1 километра</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-4">
                    <div class="ico-wrap"><img src="/frontend/web/img/railway-station.png"/></div>
                    <div class="column">
                        <div class="descript-wrapper">
                            <h4 class="aio-icon-title">Ж\Д вокзала:</h4>
                            <div class="aio-icon-description">
                                <span>3 километра</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-start">
                    <div class="ico-wrap"> <img src="/frontend/web/img/shopping-mall.png"/></div>
                    <div class="column">
                        <div class="descript-wrapper">
                            <h4 class="aio-icon-title">ТРК «Галерея»:</h4>
                            <div class="aio-icon-description">
                                <span>1 километра</span>
                            </div>
                        </div>
                    </div>

                </div>
<!--                <li>Театральной площади - 1 км</li>-->
<!--                <li>Ж\Д вокзала - 3 км</li>-->
<!--                <li>ТРК «Галерея» - 1 км</li>-->
            </div>
        </div>
    </div>
    <p class="mt-5 mb-5">Наши администраторы всегда на связи, поэтому вы можете позвонить им в любое время. Они готовы ответить на интересующие вас вопросы и забронировать номер.<br><br>Мы всегда рады увидеть вас в нашем отеле, поэтому не задерживайтесь и приезжайте. Уютный номер с комфортной мебелью и всем необходимым ждут вас и вашу семью, а мы готовы сделать все, чтобы ваше проживание стало самым лучшим и незабываемым.</p>

</aside>

<a class="back_to_top" title="Наверх"><img src="https://img.icons8.com/color/48/000000/circled-up-2--v2.png"/></a>



<!--<script>-->
<!--    var _emv = _emv || [];-->
<!--    _emv['campaign'] = 'f9d2dca8351ae208aaceed2b';-->
<!---->
<!--    (function() {-->
<!--        var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;-->
<!--        em.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'leadback.ru/js/leadback.js';-->
<!--        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);-->
<!--    })();-->
<!--</script>-->