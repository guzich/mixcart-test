<?php


namespace app\components;

abstract class AsyncJobsRepository
{
    public abstract function getJobsCount (): int;
    public abstract function pushJob (): int;
    public abstract function pullJob (int $jobId);
}