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
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{

    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        //debug($hits);
        $this->setMeta('E-SHOPPER');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id) {
        $id = Yii::$app->request->get('id');
//        $products = Product::find()->where(['category_id' => $id])->limit(3)->all();

        $category = Category::findOne($id);
        if (empty($category))
            throw new \yii\web\HttpException(404, 'This category doesnt exist');
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products','pages' , 'category'));
    }
    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | ' . $q);

        if (!$q)
            return $this->render('search');

    $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products','pages' , 'q'));
    }
}