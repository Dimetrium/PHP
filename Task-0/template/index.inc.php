<?php

include('controller.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Title</title>
<meta charset="UTF-8" name="" content="">
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<div id="admin_button">
  <a class="admin" style="background-color: red;" href="admin.php">Admin</a>
</div>

<div id="header">
<a id="header_link" href="index.php">Header</a>
</div>
<div id="content">
<table style="margin: auto;"> 
   <tr>
    <form method="GET" action="index.php">
      <td>Name Author<br>
        <input type="text" name="search"/>
      </td>
      <td>Genre<br>
        <select name="genre">
          <option value="">Any</option>
<?php 
while($genre)
        {
    echo '<option>'. $genre[genrename] .'</option>';
        }
?>
        </select>
      </td>
      <td>
        <br><input type="submit" name="show" value="Show"/>
      </td>
    </form>
   </tr>
</table><br>
<?php

include('');

?>

</div>
</body>
</html>
