<?php
session_start();
require "dbcredential.php";
if (isset($_POST['submit'])) {

    $fileName =$_FILES['profilePic']['name'];
    $seller_id=$_SESSION['seller_id'];
    $newName= time().$fileName;
    echo $newName;
    $uploading= move_uploaded_file($_FILES['profilePic']['tmp_name'],'images/'.$newName);
    if($uploading){
        $query= "UPDATE sellers SET profile_pic = '$newName' where seller_id = $seller_id ";
        $queryDb = $connectdb->query($query);
        print_r($queryDb);
        if ($queryDb) {
            header('Location: sellers.php');
        } else {
            $_SESSION['upload_error'] ='Unable to upload';
        } 
    } 
    else {
        $_SESSION['upload_error'] ='Unable to upload';
    }
}
?>