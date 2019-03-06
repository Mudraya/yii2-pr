<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 005 05.03.19
 * Time: 23:07
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;


class ProductController extends AppController
{

    public function actionView($id) {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hits'));
    }
}