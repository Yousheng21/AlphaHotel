<?php

namespace frontend\controllers;

use Yii;
use common\models\Rooms;
use frontend\models\ReservationForm;
use yii\web\Controller;

class RoomsController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'rooms';
        $query= Rooms::find();

        $rooms = $query->select(['name','image','description','price'])
            ->all();
        return $this->render('index',
            ['rooms'=>$rooms]
        );
    }

    public function actionSelect()
    {
        return $this->render('select');
    }

    public function actionReservation()
    {
//        $model = new ReservationForm();
//        if($model->load(Yii::$app->request->post()) && $model->validate()){
//            return $this->render('reservation',['model'=>$model]);
//        }
//        return $this->render('index',['model'=>$model]);
        $query= Rooms::find();

        $rooms = $query->select(['name','price'])
            ->all();

        $model = new ReservationForm();

        if ($model->load(Yii::$app->request->post()) && $model->order()) {
            Yii::$app->session->setFlash('success', 'Ваш заказ забронирован!');
            return $this->goHome();
        }
        return $this->render('reservation',['rooms'=>$rooms,'model'=>$model]);
    }

}
