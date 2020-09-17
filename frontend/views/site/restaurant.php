<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>

<div class="best_burgers_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-80">
                    <h3>Menu</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($menu as $item):?>
            <div class="col-xl-6 col-md-6 col-lg-6">
                <div class="single_delicious d-flex align-items-center mb-3 mt-2">
                    <div class="thumb">
                        <img src="<?=$item->image?>" alt="">
                    </div>
                    <div class="info ml-3">
                        <h3><?=$item->name?></h3>
                        <p><?=$item->description?></p>
                        <h3 class="text-secondary"><?=$item->price?>$</h3>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <p class="text-right text-secondary ">Забронировать столик в ресторане можно по телефону: <a href="">+79892341222</a> </p>
    </div>
</div>

