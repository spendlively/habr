<?php

namespace habr;

require_once 'vendor/habr/TopicsList.php';

class User {

    /**
     * Логин пользователя (тот, что находится в url-адресе http://habrahabr.ru/users/{USER})
     *
     * @var null
     */
    public $login = null;

    public function __construct($login = null){

        if(empty($login)){
            throw new \Exception("Не задан логин польвателя!");
        }

        $this->login = $login;
    }

    /**
     * Возвращает ссылки на статьи пользователя, инкапсылированные в TopicsList
     *
     * @return TopicsList
     */
    public function getTopics(){

        $page = 1;
        $urlTemplate = "http://habrahabr.ru/users/%s/topics/page%s/";
        $links = array();

        while(true){

            $pageContent = file_get_contents(sprintf($urlTemplate, $this->login, $page));
            if(preg_match_all("@<\s*h1\s+class\s*=\s*\"title\"\s*>\s*<\s*a\s+href\s*=\s*\"([^\"]+)\"\s+class\s*=\s*\"post_title\">@ui", $pageContent, $matches)){
                $links = array_merge($links, $matches[1]);
            }
            else{
                break;
            }
            $page++;
        }

        return new \habr\TopicsList($links);
    }
}