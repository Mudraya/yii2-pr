<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 026 26.04.19
 * Time: 10:53
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller
{
    public function behaviors ()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

}
