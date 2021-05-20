<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$oneMenu = $_GET['id']??'';

if ($oneMenu):
    foreach ($offers as $offer) :
        if ($offer->id == $oneMenu):?>
            <aside id="caffe" class="restoran">
                <a id="menu<?=$offer->id?>" href="/frontend/web/site/restaurant#menus<?= $offer->id === 1? $offer->id : $offer->id-1?>"
                   onclick="{
                 $('#menu1').on('click', function(e){
                    $('html,body').stop().animate(
                        { scrollTop: $('#menus1').offset().top },
                        {
                             duration: 1500,
	                         easing: 'swing',
                        });
                    e.preventDefault();
                  });
               }"
                   class="btn btn-primary" style="margin-left: 1%">К списку предложений</a>
                <div class="d-flex justify-content-center">
                    <h2><?= $offer->name ?></h2>
                </div>
                <div style="display: flex;justify-content: space-around;margin-bottom: 5%">
                    <div class="col-3 d-flex flex-column justify-content-center">
                        <hr class="w-100">
                    </div>
                    <div class="col-6 text-center">
                        <span class="hm" style="font-family: 'Playfair Display', serif;"><?= $offer->description ?></span>
                    </div>
                    <div class="col-3 d-flex flex-column justify-content-center">
                        <hr class="w-100">
                    </div>

                </div>
                <div class="photoMenu" style="background-image: url('/frontend/web/img/menu<?=$offer->id?>.jpg')"></div>
                <p class="descMenu"><?= $offer->long_description ?></p>
            </aside>

<?php
        endif;
        endforeach;
else:
?>

<aside id="caffe" class="restoran">

    <div class="photo"></div>
    <p>Ресоран Crazy Hunter расположен в здании отеля, на тихой и зеленой улице Расстанная. В ресторане два зала, интерьер которых выполнен в классическом английском стиле. Наш шеф-повар приготовит для Вас вкуснейшие блюда европейской и русской кухни. <br>Бронирование столов — по телефону:<span><img src="https://img.icons8.com/plasticine/100/000000/phone-office.png"></span> <a href="tel:+79892952040">+79892952040</a> или в <span style="color:green;">WhatsApp</span>:<span><img src="https://img.icons8.com/color/48/000000/whatsapp.png"></span> <a style="color:green;" href="https://wa.me/+79892952040">+79892952040</a>. <br>
        Мы рады будем видеть Вас на завтрак в формате шведского стола с 7-30 до 11-00. Для гостей нашего отеля завтрак бесплатен, для остальных посетителей он обойдется в 400 рублей. Гости отеля также имеют скидку 10% на все основное меню ресторана.
    </p>
</aside>


<div class="d-flex justify-content-around menu mt-5 mb-5">
    <a target="_blank" href="/frontend/web/upload/breackfast.pdf">Завтрак по меню</a>
    <a target="_blank" href="/frontend/web/upload/vinecard.pdf">Винная карта</a>
    <a target="_blank" href="/frontend/web/upload/banketoffers.pdf">Банкетное предложение ресторана</a>
    <a target="_blank" href="/frontend/web/upload/mainmenu.PDF">Основное меню</a>
</div>


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
<!--    <h1>Специальные предложения</h1>-->

    <?php
    foreach ($offers as $offer) :?>
        <aside id="menus<?=$offer->id?>" class="aside1">
            <div class="first"
                 onclick="{
                         location.href = '/frontend/web/site/restaurant/<?=$offer->id?>'}"
                 style='background-image: url("/frontend/web/img/menu<?= $offer->id?>.jpg")'></div>
            <div class="description">
                <h2 style="color: #3072a1; font-family: 'Lobster', cursive;"
                    onclick="{
                            location.href = '/frontend/web/site/restaurant/<?=$offer->id?>'}"
                    class="mt-0"><?=$offer->name?></h2>
                <p> <?=$offer->description?></p>
                <div class="align-self-end mr-5">
                    <a style="text-decoration: underline" href="/frontend/web/site/restaurant/<?=$offer->id?>">Подробнее</a>
                </div>
            </div>
        </aside>
    <?php endforeach; ?>
</aside>
    <a class="back_to_top" title="Наверх"><img src="https://img.icons8.com/color/48/000000/circled-up-2--v2.png"/></a>
<?php
    endif;
