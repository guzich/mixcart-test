<?php


namespace app\components;


interface JobsManager
{
    public function process(Job $job);
}