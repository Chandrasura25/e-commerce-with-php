<?php
include 'dbcredential.php';
$seller_id=$_SESSION['seller_id'];;

if (isset($_POST['signout'])) {
  session_unset();
 header('Location: landingPage.php');
}
?>