<?php


namespace app\components;

class AsyncJobsManager implements JobsManager
{
    public const MAX_PROCESS_COUNT = 3;

    private AsyncJobsRepository $repo;

    public function __construct()
    {
        $this->repo = new AsyncJobsFileRepository();
    }

    public function process(Job $job)
    {
        if ($this->repo->getJobsCount() < self::MAX_PROCESS_COUNT) {
            $jobId = $this->repo->pushJob();
            $job->execute();
            $this->repo->pullJob($jobId);
        } else {
            throw new MaxAsyncJobsCountExceededException(self::MAX_PROCESS_COUNT);
        }
    }

    public function getCount() {
        return $this->repo->getJobsCount();
    }
}