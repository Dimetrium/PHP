<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
  <title>ëÖÙ ëÁÏ</title>
  <meta name="" content="">
  <link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>

<body>
  <div id="admin_button"><a class="admin" style="background-color: red;" href="admin.php">áÉÉÔÁÏ</a>
  </div>
  <div id="header"><a id="header_link" href="index.php">ëÖÙ ëÁÏ</a>
  </div>
  <div id="content">
    <table style="margin: auto;">
      <tr>
        <form method="GET" action="index.php">
          <td>î×ÎÅáÏ:
            <br>
            <input type="text" name="search" />
          </td>
          <td>ö:
            <br>
            <select name="genre">
              <?php echo $dropdown; ?>
            </select>
          </td>
          <td>
            <br>
            <input type="submit" name="show" value="ðÚÔ" />
          </td>
        </form>
      </tr>
    </table>
    <br>
    <?php echo $showMenu;?>
  </div>
</body>

</html>
