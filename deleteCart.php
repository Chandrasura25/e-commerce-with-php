<?php
session_start();
require 'dbcredential.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    if (isset($_POST['submit'])) {
        $cart_id = $_POST['cart_id'];
        print_r($cart_id);
        $query = "DELETE FROM cart WHERE cart_id= '$cart_id'";
    $deleted = $connectdb->query($query);
    if ($deleted) {
        echo "object in the cart deleted successfully";
        header('Location: cartPage.php');
    } else {
        $_SESSION['post_error']="Deleting failed, please try again later";
    }
    }
    else{
     header('Location: cartPage.php');
    }
} else {
    header('Location: signin.php');
}
?>