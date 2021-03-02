<?php

use yii\bootstrap4\BootstrapAsset;

BootstrapAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title>Test</title>
    <?php $this->head() ?>
</head>
    <body>
        <header>
            <div class="container">
                <h1>Test</h1>
            </div>
        </header>
        <main class="m-5">
            <div class="container">
                <?=$content?>
            </div>
        </main>
        <footer>
            <div class="container">
                &copy; Test
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>