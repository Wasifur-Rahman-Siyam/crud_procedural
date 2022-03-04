<?php

session_start();
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

 $query= "INSERT INTO `user` (`First_Name`,`Last_Name`, `email`, `password`, `birthday`,`city`, `hobbies`) VALUES (:First_Name, :Last_Name, :email, :password, :birthday, :city, :hobbies);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':First_Name', $_First_Name );
 $stmt->bindParam(':Last_Name', $_Last_Name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':password', $_password);
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
