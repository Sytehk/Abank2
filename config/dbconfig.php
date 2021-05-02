<?php
$con = mysql_connect("127.1.1.44","abank2","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ob");
?>


<?php
$con = new mysqli("127.1.1.44", "abank2", "root", "apagmgaj");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>