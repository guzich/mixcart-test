<?php


namespace app\controllers;


use app\models\Form;
use yii\web\Controller;

class FormController extends Controller
{
    public function actionIndex()
    {
        $model = new Form();
        return $this->render('form', ['model' => $model]);
    }
}