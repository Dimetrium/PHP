<html>
<head>
<title>%TITLE%</title>
  <link rel="stylesheet" href="%STYLE%">
</head>
<body>
<div class="container">
<div class="row">
  <div class="col-md-4">
      <h2>Contact Form</h2>
      <form role="form" method="post" action="index.php">
        <div class="form-group">
          <label for="usr">Name:</label>
          <input type="text" class="form-control" id="usr" value="%NAME%">
        </div>    
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="e-mail" value="%EMAIL%" placeholder="Enter email">
        </div>
        <div class="form-group">
        <label for="sel1">Select Subject:</label>
        <select class="form-control" id="sel1">
          <option>Subject 1</option>
          <option>Subject 2</option>
          <option>Subject 3</option>
          <option>Subject 4</option>
          </select>
        </div>
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment">%MESSAGE%</textarea>
        </div>
        <button type="submit" formmethod="post" name="email" class="btn btn-default">Send Mail</button>
      </form>
      <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        %ERRORS%
      </div>
  </div>
</div>
</div>
</body>
</html>
