<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$time_order = Yii::$app->formatter->asDatetime($model->created_at, 'php:d.m.Y H:i:s');

$this->title = "Заказ №" . $model->id . " от " . $time_order;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('К заказам', ['/admin'], ['class' => 'btn btn-outline-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'created_at',
                'value' => $time_order,
            ],
            [
                'attribute' => 'user_id',
                'value' => $model->user->full_name,
            ],

            'amount',
            'sum',
            [
                'attribute' => 'status_id',
                'format' => 'html',
                'value' => "<span class=\"order-{$model->status->alias}\">" . $model->status->title . '</span>',
            ],
            [
                'label' => 'Cостав заказа',
                'format' => 'html',
                'value' => $this->render('view-order-items', ['dataProviderItems' => $dataProviderItems,])
            ],
        ],
    ]) ?>

</div>
<?php

$this->registerCssFile('/css/order.css');
