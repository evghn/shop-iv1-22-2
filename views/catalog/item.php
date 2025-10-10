<?php

use yii\bootstrap5\Html;

$disabled = Yii::$app->user->isGuest || $model->amount === 0 ? 'disabled' : '';
?>
<div class="card" style="width: 18rem;">
    <?= Html::a(Html::img('/img/' . $model->productImage->photo, ['class' => "card-img-top"]), ['view', 'id' => $model->id], ['class' => 'text-decoration-none text-secondary', 'data-pjax' => 0]) ?>
    <div class="card-body">
        <h5 class="card-title"><?= Html::a($model->title, ['view', 'id' => $model->id], ['class' => 'text-decoration-none text-secondary product-title', 'data-pjax' => 0]) ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><span class="text-secondary">Категория:</span> <?= $model->category->title ?></h6>
        <p class="card-text fs-bold fs-5 text-end"><?= $model->cost ?><span>₽</span></p>

        <?= Html::a('В корзину', ['/account/cart/add', 'product_id' => $model->id], ['class' => "btn btn-outline-primary w-100 $disabled  btn-cart-add", 'data-pjax' => 0]) ?>
    </div>
</div>