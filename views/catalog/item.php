<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

$disabled = Yii::$app->user->isGuest || $model->amount === 0 ? 'disabled' : '';
$favourite_id = $model?->favourites ? $model?->favourites[0]?->id : false;
$favourite_color = $favourite_id
    ? "text-danger"
    : "text-black";

Yii::debug($model?->favourites);

?>
<div class="card" style="width: 18rem;">
    <?= Html::a(Html::img('/img/' . $model->productImage->photo, ['class' => "card-img-top"]), ['view', 'id' => $model->id], ['class' => 'text-decoration-none text-secondary', 'data-pjax' => 0]) ?>
    <div class="card-body">
        <h5 class="card-title"><?= Html::a($model->title, ['view', 'id' => $model->id], ['class' => 'text-decoration-none text-secondary product-title', 'data-pjax' => 0]) ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><span class="text-secondary">Категория:</span> <?= $model->category->title ?></h6>
        <p class="card-text fs-bold fs-5 text-end"><?= $model->cost ?><span>₽</span></p>
        <div class="d-flex justify-content-between my-2 block-icon">
            <div>

            </div>
            <div>
                <i
                    class="far fa-heart icon-favourite <?= $favourite_color
                                                        ?>"
                    data-url="<?= $favourite_id
                                    ? Url::to(['/account/favourite/remove', 'id' => $favourite_id])
                                    : Url::to(['/account/favourite/add', 'product_id' => $model->id]) ?>">
                </i>
            </div>

        </div>
        <?= Html::a('В корзину', ['/account/cart/add', 'product_id' => $model->id], ['class' => "btn btn-outline-primary w-100 $disabled  btn-cart-add", 'data-pjax' => 0]) ?>
    </div>
</div>