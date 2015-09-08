<?php
header("Content-Type: text/html; Charset=utf-8");
set_time_limit(0);
//require_once 'vendor/habr/User.php';
//
//$user = new \habr\User('alexzfort');
//$topics = $user->getTopics()->getTopics('\habr\WebTopic');
//
//$all = array();
//if(!empty($topics)){
//    foreach($topics as $topic){
//        $items = $topic->getPhpItems();
//        $all = array_merge($all, $items);
//    }
//}
//
//file_put_contents("webAllDidgestsContent.txt", serialize($all));

$rawContents = file_get_contents("webAllDidgestsContent.txt");
$all = unserialize($rawContents);
if(!empty($all)){
    echo "<ul>";
    $num = 1;
    foreach($all as $item){
        echo "<li>{$num}) <a href=\"{$item['href']}\" target=\"_blank\">{$item['content']}</li>\n";
        $num++;
    }
    echo "</ul>";
}
