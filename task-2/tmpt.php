<?php

foreach ($file as $line_num => $line) {
  echo "Строка #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}

?>
