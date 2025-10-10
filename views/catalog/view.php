<?php

use app\models\Category;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('В каталог', ['/catalog'], ['class' => 'btn btn-outline-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'category_id',
                'value' => Category::getCategoryName($model->category_id),
            ],
            'cost',
            'amount',
            [
                'attribute' => 'description',
                'value' => $model->description ?? 'Не указано',
            ],
            [
                'label' => 'Изображение',
                'format' => 'html',
                'value' => Html::img('/img/' . $model->productImage->photo, ['class' => 'w-25'])
            ]

        ],
    ]) ?>

</div>