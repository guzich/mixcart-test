<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class SendController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['ok'];
    }
}