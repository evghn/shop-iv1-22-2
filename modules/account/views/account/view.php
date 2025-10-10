<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = "Заказ №" . $model->id . " от " . Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i:s');
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('К заказам', ['/account'], ['class' => 'btn btn-outline-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',

            'amount',
            'sum',
            'status_id',
            [
                'label' => 'Cостав заказа',
                'format' => 'html',
                'value' => $this->render('view-order-items', ['dataProviderItems' => $dataProviderItems,])
            ],
        ],
    ]) ?>

</div>