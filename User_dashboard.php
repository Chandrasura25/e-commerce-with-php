<?php
session_start();
require 'dbcredential.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM `products` INNER JOIN `sellers` ON sellers.seller_id = products.seller_id  INNER JOIN `category` ON category.category_id = products.category_id ORDER BY category.category_id";
    $image = $connectdb->query($query);
    // print_r($user_id);
}
else{
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
    <link rel="stylesheet" href="user_dashboard.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Products..</a>
        <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="cartPage.php">Cart <i class="fa fa-cart-plus" aria-hidden="true"></i></a></li>
        </ul>
    </header>
    <section class="banner">
        <div class="imgBx">
            <img src="ipost/1662197053img1.jpg" class="active">
            <img src="ipost/1662197309img2.jpg">
            <img src="ipost/1662197480img3.jpg">
            <img src="ipost/1662197517img4.jpg">
        </div>
        <div class="contentBx">
            <div class="active">
                <h2>Slide Text One</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, consequatur! Molestiae, soluta iste!</p>
                <a href="#">Details</a>
            </div>
            <div>
                <h2>Slide Text Two</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, consequatur! Molestiae, soluta iste!</p>
                <a href="#">Details</a>
            </div>
            <div>
                <h2>Slide Text Three</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, consequatur! Molestiae, soluta iste!</p>
                <a href="#">Details</a>
            </div>
            <div>
                <h2>Slide Text Four</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, consequatur! Molestiae, soluta iste!</p>
                <a href="#">Details</a>
            </div>
        </div>
        <ul class="controls">
            <li onclick="prevSlide();prevSlideText()"></li>
            <li onclick="nextSlide();nextSlideText()"></li>
        </ul>
    </section>
    <section class="avalaible">
        <div class="goods">
        <?php
if ($image->num_rows > 0) {
    while ($imageDetail = $image->fetch_assoc()) {
        if ($imageDetail) {
            $_SESSION['image'] = $imageDetail;
            echo "
                    <div class='card'>
                     <div class='front'>
                      <img src='ipost/{$imageDetail['product_image']}' alt=''>
                     </div>
                     <div class='back'>
                      <div class='details'>
                      <h2>{$imageDetail['product_name']}<br><span>{$imageDetail['description']}</span></h2>
                      <div class='amount'>
                      <h2><sup>$</sup>{$imageDetail['amount']}</h2>
                      <ul class='size'><span>Amount Available</span><li>{$imageDetail['size']}</li></ul>
                      </div>
                      <form action='cart.php' method='POST'>
                      <input type='hidden' value='{$imageDetail['product_id']}' name='product_id'>
                      <input type='hidden' value='{$user_id}' name='user_id'>
                      <input type='submit' class='addTo' value='Add to Cart' name='submit'>
                      </form>
                      <div class='seller'>By {$imageDetail['name']} - {$imageDetail['cat_name']}</div>
                      </div>
                     </div>
                    </div>";
        }
    }
}
?>
        </div>
    </section>
    <script type="text/javascript">
        const imgBx = document.querySelector('.imgBx');
        const slides = imgBx.getElementsByTagName('img');
        var i = 0;
        function nextSlide(){
            slides[i].classList.remove('active');
            i = (i + 1) % slides.length;
            slides[i].classList.add('active');
        }
        function prevSlide(){
            slides[i].classList.remove('active');
            i = (i - 1 + slides.length) % slides.length;
            slides[i].classList.add('active');
        }

        const contentBx = document.querySelector('.contentBx');
        const slidesText = contentBx.getElementsByTagName('div');
        var j = 0;
        function nextSlideText(){
            slidesText[j].classList.remove('active');
            j = (j + 1) % slidesText.length;
            slidesText[j].classList.add('active');
        }
        function prevSlideText(){
            slidesText[j].classList.remove('active');
            j = (j - 1 + slidesText.length) % slidesText.length;
            slidesText[j].classList.add('active');
        }
    </script>
</body>
</html>