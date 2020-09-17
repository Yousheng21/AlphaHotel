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
 * @property string $services
 * @property int $price
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
            [['name', 'image', 'description', 'price'], 'required'],
            [['image'], 'string'],
            [['price'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
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
        ];
    }
}
