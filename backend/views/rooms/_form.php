<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Rooms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rooms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'guests')->textInput() ?>
    <?= $form->field($model, 'features')->textInput() ?>
    <?= $form->field($model, 'feature')->textInput() ?>
    <?= $form->field($model, 'square')->textInput() ?>
    <?= $form->field($model, 'bed')->textInput() ?>
    <?= $form->field($model, 'long_description')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
