<?php


namespace app\components;


use Yii;
use yii\helpers\FileHelper;

class AsyncJobsFileRepository extends AsyncJobsRepository
{
    private string $dir;

    public function __construct()
    {

        $dir = Yii::getAlias('@webroot') . '/runtime/process/async';
        $this->dir = $dir;

        if (! is_dir($dir)) {
            FileHelper::createDirectory($dir);
        }

    }

    public function getJobsCount(): int
    {
        $files = FileHelper::findFiles($this->dir);
        // todo добавить проверку запущен ли процесс с данным pid на случай если выполнение завершилось
        //  неожиданно и файл не был удален (exec ('ps 10000') - если не пустой вывод, то процесс выполняется)
        return count($files);
    }

    public function pushJob():int
    {
        $pid = getmypid();
        file_put_contents($this->dir . '/' . $pid . '.txt', '');
        return $pid;
    }

    public function pullJob(int $jobId) {
        FileHelper::unlink($this->dir . '/' . $jobId . '.txt');
    }

}