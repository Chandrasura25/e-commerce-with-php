<?php
session_start();
    require 'dbcredential.php';
     if(isset($_POST['submit'])){
         $email = $_POST['email'];
         $password = $_POST['password'];
         $query = "SELECT * FROM sellers WHERE email = '$email' ";
         $queryDb = $connectdb ->query($query);
         if($queryDb->num_rows > 0){
            $userDetails =$queryDb->fetch_assoc();
            $pass = $userDetails['password'];
            $verify = password_verify($password,$pass);
            if($verify){
                $_SESSION['seller_id'] = $userDetails['seller_id'];
                print_r($_SESSION['seller_id']);
                header('Location: Sellersdashboard.php'); 
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="sellers.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="email" id="" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password" id="" placeholder="Password">
                    </div>
                    <input type="submit" value="Login" name="submit" class="btn solid">
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-google" aria-hidden="true"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </form>

                <form action="sellers_process.php" method="POST" class="sign-up-form">
                <?php 
                // session_start();
                 //if(isset($_SESSION['message'])){
                   //echo "<div class='alert'>".$_SESSION['message']."</div>";
                // }
                 //session_unset();
                ?> 

                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="name" id="" placeholder="Fullname">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="email" id="" placeholder="Email Address">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="number" name="phone_no" id="" placeholder="Phone Address">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password" id="" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" value="Sign up" class="btn solid">
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-google" aria-hidden="true"></i></a>
                        <a href="#" class="social-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here ?</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi labore nobis vitae?</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="undraw_maker_launch_re_rq81.svg" alt="" class="image">
            </div>
            
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi labore nobis vitae?</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="undraw_press_play_re_85bj.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script>
        const sign_in_btn = document.querySelector('#sign-in-btn')
        const sign_up_btn = document.querySelector('#sign-up-btn')
        const container = document.querySelector('.container')
        sign_up_btn.addEventListener('click',()=>{
            container.classList.add('sign-up-mode')
        })
        sign_in_btn.addEventListener('click',()=>{
            container.classList.remove('sign-up-mode')
        })

    </script>
</body>
</html>