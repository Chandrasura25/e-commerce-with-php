<?php
include "dbcredential.php";
session_start();
$seller_id=$_SESSION['seller_id'];
print_r($_POST);
if (isset($_POST['submit'])) {
   $fileName=$_FILES['good']['name'];
   $name = $_POST['name'];
   $desc = $_POST['desc'];
   $amount = $_POST['amount'];
   $size = $_POST['size'];
   $category_id = $_POST['category_id'];
   $goodname = time().$fileName;
   // print_r($goodname);
   $upload= move_uploaded_file($_FILES['good']['tmp_name'],'ipost/'.$goodname);
  if ($upload){
     $query = "INSERT INTO products (product_name,description,amount,size,seller_id,product_image,category_id) VALUES ('$name','$desc','$amount','$size','$seller_id','$goodname','$category_id')";
     $insert=$connectdb->query($query);
     if($insert){
        echo "Uploaded successfully";
        header("Location: Sellersdashboard.php");
     }
     else {
        echo "Unable to upload";
     }
  }
  else{
      echo "uploads not successful";
  }
}
?>