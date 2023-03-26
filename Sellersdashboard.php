<?php
 session_start();
 require 'dbcredential.php';
if(isset($_SESSION['seller_id'])){
    $seller_id=$_SESSION['seller_id'];
    $query = "SELECT * FROM sellers WHERE seller_id = '$seller_id'";
        $queryDb = $connectdb->query($query);
        if($queryDb->num_rows > 0){
            $userDetails = $queryDb->fetch_assoc();
        }
    $query2 = "SELECT * FROM CATEGORY";  
    $querydb = $connectdb->query($query2);
}
else{
    header('Location: sellers.php');
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
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="container" id="blur">
<div class="navigation">
        <ul>
            <li>
                <a href="#">
                   <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span> 
                   <span class="title">Home</span>
                </a>
            </li>
            <li onclick="toggle()">
                <a href="#">
                   <span class="icon"><i class="fa fa-picture-o" aria-hidden="true"></i></span> 
                   <span class="title">Profile Picture</span>
                </a>
            </li>
            <li>
                <a href="#">
                   <span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span> 
                   <span class="title">Messages</span>
                </a>
            </li>
            <li>
              <a href="FAQ.php">
                   <span class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span> 
                   <span class="title">Help</span>
                </a>
            </li>
            <li>
                <a href="#">
                   <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span> 
                   <span class="title">Setting</span>
                </a>
            </li>
            <li>
                <a href="#">
                   <span class="icon"><i class="fa fa-upload" aria-hidden="true"></i></span> 
                   <span class="title">Upload Goods</span>
                </a>
            </li>
            <li>
                <form action="signout.php" method="post">
                <button type="submit" class="bg" name="signout">
                    <a href="#">
                        <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span> 
                        <span class="title">Sign Out</span>
                    </a>
                </button>
                </form>
            </li>
        </ul>
</div>
<div class="main-container">
        <div class="topbar">
            <div class="">
              <div class="toggled" onclick=toggleMenu()></div>
            </div>
            <div class="search">
                <label for="">
                    <input type="search" name="" placeholder="Search Here" id=""/>
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
            </div>
            <div class="userCon">
              <h4><?php echo $userDetails['name']?></h4>
              <div class="user">
                <img src="images/<?php echo $userDetails['profile_pic'];?>" alt=""/>
              </div>
            </div>
        </div>
    <div class="top-add">
     <div class="addGoods">
      <div>
       <h4>Trade And Money<i class="fa fa-money" aria-hidden="true"></i></h4>
       <form action="product.php" method="post" enctype="multipart/form-data">
        <input type="file" placeholder="Name" class="form_field" name="good">
        <div class="desc">
        <div class="form_group">
        <input type="text" placeholder="Name of goods" class="form_field" name="name">
        <label for="name of goods" class="form_label">Name of Goods</label>
        </div>
        <div class="form_group">
        <input type="text" placeholder="Description of goods" class="form_field" name="desc">
        <label for="Description of goods" class="form_label">Description of Goods</label>
        </div>
        <div class="form_group">
        <input type="number" placeholder="Amount of goods" class="form_field" name="amount">
        <label for="Amount of goods" class="form_label">Amount of Goods</label>
        </div>
        <div class="form_group">
        <input type="number" placeholder="Size of goods" class="form_field" name="size">
        <label for="Size of goods" class="form_label">Quantity of Goods</label>
        </div>
        <div class="box">
        <select name="category_id" id="">
            <option value="">Category</option>
        <?php
        if($querydb->num_rows > 0){
          while($categoryDetails = $querydb->fetch_assoc()){
              if($categoryDetails){
                echo "
                <option value='{$categoryDetails['category_id']}'>{$categoryDetails['cat_name']}</option>
                ";
            }
          };
        }        
        ?>
        </select>
        </div>
        </div>
        <button class="a" type="submit" name="submit">
        <span>Add Goods</span>
        <span>Add Goods</span>
        </button>
       </form>
      </div>
     </div>
    <div class="posted-bar">
        <div class="cardBox">
            <div class="card">
                <div>
                 <div class="numbers">50</div>
                 <div class="cardName">Sales</div>
                </div> 
                <div class="iconBx">
                 <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                 <div class="numbers">$6,504</div>
                 <div class="cardName">Earning</div>
                </div> 
                <div class="iconBx">
                 <i class="fa fa-money" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                 <div class="numbers">6</div>
                 <div class="cardName">Items</div>
                </div>
                <div class="iconBx">
                 <i class="fa fa-files-o" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card">
                <div>
                 <div class="numbers">50</div>
                 <div class="cardName">Messages</div>
                </div> 
                <div class="iconBx">
                 <i class="fa fa-comment" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="goods-added">
     <div class="all">
        <?php
        $query1= "SELECT products.product_id,products.product_name,products.time,products.product_image,products.description,products.amount,products.size, sellers.name,category.cat_name FROM `products` INNER JOIN `sellers` ON sellers.seller_id = products.seller_id  INNER JOIN `category` ON category.category_id = products.category_id WHERE sellers.seller_id='$seller_id' ORDER By products.product_id DESC";
        $image = $connectdb->query($query1);
        if ($image->num_rows > 0) {
            while ($imageDetail = $image->fetch_assoc()){
             if($imageDetail){
                 $_SESSION['image_detail']=$imageDetail;
                    echo "<div class='card'>
                    <div class='content'>
                    <small>CATEGORY - {$imageDetail['cat_name']}</small>
                   <h2>{$imageDetail['product_name']}</h2>
                   <h3>{$imageDetail['description']}</h3>
                   <img style='height:26vh; width:20vw;' src='ipost/{$imageDetail['product_image']}' alt=''>
                   <a href='#'>#{$imageDetail['amount']}</a>
                   <ul class='size'>
                   <span>Quantity</span>
                   <li>{$imageDetail['size']}</li>
                   </ul>
                    </div>
                    </div>";
              }
            }
        }
        ?>
     </div>
    </div>
</div>          
</div>
<div id="popup">
    <i class="fa fa-close" aria-hidden="true" onclick="toggle()"></i>
    <h4>Upload Your Profile Picture</h4>
    <form action="profilePic.php" method="post" enctype="multipart/form-data">
        <input type="file" placeholder="Name" class="form_field" name="profilePic">
        <button class="a" type="submit" name="submit">
        <span>Upload</span>
        <span>Upload</span>
        </button>
    </form>
</div>

    <script type="text/javascript">
        function toggleMenu(){
            let main = document.querySelector('.main-container');
            let navigation = document.querySelector('.navigation');
            let toggle = document.querySelector('.toggled');
            navigation.classList.toggle('active')
            toggle.classList.toggle('active')
            main.classList.toggle('active')
        }
        function toggle(){
            var blur= document.getElementById('blur');
            blur.classList.toggle('active');
            var popup= document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>
</body>
</html>