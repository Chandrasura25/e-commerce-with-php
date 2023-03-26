<?php
session_start();
require 'dbcredential.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM `cart`  INNER JOIN `products` ON products.product_id = cart.product_id WHERE cart.user_id='$user_id'";
    $cart = $connectdb->query($query);
} else {
    header('Location: signin.php');
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
    <link rel="stylesheet" href="cartPage.css">
</head>
<body>
    <section>
        <h1 class="h1">Cart Page</h1>
        <div class="events">
        <div class="define">
            <ul>
                <li>Description</li>
                <li>Size</li>
                <li>Quantity</li>
                <li>Remove</li>
                <li>Amount</li>
            </ul>
        </div>
            <ul class="ul">
             <?php
if ($cart->num_rows > 0) {
    while ($cartDetail = $cart->fetch_assoc()) {
        if ($cartDetail) {
            $_SESSION['cart_detail'] = $cartDetail;
            echo "
                <li>
                    <div class='time'>
                        <h2><img src='ipost/{$cartDetail['product_image']}' alt=''></h2>
                    </div>
                    <div class='details'>
                        <h3>{$cartDetail['product_name']}</h3>
                        <p>{$cartDetail['description']}</p>
                    </div>
                    <div class='size'>
                        <a href='#'>{$cartDetail['size']}</a>
                    </div>
                    <div class='quantity'>
                    <form action='' method='Post'>
                    <div class='contain'>
                    <input type='number' value='1'/>
                    </div>
                    </form>
                    </div>
                    <div class='remove'>
                    <form action='deleteCart.php' method='Post'>
                    <input type='hidden' name='cart_id' value='{$cartDetail['cart_id']}' />
                    <button name='submit' type='submit'>
                    <div class='box'>
                    <i class='fa fa-trash' aria-hidden='true'></i>
                    </div>
                    </button>
                    </form>
                    </div>
                    <div class='price'>
                    <div class='priceBx'>
                    <p>{$cartDetail['amount']}</p>
                    </div>
                    </div>
                    <div style='clear: both;'></div>
                </li>
                ";
        }
    }
}
?>
       </ul>
       <div class="bod">
        <form action="" method="post">
            <button class="a">Cash Out</button>
        </form>
       </div>
        </div>
    </section>
</body>
</html>