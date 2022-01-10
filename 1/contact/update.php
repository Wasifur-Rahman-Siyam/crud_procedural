<?php

session_start();
$_id=$_POST['id'];
$_name=$_POST['name'];
$_email=$_POST['email'];
$_subject=$_POST['subject'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "UPDATE `contact` SET `name` = :name , `email` = :email ,`subject` =:subject	WHERE `contact`.`id` = :id;";

 $stmt= $conn->prepare($query); 
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':name', $_name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':subject', $_subject);

 $result= $stmt->execute();
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>