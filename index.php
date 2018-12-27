<?php

include 'app/connect.php';

if (isset($_GET["page"])) {
	$start = ($_GET["page"]*8)-8;
	$query = "SELECT * FROM posts LIMIT ".$start.", 8";
	$title = $h1 = "Отзывы - Страница ".$_GET["page"];
}
elseif (isset($_GET["post"])) {
	$query = "SELECT * FROM posts WHERE id = ".$_GET["post"];
	$title = $h1 = "Отзыв ".$_GET["post"];
}
else
{
	$query = "SELECT * FROM posts LIMIT 8";
	$title = $h1 = "Отзывы";
}


$request = $_SERVER['REDIRECT_URL'];
include 'views/head.php';
include 'views/nav.php';

switch ($request) {
    case '/' :
        include __DIR__ . '/views/main.php';
        break;
    case '' :
        include __DIR__ . '/views/main.php';
        break;
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
$query_pages = $sql->query("SELECT COUNT(*) FROM posts");
$count = $query_pages->fetchColumn();
$pages = round($count/8, 0, PHP_ROUND_HALF_UP);

include 'views/paginate.php';
include 'views/footer.php';