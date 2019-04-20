<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.05.2016
 * Time: 10:40
 */

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord{

    public function addToCart($product, $qty = 1){
        echo 'Worked!';
    }

}