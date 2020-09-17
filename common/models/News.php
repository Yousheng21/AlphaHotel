<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\debug\models\search\Db;

/**
 * This is the model class for table "news".
 *
 * @property string $name
 * @property string $image
 * @property string $description
 */
class News extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'description'], 'required'],
            [['image'], 'string'],
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
        ];
    }


}
