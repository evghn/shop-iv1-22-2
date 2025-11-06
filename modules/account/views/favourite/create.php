<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Favourite $model */

$this->title = 'Create Favourite';
$this->params['breadcrumbs'][] = ['label' => 'Favourites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favourite-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
