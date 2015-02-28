<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task 10</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Select</h2>
    <table class="table table-hover">
      <thead>
        <tr>
         <th><?php echo strtoupper(implode('</th><th>', array_keys(current($my_select)))); ?>
        </th> 
        </tr>
      </thead>
      <tbody>
<?php foreach ($my_select as $row): array_map('htmlentities', $row); ?>
      <tr>
        <td><?php echo implode( '</td><td>',$row ); ?></td>
      </tr>
<?php endforeach;?>
      </tbody>
    </table>
  </div>
</body>
</html>
