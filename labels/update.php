<?php

session_start();
$_id=$_POST['id'];
$_title=$_POST['title'];

if($_FILES['picture']['name'] != ''){
  $app_root= $_SERVER['DOCUMENT_ROOT'] .'/Pondit_Practice/crud_pondit/labels/Uploads/';
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

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $query= "UPDATE `labels` SET `title` = :title, `picture` = :picture 	WHERE `labels`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':picture', $_picture );
 $stmt->bindParam(':title', $_title);

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>