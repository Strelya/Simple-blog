<?php

include 'app/connect.php';

    /*$arr = require 'app/routes.php';
    foreach ($arr as $key => $val) {
        $this->add($key, $val);
        var_dump($this);
    }*/

include 'views/head.php';
include 'views/nav.php';

if(isset($_SERVER['REDIRECT_URL']))
{
switch ($_SERVER['REDIRECT_URL']) {
    case '/about' :
        $title = $h1 = "О нас";
        include __DIR__ . '/views/about.php';
        
        break;
    default:
        $title = $h1 = "404";
        require __DIR__ . '/views/404.php';
        //header('HTTP/1.0 404 Not Found');
        break;
}
}
elseif (isset($_GET["page"])) {
    $start = ($_GET["page"]*8)-8;
    $query = "SELECT * FROM posts LIMIT ".$start.", 8";
    $title = $h1 = "Отзывы - Страница ".$_GET["page"];
    $query_pages = $sql->query("SELECT COUNT(*) FROM posts");
    $count = $query_pages->fetchColumn();
    $pages = round($count/8, 0, PHP_ROUND_HALF_UP);
    include __DIR__ . '/views/main.php';
}
elseif (isset($_GET["post"])) {
    $query = "SELECT * FROM posts WHERE id = ".$_GET["post"];
    $title = $h1 = "Идентификатор ".$_GET["post"];
    
    include __DIR__ . '/views/single_post.php';
}
else
{
    $query = "SELECT * FROM posts LIMIT 8";
    $title = $h1 = "Отзывы";
    $query_pages = $sql->query("SELECT COUNT(*) FROM posts");
    $count = $query_pages->fetchColumn();
    $pages = round($count/8, 0, PHP_ROUND_HALF_UP);
    include __DIR__ . '/views/main.php';
}

include 'views/footer.php';