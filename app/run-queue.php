<?php

use app\components\QueueJobsManager;

defined('YII_DEBUG') or define('YII_DEBUG', true);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';
Yii::setAlias('@webroot', __DIR__ . '/public');
$jobsManager = new QueueJobsManager();

while (true) {
    $jobsManager->runQueue();
}

?>

