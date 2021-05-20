<?php
namespace frontend\models;

use common\models\Orders;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class UpdateInfoUser extends Model
{
    public $username;


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
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот логин уже используется'],


        ];
    }

    public function update($id){
        if ($this->validate()) {
            $query = User::find();
            $query1 = Orders::find();
            $query->createCommand()->update(
                'user',['username'=>$this->username],"id=".$id
            )->execute();

            $query1->createCommand()->update(
                'orders',['username'=>$this->username],"username=".$this->username
            )->execute();

            return true;
        }
        return null;
    }

}