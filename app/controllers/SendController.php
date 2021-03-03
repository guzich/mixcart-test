<?php


namespace app\controllers;

use app\components\AsyncJobsManager;
use app\components\JobsFactory;
use app\components\MaxAsyncJobsCountExceededException;
use app\components\QueueJobsManager;
use app\components\UndefinedJobException;
use JsonException;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\Response;

class SendController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex() {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $response = ['isOk' => true];

        if (! preg_match('<application\/json>i', Yii::$app->request->getContentType())) {
            $response['isOk'] = false;
            $response['error'] = 'Некорректный формат сообщения. Требуется JSON';
        } else {

            try {
                $data = json_decode(Yii::$app->request->rawBody, true, 512, JSON_THROW_ON_ERROR);
                $job = JobsFactory::createJob($data['type'], $data['data']);
                $job->process();
            } catch (UndefinedJobException | JsonException | MaxAsyncJobsCountExceededException $e) {
                $response['isOk'] = false;
                $response['error'] = $e->getMessage();
            }
        }

        $queueJobsManager = new QueueJobsManager();
        $response['queue'] = $queueJobsManager->getCount();

        $asyncJobsManager = new AsyncJobsManager();
        $response['async'] = $asyncJobsManager->getCount();

        return $response;
    }
}