Тестовое письмо:
<?= date("d.m.Y H:i:s") ?>

<div style="padding: 20px 0; background-color: rgba(216, 233, 247, 1); color: #251862ff; ">
    <?= $data["text"] ?>

    <img style="width: 300px;" src="<?= $message->embed($data["image"]); ?>">
</div>