<?php

use yii\bootstrap5\Html;
?>
<div class="dmf-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>

    <p>
        <?= Html::a("Связанные списки", ["/dmf/link-list"], ["class" => "btn btn-outline-primary"]) ?>
    </p>
</div>