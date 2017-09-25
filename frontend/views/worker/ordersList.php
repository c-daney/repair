<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 15/11/19
 * Time: 上午11:48
 */
/* @var $this yii\web\View */
/* @var $data \common\models\Orders[] */
?>
<h1>订单列表</h1>
<br/>
<?php foreach ($data as $one): ?>
    <p onclick="window.location.href='/worker/order-info?id=<?= $one->id ?>'">
        用户:<?= $one->user->name ?><br/>
        服务:<?= $one->service->name ?><br/>
        价格:<?= $one->service->price ?><br/>
        状态:<b><?= Yii::$app->params['order_status'][$one->status] ?></b><br/>
    </p>
    <hr/>
<?php endforeach ?>
