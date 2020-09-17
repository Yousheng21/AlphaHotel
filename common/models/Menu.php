<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "menu".
 *
 * @property string $name
 * @property string $description
 * @property int $price
 */
class Menu extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price'], 'required'],
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
            'description' => 'Description',
            'price' => 'Price',
        ];
    }
}
