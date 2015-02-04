<form enctype="multipart/form-data" action="" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
	<input name="userfile" type="file"/>
	<input type="submit"/>
</form>
<?php
echo $echo;


	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		UploadFile();
	}

?>
<table border=1>
<tr>
<td>#</td>
<td>Name</td>
<td>Size</td>
<td>Del</td>
<?php
for ($j=1; $j <$i; $j++){
?>
<tr>
<td><?=$j;?></td>
<td>
<a href="uploads/<?php print $name[$j];?>"><?php print $name[$j]?></a>
</td>

<td>
<?php print $size[$j];?>
</td>
<td>
<?php if ($name[$j]!="." && $name[$j]!=".."){?>
<a href="?del=<?echo $name[$j];?>">delete</a>
<?php}?>
</td>
</tr>
<?php
}
?>