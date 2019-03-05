<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 004 04.03.19
 * Time: 23:12
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController
{

    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        //debug($hits);
        return $this->render('index', compact('hits'));
    }

    public function actionView($id) {
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->limit(3)->all();
        return $this->render('view', compact('products'));
    }
}