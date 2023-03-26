<?php
    require 'dbcredential.php';
    session_start();
     if(isset($_POST['submit'])){
         $email = $_POST['email'];
         $password = $_POST['password'];
         $query = "SELECT * FROM users WHERE email = ? ";
         $preparedQuery = $connectdb ->prepare($query);
         $bindQuery = $preparedQuery->bind_param('s', $email);
         $queryDb = $preparedQuery -> execute();
         $result = $preparedQuery->get_result();
         if($result ->num_rows > 0){
             $userDetails = $result ->fetch_assoc();
            $pass = $userDetails['password'];
            $verify = password_verify($password,$pass);
            if($verify){
                $_SESSION['user_id']= $userDetails['user_id'];
                header('Location: User_dashboard.php'); 
            }
            else{
            echo "<div class='alert alert-danger text-center'>Invalid Password</div>";
            }
         }
         else{
            echo "<div class='alert alert-danger text-center'>Invalid Email Address</div>";
         }
     }
?>

 <!-- <?php 
//  "INSERT INTO users(first_name,last_name,email,phone_number) VALUES (?,?,?,?)"
// ?>