<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Favourite $model */

$this->title = 'Update Favourite: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Favourites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favourite-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
