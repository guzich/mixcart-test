<?php


namespace app\components;


class QueueJobsManager implements JobsManager
{
    private QueueJobsRepository $repo;

    public function __construct()
    {
        $this->repo = new QueueJobsFileRepository();
    }

    public function process(Job $job)
    {
        $this->repo->pushJob($job);
    }

    public function getCount() {
        return $this->repo->getJobsCount();
    }

    public function runQueue() {

        $jobs = $this->repo->getJobs();

        foreach ($jobs as $jobId => $job) {
            if ($this->repo->pullJob($jobId)) {
                $job->execute();
                $this->repo->removeJob($jobId);
            }
        }
    }
}