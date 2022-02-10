<?php

session_start();
$_First_Name=$_POST['First_Name'];
$_Last_Name=$_POST['Last_Name'];
$_Email=$_POST['Email'];
$_Date_of_Birth=$_POST['Date_of_Birth'];
$_Gender=$_POST['Gender'];


$app_root= $_SERVER['DOCUMENT_ROOT'] .'/Pondit_Practice/crud_pondit/contact/Uploads/';

$filename='IMG_'. time() . ' ' . $_FILES['Photo']['name'];
$target =$_FILES['Photo']['tmp_name'];
$destination=$app_root . $filename;
$is_file_moved=move_uploaded_file($target,$destination);
if($is_file_moved){
  $_Photo=$filename;
}
else{
  $_Photo=null;
}

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

 $query= "INSERT INTO `user` (`name`, `email`, `password`, `birthday`,`city`, `hobbies`) VALUES (:name, :email, :password, :birthday, :city, :hobbies);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':name', $_name );
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
