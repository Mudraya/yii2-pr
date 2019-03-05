<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 004 04.03.19
 * Time: 23:13
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    protected function setMeta($title = null, $keywords = null, $description = null) {
        $this->view->title = $title;
        // quotes!
        $this->view->registerMetaTag(['name' =>'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' =>'description', 'content' => "$description"]);
    }
}