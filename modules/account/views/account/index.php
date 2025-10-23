<?php

use app\models\Order;
use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\account\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h3 class="mb-5"><?= Html::encode($this->title) ?></h3>

    <?php Pjax::begin(); ?>
    <?php # $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => fn($model) => $this->render('item', ['model' => $model, 'statuses' => $statuses]),
        'pager' => [
            'class' => LinkPager::class
        ],
    ]) ?>

    <?php Pjax::end(); ?>

</div>

<?php
$this->registerCssFile("/css/order.css");
