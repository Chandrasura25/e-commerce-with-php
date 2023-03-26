<?php
 session_start();
 require 'dbcredential.php';
 if (isset($_POST['submit'])) {
    print_r($_POST);
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $query = "INSERT INTO cart (user_id,product_id) VALUES ('$user_id','$product_id')";
       $queryDb = $connectdb->query($query);
       if ($queryDb) {
          print_r($queryDb);
        header('Location: User_dashboard.php');
       }
       else{
        $_SESSION['message'] = 'Addition to cart Failed, Try again later. ';
       }
 }
?>