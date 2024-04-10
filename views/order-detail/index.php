<?php

use app\models\OrderDetail;
use app\models\Order;
use app\models\Catalog;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заказать запчасти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Заказать запчасти', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order.id',
            'order.state.state',
            'catalog.name',
            'date_order',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrderDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'visibleButtons' => [
                    'delete' => function ($model, $key, $index) {
                        return Yii::$app->user->identity->isAdmin();
                    },
                ],
            ],
        ],
    ]); ?>


</div>
