
	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item  <? if($_GET['page']==1 or empty($_GET['page'])) {echo "disabled";} ?>">
      <a class="page-link" href="?page=<?=$_GET['page']-1;?>" tabindex="-1">Предыдущая</a>
    </li>	
	<?php		

for ($i = 1; $i <= $pages; $i++) {
?>
<li class="page-item <? if($i==$_GET['page']) {echo "active";} ?>"><a class="page-link" href="/?page=<?=$i?>"><?=$i?></a></li>
<?php
}
?>
    <li class="page-item <? if ($_GET['page'] == $pages) {echo "disabled";} ?>">
      <a class="page-link" href="?page=<?=$_GET['page']+1?>">Следующая</a>
    </li>
  </ul>
</nav>

    </main>
