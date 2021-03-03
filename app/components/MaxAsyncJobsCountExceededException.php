<?php


namespace app\components;


use yii\base\Exception;

class MaxAsyncJobsCountExceededException extends Exception
{
    private int $count;

    public function __construct(int $count)
    {
        $this->count = $count;
        parent::__construct('Превышено максимальное количество асинхронных задач');
    }

    public function getMaxCount():int
    {
        return $this->count;
    }

}