<?php


namespace app\components;

abstract class QueueJobsRepository
{
    public abstract function getJobsCount(): int;
    public abstract function pushJob (QueueJob $job);
}