<?php

session_start();
$_id=$_POST['id'];
$_title=$_POST['title'];

if($_FILES['picture']['name'] != ''){
  $app_root= $_SERVER['DOCUMENT_ROOT'] .'/Pondit_Practice/crud_pondit/products/Uploads/';
$filename='IMG_'. time() . ' ' . $_FILES['picture']['name'];
$target =$_FILES['picture']['tmp_name'];
$destination=$app_root . $filename;
$is_file_moved=move_uploaded_file($target,$destination);
if($is_file_moved){
  $_picture=$filename;
}
else{
  $_picture=null;
}

}
else{
  $_picture=$_POST['old_picture'];
}

if(array_key_exists('is_active', $_POST)){
  $_is_active=$_POST['is_active'];
}
else{
  $_is_active=0;
}

$_product_type=$_POST['product_type'];


$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "UPDATE `products` SET `title` = :title , `picture` = :picture, `is_active` = :is_active, `product_type` = :product_type	WHERE `products`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':title', $_title );
 $stmt->bindParam(':picture', $_picture );
 $stmt->bindParam(':product_type', $_product_type);
 $stmt->bindParam(':is_active', $_is_active);

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>