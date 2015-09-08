<?php

namespace habr;

use habr;

require_once 'Topic.php';
require_once 'PhpTopic.php';
require_once 'WebTopic.php';

class TopicsList {

    public $links = array();

    public function __construct($links = array()){

        if(!empty($links) && is_array($links)){
            $this->links = $links;
        }
    }

    public function getTopics($handler = null){

        if(empty($this->links)){
            throw new \Exception("Список статей пуст!");
        }

        $handlerCls = '\habr\Topic';
        if(!empty($handler)){
            $handlerCls = $handler;
        }

        $linksCount = count($this->links);
        $topics = array();

        for($i = 0; $i < $linksCount; $i++){
            $topics[] = new $handlerCls($this->links[$i]);
        }

        return $topics;
    }
}