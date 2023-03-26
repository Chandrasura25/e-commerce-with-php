<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db_name = "august";
$connectdb = new mysqli($localhost,$username,$password,$db_name);

if ($connectdb->connect_error) {
  die ("Unable to connect".$connectdb->connect_error);
} else {
    // echo "connection is successful";
}
?>