<?php


namespace app\components;

use yii\base\Exception;

class UndefinedJobException extends Exception
{
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
        parent::__construct('Неизвестный тип сообщения: ' . $type);
    }

    public function getType():string
    {
        return $this->type;
    }
}