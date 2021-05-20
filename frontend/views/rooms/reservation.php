<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ReservationForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$number = $_GET['name']??'';
$flag = false;
$in = $_COOKIE['in'];
$out = $_COOKIE['out'];
$guest = $_COOKIE['guests'];
$days =  $days = date_diff(new DateTime($in),new DateTime($out))->d;

?>

<h3 class="text-center" style="margin-bottom: 4%">Бронирование</h3>
<?php
if ($number){
    foreach ($rooms as $room) {
        if($room['name']===$number) {
            $flag = true;
           $price =  $room['price']*$days;
        }
    }
    if ($flag):?>
        <div class="form-row">
            <div class="form-group col-md-4">
                <p>Дата заселения:  <?=$in?></p>
            </div>
            <div class="form-group col-md-4">
                <p>Дата выезда:  <?=$out?></p>
            </div>
            <div class="form-group col-md-4">
                <p>Номер:  <?=$number?></p>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <p>Количество гостей:  <?=$guest?></p>
            </div>
            <div class="form-group col-md-4">
                <p>Количество суток:  <?=$days?></p>
            </div>
            <div class="col-md-4 photoRoom">
                <img src="/frontend/web/img/<?=$number?>.jpg" style="width: 100%" alt="">
            </div>
        </div>
    <?php
        $form = ActiveForm::begin();?>
        <?php if (Yii::$app->user->isGuest){?>
            <div class="form-row">
                <div class="form-group col-md-4" style="margin-top: 2%">
                    <?= $form->field($model, 'username')->label('Имя пользователя') ?>
                </div>
                <div class="form-group col-md-4" style="margin-top: 2%">
                    <?= $form->field($model, 'email')->label('Email') ?>
                </div>
                <div class="form-group col-md-4" style="margin-top: 2%">
                    <?= $form->field($model, 'telephone')->label('Телефон')->textInput(['type'=>'tel']) ?>
                </div>
            </div>
        <?php } else{?>
            <div class="form-row">
                <div class="form-group col-md-4" style="margin-top: 2%">
                    <?= $form->field($model, 'username')->label('Имя пользователя')->textInput(['value'=>Yii::$app->user->identity->username]) ?>
                </div>
                <div class="form-group col-md-4" style="margin-top: 2%">
                    <?= $form->field($model, 'email')->label('Email')->textInput(['value'=>Yii::$app->user->identity->email]) ?>
                </div>
                <div class="form-group col-md-4" style="margin-top: 2%">
                    <?= $form->field($model, 'telephone')->label('Телефон')->textInput(['type'=>'tel']) ?>
                </div>
            </div>
        <?php }?>

            <div class="form-row">

<!--                <div class="form-group col-md-4" style="margin-top: 1%; display: flex;flex-direction: column;">-->
<!--                    <label style="align-self: start" for="inputState">Оплата</label>-->
<!--                    <select  style="width: 70%" name="ReservationForm[payment]" id="pay">-->
<!--                        <option selected disabled value="default">Выберите способ оплаты</option>-->
<!--                        <option value="Онлайн">Онлайн</option>-->
<!--                        <option value="В отеле">В отеле</option>-->
<!--                    </select>-->
<!--                </div>-->
                <div class=" form-group col-md-12">
                    <h3>Сумма: <?=$price?>₽</h3>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 ">
                    <h4>* Оплата осуществляется в отеле</h4>
                </div>
            </div>


            <div class="form-group col-md-12 ">
                <?=$form->field($model,'checked')->checkbox(['label'=>'Я соглашаюсь с отправкой пользовательской информации']);?>
            </div>
            <div class="form-group col-md-4">
                <?= Html::submitButton('Забронировать', ['class' => 'btn btn-primary', 'name' => 'reservation-button']) ?>
            </div>




    <?php
    ActiveForm::end();
    else: echo "<h1>Данного номера не существует - $number</h1>";
endif;
}else echo "<h1>Error!</h1>";
?>


