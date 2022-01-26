<?php

session_start();
$_id=$_POST['id'];
$_title=$_POST['title'];
$_link=$_POST['link'];

if(array_key_exists('is_active', $_POST)){
  $_is_active=$_POST['is_active'];
}
else{
  $_is_active=0;
}
$_modified_at= date('Y-m-d h-i-s',time());

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "UPDATE `brands` SET `title` = :title , `link` = :link , `is_active` = :is_active, `modified_at` =:modified_at	WHERE `brands`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':title', $_title);
 $stmt->bindParam(':link', $_link);
 $stmt->bindParam(':is_active', $_is_active);
 $stmt->bindParam(':modified_at', $_modified_at);

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>