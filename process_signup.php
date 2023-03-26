<?php
session_start();
 require "dbcredential.php";
 if (isset($_POST['submit'])) {
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $phone_no = $_POST['phone_no'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   $checkExist = "SELECT * FROM users WHERE email = '$email' ";
   $queryExist = $connectdb->query($checkExist) ;
   if($queryExist->num_rows >0){
       $_SESSION['message'] = 'This email already exist';
       header('Location: signup.php');
    }
    else{
       $hashpassword= password_hash($password, PASSWORD_DEFAULT);
       $query = "INSERT INTO users (first_name,last_name,email,phone_no,password) VALUES ('$first_name','$last_name', '$email','$phone_no','$hashpassword')";
       $queryDb = $connectdb->query($query);

       print_r($queryDb);
       if ($queryDb) {
        header('Location: signin.php');
       }
       else{
        $_SESSION['message'] = 'Registration Failed, Try again later. ';
       }
   }
 }
 else{
    echo "Wrong Entry";
 }
?>