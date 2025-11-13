<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */

$this->title = "Отзывы";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/account']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-view">


    <div class="my-3 text-decoration-underline">
        <h3>Мои отзывы о товарах</h3>

    </div>

    <?php Pjax::begin([
        'id' => 'product-feedbacks-pjax',
        'enablePushState' => false,
        'timeout' => 5000
    ]); ?>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{pager}<div class="d-flex flex-column gap-3">{items}</div>{pager}',
        'itemView' => 'item_feedback',
        'pager' => [
            'class' => LinkPager::class,
        ]

    ]) ?>

    <?php Pjax::end(); ?>


</div>