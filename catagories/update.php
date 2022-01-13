<?php

session_start();
$_id=$_POST['id'];
$_name=$_POST['name'];
$_link=$_POST['link'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "UPDATE `catagories` SET `name` = :name , `link` = :link 	WHERE `catagories`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':name', $_name);
 $stmt->bindParam(':link', $_link);

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>