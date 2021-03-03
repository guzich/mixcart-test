<?php


namespace app\components;


use PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer;
use Yii;
use yii\base\ViewRenderer;
use yii\helpers\FileHelper;

class QueueJobsFileRepository extends QueueJobsRepository
{
    private string $dirQueue;
    private string $dirRun;

    public function __construct()
    {

        $dir = dirname(Yii::getAlias('@webroot')) . '/runtime/process/queue';

        $this->dirQueue = $dir . '/queue';
        if (! is_dir($this->dirQueue)) {
            FileHelper::createDirectory($this->dirQueue);
        }

        $this->dirRun = $dir . '/run';

        if (! is_dir($this->dirRun)) {
            FileHelper::createDirectory($this->dirRun);
        }

    }

    public function getJobsCount(): int
    {
        return count(FileHelper::findFiles($this->dirQueue)) + count(FileHelper::findFiles($this->dirRun));
    }

    public function pushJob(QueueJob $job): int
    {
        $id = (int) (microtime(true) . rand(0, 1000));
        file_put_contents($this->dirQueue . '/' . $id, json_encode([
            'class' => get_class($job),
            'data' => $job->getData()
        ]));

        return $id;
    }

    //todo тоже предусмотреть очистку файлов в случае неправильного завершения процесса

    public function getJobs(): array
    {
        $jobs = [];
        $files  = FileHelper::findFiles($this->dirQueue);

        foreach ($files as $fileName) {
            $data = json_decode(file_get_contents($fileName), true, JSON_THROW_ON_ERROR);
            $jobClass = $data['class'];
            $jobs [ (int) basename($fileName) ]= new $jobClass($data['data']);
        }

        return $jobs;
    }

    public function pullJob(int $jobId): bool
    {
        return rename($this->dirQueue . '/' . $jobId, $this->dirRun . '/' . $jobId);
    }

    public function removeJob(int $jobId)
    {
        return FileHelper::unlink($this->dirRun . '/' . $jobId);
    }

}