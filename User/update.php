<?php

session_start();
$_id=$_POST['id'];
$_name=$_POST['name'];
$_email=$_POST['email'];
$_birthday=$_POST['birthday'];
$_city=$_POST['city'];
if(isset($_POST['hobbies']))
{
    $_hobbies=implode(", ",$_POST['hobbies']);
}

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "UPDATE `user` SET `name` = :name , `email` = :email , `birthday` = :birthday , `hobbies` = :hobbies, `city` = :city	WHERE `user`.`id` = :id;";

 $stmt= $conn->prepare($query); 
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':name', $_name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':birthday', $_birthday);
 $stmt->bindParam(':city', $_city);
 $stmt->bindParam(':hobbies', $_hobbies);

 $result= $stmt->execute();
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>