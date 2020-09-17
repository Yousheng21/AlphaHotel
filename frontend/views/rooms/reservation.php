<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ReservationForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$number = $_GET['name']??'';
$flag = false;

?>

<h3 class="text-center" style="margin-bottom: 4%">Бронирование</h3>
<?php
if(Yii::$app->user->isGuest){
    return Yii::$app->response->redirect(['site/signup']);
}
if ($number){
    foreach ($rooms as $room) {
        if($room['name']===$number) {
            $flag = true;
           $price =  $room['price'];
        }
    }
    if ($flag):
        $form = ActiveForm::begin();?>
        <?php if (Yii::$app->user->isGuest){?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?= $form->field($model, 'username')->label('Имя пользователя') ?>
                </div>
                <div class="form-group col-md-6">
                    <?= $form->field($model, 'email')->label('Email') ?>
                </div>
            </div>
        <?php } else{?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?= $form->field($model, 'username')->label('Имя пользователя')->textInput(['value'=>Yii::$app->user->identity->username]) ?>
                </div>
                <div class="form-group col-md-6">
                    <?= $form->field($model, 'email')->label('Email')->textInput(['value'=>Yii::$app->user->identity->email]) ?>
                </div>
            </div>
        <?php }?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <?= $form->field($model, 'dateIn')->label('Дата въезда')->textInput(['type'=>'date']) ?>
                </div>
                <div class="form-group col-md-6">
                    <?= $form->field($model, 'dateOut')->label('Email')->textInput(['type'=>'date']) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <?= $form->field($model, 'telephone')->label('Телефон')->textInput(['type'=>'tel']) ?>
                </div>
                <div class="form-group col-md-3">
                    <?= $form->field($model, 'room')->label('Номер')->textInput(['value'=>$number,'READONLY'=>true]) ?>
                </div>
                <div class="form-group col-md-2" style="margin-top: 1%">
                    <label for="inputState">Оплата</label>
                    <select name="ReservationForm[payment]" id="pay">
                        <option selected disabled value="default">Выберите способ оплаты</option>
                        <option value="Онлайн">Онлайн</option>
                        <option value="В отеле">В отеле</option>
                    </select>
                </div>
                <div class=" form-group col-md-3" style="margin-top: 1%; display: flex;flex-direction: row;justify-content: center">
                    <h3>Сумма: <?=$price?>$</h3>
                </div>
            </div>
            <div class="form-group col-md-6">
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


