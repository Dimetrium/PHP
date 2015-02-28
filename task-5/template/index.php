<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task 5</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
	  <div class="col-sm-4">
	    <br><b>Band :</b> <?=$band?>
	    <br><b>Genre : </b> <?=$genre?>
	    <br><b>Band Members: </b>
	    <?php foreach ( $musician as $mus ): ?>
	    <ul class="list-group">
	      <?php foreach ( $mus as $kay=>$val ): ?>
	      <li class="list-group-item active"><?=$kay?>:</li>
	        <ul class="list-group">
	          <li class="list-group-item"><?=$val?></li>
	        </ul>
        <?php endforeach;?>
	    </ul>
      <hr />
	    <?php endforeach;?>
	  </div>
	</div>
</div>
</body>
</html>
