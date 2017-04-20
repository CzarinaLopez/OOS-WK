<?php
if ($_FILES["csv_file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["csv_file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["csv_file"]["name"] . "<br />";
  echo "Type: " . $_FILES["csv_file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["csv_file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["csv_file"]["tmp_name"];
  }
?>