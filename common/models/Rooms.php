<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rooms".
 *
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $long_description
 * @property string $feature
 * @property string $bed
 * @property string $features

 * @property int $price
 * @property int $guests
 * @property int $square
 * @property int $amount
 */
class Rooms extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'description', 'price','features','feature','long_description','bed'], 'required'],
            [['image'], 'string'],
            [['price','guests','square','amount'], 'integer'],
            [['name', 'description','features','feature','long_description','bed'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'image' => 'Image',
            'description' => 'Description',
            'price' => 'Price',
            'guests'=>'Guests',
            'features'=>'Features',
            'feature'=>'Feature',
            'long_description'=>'Long_description',
            'bed'=>'Bed',
            'amount'=>'Amount'
        ];
    }
}
