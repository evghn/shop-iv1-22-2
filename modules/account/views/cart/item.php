<?php

use yii\bootstrap5\Html;
?>
<div>
    <?= $model->product->title ?>
    <?= $model->amount ?>
</div>

<div class="card">
    <div class="card-body d-flex justify-content-between">
        <div class="d-flex">
            <?= Html::img('/img/' . $model->product->productImage->photo, ['class' => 'w-25']) ?>
            <h5 class=""><?= Html::a($model->product->title, '') ?></h5>
        </div>
        <div class="d-flex gap-3">
            <div><?= Html::a('-', ['dec', 'item_id' => $model->id]) ?></div>
            <div><?= $model->amount ?></div>
            <div><?= Html::a('+', ['add', 'product_id' => $model->product_id]) ?></div>
            <div><?= $model->cost ?></div>
            <div><?= $model->sum ?></div>
            <div><?= Html::a('удалить', ['delete', 'item_id' => $model->id], ['data-method' => 'post']) ?></div>
        </div>

    </div>
</div>