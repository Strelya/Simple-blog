
    <main role="main">

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4 text-center text-lg-left"><?=$h1?></h1>

      <div class="row text-center text-lg-left">
<?php

    foreach ($sql->query($query) as $row) {
    ?>
		<div class="col-lg-3 col-md-4 col-xs-6">
            <img class="img-fluid img-thumbnail" src="http://placehold.it/320x240" alt="">
		  <div class="caption">
            <h3><?=$row["name"]?></h3>
            <p><?=$row["text"]?></p>
          </div>          
    </div>
	<?php		
    }
?>
    
      </div>
    </div>
    <!-- /.container -->