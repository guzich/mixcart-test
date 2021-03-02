<?php


namespace app\models;


use yii\base\Model;

class Form extends Model
{
    public string $data;

    public function __construct()
    {
        $this->data = '';
        parent::__construct();
    }

    public function rules()
    {
        return [
            ['data', 'string'],
        ];
    }
}