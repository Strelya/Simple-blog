
    <main role="main">

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4 text-center text-lg-left"><?=$h1?></h1>

      <div class="row text-center text-lg-left">
404
Страница не найдена
    
      </div>
    </div>
    <!-- /.container -->

	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item  <? if($_GET['page']==1) {echo "disabled";} ?>">
      <a class="page-link" href="?page=<?=$i-1;?>" tabindex="-1">Предыдущая</a>
    </li>	
	<?php		
$query_pages = $sql->query("SELECT COUNT(*) FROM posts");
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
