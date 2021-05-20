<?php

$newsId = $_GET['id']??'';

foreach ($oneNews as $news) :
    if ($news->id == $newsId):?>
        <aside id="caffe" class="restoran">
            <a id="new<?= $news->id ?>" href="/#news<?= $news->id === 1? $news->id : $news->id-1?>"
               onclick="{
                 $('#new1').on('click', function(e){
                    $('html,body').stop().animate(
                        { scrollTop: $('#news1').offset().top },
                        {
                             duration: 1500,
	                         easing: 'swing',
                        }
                        );
                    e.preventDefault();
                  });
               }"
               class="btn btn-primary" style="margin-left: 1%">К списку предложений</a>
            <div class="d-flex justify-content-center">
                <h2><?= $news->name ?></h2>
            </div>
            <div style="display: flex;justify-content: space-around;margin-bottom: 5%">
                <div class="col-3 d-flex flex-column justify-content-center">
                    <hr class="w-100">
                </div>
                <div class="col-6 text-center">
                    <span class="hm" style="font-family: 'Playfair Display', serif;"><?= $news->description ?></span>
                </div>
                <div class="col-3 d-flex flex-column justify-content-center">
                    <hr class="w-100">
                </div>

            </div>
            <div class="photoMenu" style="background-image: url('/frontend/web/img/news<?=$news->id?>.jpg')"></div>
            <p class="descMenu"><?= $news->long_description ?></p>
        </aside>

    <?php
    endif;
endforeach;