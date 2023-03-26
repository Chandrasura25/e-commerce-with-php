<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="box">
        <form action="injectLogin.php" method="post">
        <div class="form">
            <h2>Sign In</h2>
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
            <div class="links">
                <a href="#">Forgot Password?</a>
                <a href="Buyer_signup.php">Signup</a>
            </div>
            <input type="submit" name="submit" value="Login">
        </div>
        </form>
    </div>
</body>
</html>