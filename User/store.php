<?php

session_start();
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

 $query= "INSERT INTO `user` (`name`, `email`, `birthday`,`city`, `hobbies`) VALUES (:name, :email, :birthday, :city,  :hobbies);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':name', $_name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':birthday', $_birthday);
 $stmt->bindParam(':city', $_city);
 $stmt->bindParam(':hobbies', $_hobbies);
 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Product added successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not added!";
 }
 header("location:index.php"); 
?>
