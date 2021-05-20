<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "restaurant".
 *
 * @property string $name
 * @property int $id
 * @property string $description
 * @property string $long_description
 */
class Restaurant extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'long_description','id'], 'required'],
            [['id'],'integer'],
            [['name', 'description','long_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'=>'Id',
            'name' => 'Name',
            'description' => 'Description',
            'long_description' => 'Long_description',
        ];
    }
}
