<?php
namespace app\components;

class AsyncJob extends Job
{
    private string $data;
    protected JobsManager $jobsManager;

    public function __construct(string $data){
        $this->data = $data;
        $this->jobsManager = new AsyncJobsManager();
    }

    public function execute()
    {
        // do something, sleep for example
        sleep(rand(5,10));
    }
}