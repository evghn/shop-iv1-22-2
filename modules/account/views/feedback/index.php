<?php

use app\models\Feedback;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отзыв на товар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h3><?= Html::encode($this->title) ?></h3>



    <?php Pjax::begin(); ?>

    <?= $this->render('_form') ?>

    <?php Pjax::end(); ?>

</div>