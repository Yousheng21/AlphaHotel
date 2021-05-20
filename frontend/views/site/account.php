<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$model = new \frontend\models\UpdateInfoUser();
$model1 = new \frontend\models\UpdateInfoEmail();

?>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item active" role="presentation">
        <a class="nav-link" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Моя информация</a>
    </li>
<!--    <li class="nav-item">-->
<!--        <a class="nav-link active" data-toggle="tab" href="#characteristics">Редактировать информацию обо мне</a>-->
<!--    </li>-->
    <li class="nav-item"  role="presentation">
        <a class="nav-link" data-toggle="tab" href="#opinion" role="tab" aria-controls="opinion" aria-selected="false" >Мои бронирования</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" style="margin-top: 2%" id="description">
        <?php
        if (empty($userInfo)){?>
            <p>У вас нет аккаунта. Пожалуйста <a href="/frontend/web/site/signup">зарегистрируйтесь</a> или <a href="/frontend/web/site/login">войдите</a>  </p>
            <?php
        }
        else{ ?>
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Информация обо мне</p>

        <div class="row">
            <div class="col-md-2">
                Логин
            </div>
            <div class="col-md-2">
                Email
            </div>
            <div class="col-md-3">
                Создан
            </div>
            <div class="col-md-3">
                Последнее обновление
            </div>

        </div>

        <div class="row">
            <div class="col-md-2">
                <?= $userInfo[0]->username ?>
            </div>
            <div class="col-md-2">
                <?= $userInfo[0]->email ?>
            </div>
            <div class="col-md-3">
                <?= date('d.m.Y',$userInfo[0]->created_at) ?>
            </div>
            <div class="col-md-3">
                <?= date('d.m.Y',$userInfo[0]->updated_at) ?>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" id="editInfo" onclick="{
                    document.getElementById('formEdit').style.display = 'block';
                }">Изменить</button>
            </div>
        </div>
            <div id="formEdit" style="margin-top: 5%;display: none">
                <div class="row">
                    <div class="col-md-4">
                        <?php $form = ActiveForm::begin(['id' => 'form-userInfo']); ?>

                        <?= $form->field($model, 'username') ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary', 'name' => 'userInfo-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                    <div class="col-md-4">
                        <?php $form1 = ActiveForm::begin(['id' => 'form-emailInfo']); ?>

                        <?= $form1->field($model1, 'email') ?>
                        <div class="form-group">
                            <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary', 'name' => 'emailInfo-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                    <div class="col-md-1" >
                        <img onclick="{
                     document.getElementById('formEdit').style.display = 'none';
                    }" style="cursor: pointer" src="https://img.icons8.com/windows/32/000000/macos-close.png"/>
                    </div>
                </div>
                <div class="row" style="margin-top: 3%">
                    <p>
                        Чтобы изменить пароль перейдите по <?= Html::a('ссылке', ['site/request-password-reset']) ?>
                    </p>
                </div>
            </div>




            <?php
        }
        ?>
    </div>
    <div class="tab-pane fade" id="opinion" style="margin-top: 3%">
        <div class="container">
            <?php if (empty($orders)): ?>
                <div>
                    <p>Ваш список бронирования пока пуст. Вы можете прямо сейчас выбрать <a href="/frontend/web/rooms">выбрать номер</a> </p>
                </div>
            <?php
            else:
                ?>
                <div class="row" style="border-bottom: black 2px solid">
                    <div class="col-md-2">
                        Номер
                    </div>
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-2">
                        Заселение
                    </div>
                    <div class="col-md-2">
                        Выезд
                    </div>
                    <div class="col-md-1">
                        Гости
                    </div>
                    <div class="col-md-1">
                        Цена
                    </div>
                </div>
                <?php foreach ($orders as $order) {?>
                <div class="row" style="margin-top: 3%">
                    <div class="col-md-2">
                        <?=$order->room?>
                    </div>
                    <div class="col-md-2" style="width: 15%">
                        <img style="width: 100%;" src="/frontend/web/img/<?=$order->room?>.jpg" alt="">
                    </div>
                    <div class="col-md-2" style="padding-left: 3%" >
                        <?=$order->dateIn?>
                    </div>
                    <div class="col-md-2" style="padding-left: 2%">
                        <?=$order->dateOut?>
                    </div>
                    <div class="col-md-1" style="padding-left: 4%">
                        <?=$order->guests?>
                    </div>
                    <div class="col-md-1" style="padding-left: 3%">
                        <?=$order->price?>
                    </div>
                    <div class="col-md-1" style="padding-left: 3%">
                        <form id="form-deleteRoom" method="get">
                            <button name="id" class="btn btn-danger" value="<?=$order->id?>">
                                Отменить
                            </button>
                        </form>

                    </div>
                </div>
                <?php
            }
            endif;
            ?>

        </div>
    </div>
</div>

<?php

//if( isset( $_GET['my_button'] ) ){
//
//    Yii::$app->session->setFlash('success', "Нажата кнопка my_button");
////    sleep(1);
//    return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
//    return Yii::$app->response->redirect(['/site/account']);
//}


//function deleteRoom($id){
////    $query = \common\models\Orders::find();
////
//
//
//
//
//}