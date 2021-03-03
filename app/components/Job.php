<?php


namespace app\components;


abstract class Job
{
    protected JobsManager $jobsManager;

    public function process(){
        $this->jobsManager->process($this);
    }

    abstract public function execute();
}