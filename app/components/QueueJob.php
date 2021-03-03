<?php
namespace app\components;

class QueueJob extends Job
{
    private string $data;
    protected JobsManager $jobsManager;

    public function __construct(string $data){
        $this->data = $data;
        $this->jobsManager = new QueueJobsManager();
    }

    public function execute()
    {
        // do something, sleep for example
        sleep(rand(5,10));
    }

    public function getData(): string
    {
        return  $this->data;
    }
}