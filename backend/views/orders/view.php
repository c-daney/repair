<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->order_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            [
                'attribute'=>'uid',
                'value'=>\common\models\User::findOne(['uid'=>$model->uid])->name,
            ],
            [
                'attribute'=>'worker_id',
                'value'=>\common\models\User::findOne(['uid'=>\common\models\Worker::findOne(['worker_id'=>$model->worker_id])->uid])->name,
            ],
            [
                'attribute'=>'service_id',
                'value'=>\common\models\Service::findOne(['service_id'=>$model->service_id])->name,
            ],
            'price',
            [
                'attribute'=>'status',
                'value'=>Yii::$app->params['order_status'][$model->status],
            ],
            'ctime',
            'accept_time',
            'pay_time',
            'finish_time',
        ],
    ]) ?>

</div>
