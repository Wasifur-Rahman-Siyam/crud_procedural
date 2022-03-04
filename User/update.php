<?php

session_start();
$_id=$_POST['id'];
$_First_Name=$_POST['First_Name'];
$_Last_Name=$_POST['Last_Name'];
$_email=$_POST['email'];
$_password=$_POST['password'];
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

 $query= "UPDATE `user` SET `First_Name` = :First_Name, `Last_Name` = :Last_Name, `email` = :email , `password` = :password, `birthday` = :birthday , `hobbies` = :hobbies, `city` = :city	WHERE `user`.`id` = :id;";

 $stmt= $conn->prepare($query); 
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':First_Name', $_First_Name );
 $stmt->bindParam(':Last_Name', $_Last_Name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':password', $_password);
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