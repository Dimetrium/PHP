<!DOCTYPE html>
<html>
<head>
    <title>File Uploader</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <form action="" method="POST" enctype="multipart/form-data">
        <label for="uploadFile">Select File</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="100024" />
        <input type="file" name="file" />
        <input type="submit" name="upload" value="Upload" />
      </form>
    </div>
<br />
  <div class="col-md-4">
<?php include('table.inc.php');?>
  </div>
  </div>
</div>
</body>
</html>
