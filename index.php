<?php
$sql = new mysqli('localhost', 'user', 'pass', 'db');

if ($sql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $sql->connect_error);
    exit();
}

if (isset($_GET["page"])) {
	$start = ($_GET["page"]*8)-8;
	$query = "SELECT * FROM posts LIMIT ".$start.", 8";
	$title = $h1 = "Отзывы - Страница ".$_GET["page"];
}
else
{
	$query = "SELECT * FROM posts LIMIT 8";
	$title = $h1 = "Отзывы";
}

$request = $_SERVER['REDIRECT_URL'];
include 'head.php';

switch ($request) {
    case '/' :
        include __DIR__ . '/main.php';
        break;
    case '' :
        include __DIR__ . '/main.php';
        break;
    case '/about' :
		$title = $h1 = "О нас";
        include __DIR__ . '/about.php';
		
        break;
    default:
		$title = $h1 = "404";
		require __DIR__ . '/404.php';
		//header('HTTP/1.0 404 Not Found');
        break;
}

include 'footer.php';
include 'nav.php';