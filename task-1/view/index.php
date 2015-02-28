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
      <form action="../index.php" method="POST" enctype="multipart/form-data">
        <label for="uploadFile">Select File</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1024" />
        <input type="file" name="uploadFile" id="uploadFile" value="" />
        <input type="submit" name="submit" value="Upload" />
      </form>
    </div>
  <div class="col-md-4">
  	<table class="table table-hover">
  	  <thead>
  	    <tr>
  	      <th>File Name</th>
  	      <th>Size</th>
  	    </tr>
  	  </thead>
  	  <tbody>
  	    <tr>
  	      <td>John</td>
  	      <td>Doe</td>
  	    </tr>
  	    <tr>
  	      <td>Mary</td>
  	      <td>Moe</td>
  	    </tr>
  	    <tr>
  	      <td>July</td>
  	      <td>Dooley</td>
  	    </tr>
  	  </tbody>
  	</table>
  </div>
  </div>
</div>
</body>
</html>
