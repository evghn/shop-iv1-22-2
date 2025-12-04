<?php

/** @var yii\web\View $this */

use Codeception\Actor;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\JqueryAsset;

?>
<h1>link-list/index</h1>

<div class="mt-5">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList($listMain, ["prompt" => "Выберете категорию"]) ?>

    <?= $form->field($model, 'subCategory_id')->dropDownList($listSub, ["prompt" => "Выберете под-категорию"]) ?>

    <div class="form-group">

        <?= Html::submitButton("Отправить", ["class" => "btn btn-outline-primary mt-3"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php

$this->registerJsFile("/js/link-list.js", ["depends" => JqueryAsset::class]);
