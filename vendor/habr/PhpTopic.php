<?php

namespace habr;

class PhpTopic extends Topic {

    public function getPhpItems(){

        $data = $this->getData();
        $items = array();
        if(preg_match_all("@<li\s*><a\s+href\s*=\s*\"([^\"]+)\">\s*([^$]*?)\s*<\/li>@ui", $data, $matches)){
            foreach($matches[1] as $m => $match){

                $items[] = array(
                    'href' => $match,
                    'content' => $matches[2][$m],
                );
            }
        }

        return $items;
    }
} 