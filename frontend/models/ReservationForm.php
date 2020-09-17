<?php

namespace frontend\models;

use common\models\Rooms;
use Yii;
use yii\base\Model;
use common\models\Orders;

/**
 * Signup form
 */
class ReservationForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $dateIn;
    public $dateOut;
    public $telephone;
    public $room;
    public $payment;
    public $checked;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],

            ['dateIn', 'required'],
            ['dateIn', 'string'],

            ['dateOut', 'required'],
            ['dateOut', 'string'],

            ['telephone', 'required'],
            ['telephone', 'string','min'=>12,'max'=>12],

            ['room', 'trim'],
            ['room', 'required'],
            ['room', 'string'],

            ['checked', 'boolean'],
            ['checked', 'compare', 'compareValue' => 1, 'message' => 'Выствите чебокс, иначе форма не отправится!'],

            ['payment', 'required','message' => 'Выствите чебокс, иначе форма не отправится!'],
            ['payment', 'string'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function order()
    {
//        $order = new Orders();
//
//        $order->username = $this->username;
//        $order->email = $this->email;
//        $order->dateIn = $this->dateIn;
//        $order->dateOut = $this->dateOut;
//        $order->telephone = $this->telephone;
//        $order->room = $this->room;
//
//        if ($order->save()) {
//            Yii::$app->session->setFlash('success', 'Ваш заказ забронирован!');
//            return $order;
//        }

        $query = Orders::find();

        $queryRooms = Rooms::find();
        $rooms = $queryRooms->select(['name','price'])
            ->all();

        foreach ($rooms as $room) {
            if($room['name']===$this->room) {
                $price =  $room['price'];
            }
        }
        if ($this->validate()){
            $query->createCommand()->insert('orders', [
                'username' => $this->username,
                'email' => $this->email,
                'dateIn' => $this->dateIn,
                'dateOut' => $this->dateOut,
                'telephone' => $this->telephone,
                'room' => $this->room,
                'payment'=>$this->payment,
                'price'=>$price
            ])->execute();

            return true;
        }
        return null;

    }

}