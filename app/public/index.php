<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';
Yii::setAlias('@bower', Yii::getAlias(__DIR__ . '/../vendor/bower-assets'));
Yii::setAlias('@npm', Yii::getAlias(__DIR__ . '/../vendor/npm-assets'));
/*require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');*/

$config = require dirname(__DIR__) . '/config.php';
$application = new yii\web\Application($config);
$application->run();

?>

