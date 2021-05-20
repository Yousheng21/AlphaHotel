<?php
namespace frontend\models;

use common\models\Orders;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class DeleteRoom extends Model
{

    /**
     * {@inheritdoc}
     */

    public function delete($id){

        $query = Orders::find();

        $query->createCommand()->delete(
            'orders',[
                'id'=>$id
            ]
        )->execute();

        return true;
    }

}