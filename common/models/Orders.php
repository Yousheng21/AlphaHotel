<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $dateIn
 * @property string $dateOut
 * @property string $telephone
 * @property string $room
 * @property string $guests
 * @property string $nights
 * @property string $price
 */
class Orders extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'username', 'email', 'dateIn', 'dateOut', 'telephone', 'room','guests','nights'], 'required'],
            [['id'], 'string', 'max' => 11],
            [['guests','nights'],'integer'],
            [['username', 'email', 'dateIn', 'dateOut', 'telephone', 'room','price'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'dateIn' => 'Date In',
            'dateOut' => 'Date Out',
            'telephone' => 'Telephone',
            'room' => 'Room',
            'price'=>'Price',
            'guests'=>'Guests',
            'nights'=>'Nights'
        ];
    }
}
