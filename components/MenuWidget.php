<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 021 21.02.19
 * Time: 11:04
 */

namespace app\components;

use app\models\Category;
use yii\base\Widget;
use Yii;
//use app\models\Category;

class MenuWidget extends Widget
{

    public  $tpl; // ul or select
    public  $model;
    public  $data; // arr categories
    public  $tree; // tree categories
    public  $menuHtml; // html code

    public function init() {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }
    public function run(){
        // get cache
        if($this->tpl == 'menu.php'){
            $menu = Yii::$app->cache->get('menu');
            if($menu) return $menu;
        }

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        // set cache
        if($this->tpl == 'menu.php'){
            Yii::$app->cache->set('menu', $this->menuHtml, 60);
        }
        return $this->menuHtml;
    }


    protected function getTree() {
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }


    // помещаем каждый отдельный элементв шаблон
    // используя буферизацию
    protected function catToTemplate($category, $tab) {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}
