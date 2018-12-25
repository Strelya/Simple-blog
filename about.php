
    <main role="main">

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4 text-center text-lg-left"><?=$h1?></h1>

      <div class="row text-center text-lg-left">
<?php

if ($result = $sql->query($query)) {
	while ($row = $result->fetch_assoc()) {
    ?>
		<div class="col-lg-3 col-md-4 col-xs-6">
          <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/320x240" alt="">
		  <div class="caption">
            <h3><?=$row["name"]?></h3>
            <p><?=$row["text"]?></p>
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
