<?php


namespace app\components;


abstract class JobsFactory
{
    /**
     * @param string $type
     * @param string $data
     * @return mixed
     * @throws UndefinedJobException
     */
    public static function  createJob(string $type, string $data){
        $class = '\\app\\components\\' . ucfirst($type) . 'Job';
        if (class_exists($class)) {
            return new $class($data);
        } else {
            throw new UndefinedJobException($type);
        }
    }
}