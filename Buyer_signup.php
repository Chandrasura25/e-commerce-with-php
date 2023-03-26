<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="box">
       <form action="process_signup.php" method="post">
       <div class="form">
            <h2>Sign Up</h2>
            <?php
        session_start();
        if(isset($_SESSION['message'])){
          echo "<div class='alert alert-danger text-center'>".$_SESSION['message']."</div>";
        }
        session_unset();
       ?>
            <div class="inputBox">
                <input type="text" required name="first_name">
                <span>Firstname</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" required name="last_name">
                <span>Lastname</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="email" required name="email">
                <span>Email Address</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required name="password">
                <span>Password</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="number" required name="phone_no">
                <span>Phone Number</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forgot Password?</a>
                <a href="signin.php">Signin</a>
            </div>
            <input type="submit" name="submit" value="Sign Up">
        </div>
       </form>
    </div>
</body>
</html>