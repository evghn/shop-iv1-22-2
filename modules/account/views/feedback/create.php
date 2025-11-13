<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */

?>
<div class="feedback-create">
    <?php Pjax::begin([
        'id' => 'feedback-pjax',
        'enablePushState' => false,
        'timeout' => 5000,
        "options" => [
            'data-close' => 1,
        ]
    ]); ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::end() ?>
</div>