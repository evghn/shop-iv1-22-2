<?php

use yii\bootstrap5\Html;

$disabled = Yii::$app->user->isGuest || $model->amount === 0 ? 'disabled' : '';
?>
<div class="card" style="width: 18rem;">
    <?= Html::img('/img/' . $model->productImage->photo, ['class' => "card-img-top"]) ?>
    <div class="card-body">
        <h5 class="card-title"><?= $model->title ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><span class="text-secondary">Категория:</span> <?= $model->category->title ?></h6>
        <p class="card-text fs-bold fs-5 text-end"><?= $model->cost ?><span>₽</span></p>

        <?= Html::a('В корзину', ['/account/cart/add', 'product_id' => $model->id], ['class' => "btn btn-outline-primary w-100 $disabled"]) ?>
    </div>
</div>