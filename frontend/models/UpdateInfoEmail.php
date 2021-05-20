<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class UpdateInfoEmail extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['email', 'trim'],
            ['email', 'required','message'=>'Обязательное поле для заполнения'],
            ['email', 'email','message'=>'Некорректный email-адрес'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот email-адрес уже используется'],

        ];
    }

    public function update($id){
        if ($this->validate()) {
            $query = User::find();

            $query->createCommand()->update(
                'user',['email'=>$this->email],"id=".$id
            )->execute();

            return true;
        }
        return null;
    }

}