<?php

namespace frontend\controllers;

use app\assets\RoomsAsset;
use common\models\Orders;
use Yii;
use common\models\Rooms;
use frontend\models\ReservationForm;
use yii\web\Controller;

class RoomsController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $this->layout = 'home';
        RoomsAsset::register($this->getView());

        $in = $request->get('in');
        $guests = $request->get('guests');

        $query = Rooms::find();
        $queryDate = Orders::find();

        if (!$in && !$guests ){
            $in = $_COOKIE['in']??'';
            $guests = $_COOKIE['guests']??'';
        }
        $arrDate = [];

        $amount = $query->select(['name','amount'])->all();

        if ($in){
            $current = 0;
            $date = $queryDate->select(['room','dateOut'])->all();
            foreach ($date as $item) {
                if ( strtotime($in)<=strtotime($item['dateOut'])){
                    $counter = 1;
                    $flag = false;
                    if (empty($arrDate)) {
                        $arrDate[0]['name'] = $item['room'];
                        $arrDate[0]['count'] = 1;
                        $current++;
                    }
                    else {
                        for ($i = 0; $i < count($arrDate); $i++) {
                            if ($arrDate[$i]['name'] === $item['room']) {
                                $arrDate[$i]['count']++;
                                $flag = true;
                            }
                        }

                        if (!$flag) {
                            $arrDate[$current]['name'] = $item['room'];
                            $arrDate[$current]['count'] = 1;
                            $current++;
                        }
                    }
                }
            }

        }
        $resultDate = [];
        for($i=0;$i<count($arrDate);$i++){
            for($j=0;$j<count($amount);$j++){
                if ($arrDate[$i]['name']===$amount[$j]['name'])
                    if ($arrDate[$i]['count'] === $amount[$j]['amount'])
                        $resultDate[] = $arrDate[$i]['name'];
            }
        }


        $rooms = $query->select(['id','name','image','description','price','features','guests','feature','square','long_description','bed','amount'])
            ->where($guests?['>=','guests',$guests]:'')
            ->andWhere(!empty($arrDate)?['not in','name',$resultDate]:'')
            ->all();
        $info = [];
        if (!$rooms){
            $info = $queryDate->select(['room','dateIn','dateOut','guests'])
                ->where(['in','room',$resultDate])
                ->all();
        }


        return $this->render('index',
            ['rooms'=>$rooms,'info'=>$info,'arrDate'=>$arrDate]
        );
    }

    public function actionSelect()
    {
        return $this->render('select');
    }

    public function actionReservation()
    {

        $query= Rooms::find();
        $rooms = $query->select(['name','price'])
            ->all();

        $model = new ReservationForm();
        $request = Yii::$app->request;

        $room = $request->get('name');
        if ($model->load(Yii::$app->request->post()) && $model->order($room)) {
            Yii::$app->session->setFlash('success', 'Ваш заказ забронирован!');

            return $this->render('thanksPage');
        }
        return $this->render('reservation',['rooms'=>$rooms,'model'=>$model]);
    }

}
