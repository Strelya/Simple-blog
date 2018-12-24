

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
      </div>
    </nav>

    <main role="main">

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4 text-center text-lg-left">Thumbnail Gallery</h1>

      <div class="row text-center text-lg-left">
<?php

/*$sqlconf='my.cnf';
$sql = new mysqli;
$sql->init();
$sql->options(MYSQLI_READ_DEFAULT_FILE, $sqlconf);
$sql->real_connect();*/

$sql = new mysqli('localhost', 'user', 'pass', 'novcom');

if ($sql->connect_errno) {
    printf("Не удалось подключиться: %s\n", $sql->connect_error);
    exit();
}
if (isset($_GET["page"])) {
	$start = ($_GET["page"]*8)-8;
	$query = "SELECT * FROM blog_posts LIMIT ".$start.", 8";
}
else
{
	$query = "SELECT * FROM blog_posts LIMIT 8";
}
if ($result = $sql->query($query)) {
	while ($row = $result->fetch_assoc()) {
    ?>
		<div class="col-lg-3 col-md-4 col-xs-6">
          <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/320x240" alt="">
		  <div class="caption">
            <h3><?=$row["title"]?></h3>
            <p><?=$row["post"]?></p>
          </div>          
		  </a>

        </div>
	<?php		
    }

    /* удаление выборки */
    $result->free();
}

?>
    
      </div>

    </div>
    <!-- /.container -->
	
	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item  <? if($_GET['page']==1) {echo "disabled";} ?>">
      <a class="page-link" href="?page=<?=$i-1;?>" tabindex="-1">Предыдущая</a>
    </li>	
	<?php		
$query_pages = $sql->query("SELECT COUNT(*) FROM blog_posts");
list($count) = $query_pages->fetch_row();
$pages = round($count/8, 0, PHP_ROUND_HALF_UP);
for ($i = 1; $i <= $pages; $i++) {
?>
<li class="page-item <? if($i==$_GET['page']) {echo "active";} ?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
<?php
}
$sql->close();
?>
    <li class="page-item">
      <a class="page-link" href="?page=<?=$i+1?>">Следующая</a>
    </li>
  </ul>
</nav>

    </main>
