<div class="card border-light-subtle mb-3">
  <div class="card-header">
    <div class="d-flex gap-3">
      <?= Yii::$app->formatter->asDatetime($model->created_at, "php:d.m.Y H:i:s") ?>
      <?php if ($model->updated_at): ?>
        (отредактирован: <?= Yii::$app->formatter->asDatetime($model->updated_at, "php:d.m.Y H:i:s") ?>)
      <?php endif ?>
      <div>
        Пользователь: <?= $model->user->login ?>
      </div>
    </div>

  </div>
  <div class="card-body">
    <p class="card-text"><?= nl2br($model->comment) ?></p>
  </div>
</div>