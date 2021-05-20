<?php

namespace frontend\models;

use common\models\Rooms;
use DateTime;
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
    public $telephone;
    public $room;
    public $checked;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required','message'=>'Обязательное поле для заполнения'],
            ['username', 'string','max'=>12,'tooLong'=>'Максимальная длина логина 12 символа'],
            ['username','string','min'=>2,'tooShort'=>'Минимальная длина логина 2 символа'],

            ['email', 'trim'],
            ['email', 'required','message'=>'Обязательное поле для заполнения'],
            ['email', 'email','message'=>'Некорректный email-адрес'],
            ['email', 'string', 'max' => 255],

//            ['dateIn', 'required'],
//            ['dateIn', 'string'],
//
//            ['dateOut', 'required'],
//            ['dateOut', 'string'],

            [['telephone'], 'string','min'=>'11','max'=>'12'],
            ['telephone', 'match', 'pattern' => '/^8|[+7](\d{3})(\d{3})(\d{2})(\d{2})/','message'=>'Неккоректный номер телефона'],
            ['telephone','required','message'=>'Обязательное поле для заполнения'],

//            ['room', 'trim'],
//            ['room', 'required'],
//            ['room', 'string'],

            ['checked', 'boolean'],
            ['checked', 'compare', 'compareValue' => 1, 'message' => 'Выствите чебокс, иначе форма не отправится!'],

        ];
    }

    public function validateTelephone($attribute, $params)
    {
        echo $this->telephone;
        if (($this->telephone[0]!='+' && $this->telephone[1]!='7') || $this->telephone[0]!='8'){
            $this->addError($attribute, 'sdf');
        }

    }

    /**
     * Signs user up.
     *
     * @param $name
     * @return bool whether the creating new account was successful and email was sent
     * @throws \yii\db\Exception
     */
    public function order($name)
    {
        $query = Orders::find();

        $queryRooms = Rooms::find();
        $rooms = $queryRooms->select(['name','price'])
            ->all();
        $price = 0;
        foreach ($rooms as $room) {
            if($room['name']===$name) {
                $price =  $room['price'];
            }
        }
        $in = $_COOKIE['in'];
        $out = $_COOKIE['out'];
        $guests = $_COOKIE['guests'];
        $days =  $days = date_diff(new DateTime($in),new DateTime($out))->d;
        $price = $price*$days;
        if ($this->validate()){
            $_GET['in'] = $in;
            $_GET['out'] = $out;
            $_GET['price'] = $price;
            $_GET['guests'] = $guests;
            $_GET['user'] = $this->username;
            $this->setCookie($name,$price);

            $query->createCommand()->insert('orders', [
                'username' => $this->username,
                'dateIn' => $in,
                'dateOut' => $out,
                'room' => $name,
                'guests'=>$guests,
                'nights'=>$days,
                'price'=>$price,
                'email' => $this->email,
                'telephone' => $this->telephone,
            ])->execute();
            $this->sendEmail($name,$in,$out,$guests,$price,$this->email,$this->telephone);
            return true;


        }

        return null;

    }

    public function sendEmail($name,$in,$out,$guests,$price,$email,$tel){
        Yii::$app->mailer->compose()
            ->setFrom('ermachenkovvova@gmail.com')
            ->setTo('ermachenkovvova@gmail.com')
            ->setSubject('Спасибо за бронирование')
            ->setTextBody("Здравствуйсте, $this->username, вы забронировали номер $name в отеле Alpha на $in до $out. Количество гостей:$guests,стоимость бронирования: $price. Благодарим за выбор нашего отеля. Удачного отдыха!")
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();

        Yii::$app->mailer->compose()
            ->setFrom('ermachenkovvova@gmail.com')
            ->setTo('ermachenkovvova@gmail.com')
            ->setSubject('Пользователь забронировал номер')
            ->setTextBody("Пользователь, $this->username, забронировал номер $name в отеле на $in до $out. Количество гостей:$guests,стоимость бронирования: $price.Телефон: $tel, email: $email.")
            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
            ->send();
    }

    public function setCookie($name,$price){
        setcookie("user", $this->username, time()+2592000,'/');
//        setcookie("email", $this->email, time()+2592000,'/');
//        setcookie("room", $name, time()+2592000,'/');
//        setcookie("price",$price, time()+2592000,'/');
    }

}