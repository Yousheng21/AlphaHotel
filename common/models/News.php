<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\debug\models\search\Db;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $long_description
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
            [['name', 'image', 'description','id','long_description'], 'required'],
            [['long_description'], 'string'],
            [['id'],'int'],
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
            'long_description'=> 'Long_description',
            'id'=>'Id'
        ];
    }


}
