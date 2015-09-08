<?php

namespace habr;

class WebTopic extends Topic {

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
//echo "<pre>";
//print_r($items);
//echo "</pre>";
//die();

        return $items;
    }
} 