<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= $model->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    return !$data->status ? 'Active' : 'Completed';
                },
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems; ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sum</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item):?>
                <tr>

                    <td><a href="<?= Url::to(['/product/view', 'id' => $item->product_id])?>"><?= $item['name']?></a></td>

                    <td><?= $item['qty_item']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>

                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>


</div>
