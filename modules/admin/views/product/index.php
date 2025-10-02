<?php

use app\models\Product;
use yii\bootstrap5\Html as Bootstrap5Html;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => fn($model) => '<div class="d-flex gap-3">'
                    .   (
                        isset($model->productImages[0])
                        ? Html::img('/img/' . $model->productImages[0]->photo, ['class' => 'w-25'])
                        : ''
                    )
                    . '<span>' . $model->title . '</span>'
                    . '</div>',
            ],
            'description:ntext',
            'cost',
            'amount',

            //'category_id',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>