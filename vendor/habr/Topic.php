<?php

namespace habr;

class Topic {

    /**
     * Ссылка на топик
     *
     * @var null
     */
    public $link = null;

    public function __construct($link = null){

        if(empty($link)){
            throw new \Exception('Ссылка не может быть пустой.');
        }

        $this->link = $link;
    }

    public function getData(){

        $data = file_get_contents($this->link);
        return $data;
    }
}