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

$_City=$_POST['City'];
if(isset($_POST['Hobbies']))
{
    $_Hobbies=implode(", ",$_POST['Hobbies']);
}
$_toggle=$_POST['toggle'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_exam", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query= "UPDATE `contact` SET `First_Name` = :First_Name ,`Last_Name` = :Last_Name, `Email` = :Email, `Date_of_Birth` = :Date_of_Birth, `Gender` = :Gender,`Photo` = :Photo, `City` = :City, `Hobbies` = :Hobbies, `toggle` = : toggle	WHERE `contact`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':First_Name', $_First_Name );
 $stmt->bindParam(':Last_Name', $_Last_Name );
 $stmt->bindParam(':Email', $_Email);
 $stmt->bindParam(':Date_of_Birth', $_Date_of_Birth);
 $stmt->bindParam(':Gender', $_Gender);
 $stmt->bindParam(':Photo', $_Photo);
 $stmt->bindParam(':City', $_City);
 $stmt->bindParam(':Hobbies', $_Hobbies);
 $stmt->bindParam(':toggle', $_toggle);
 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Contact added successfully!";
 }
 else{
  $_SESSION['message'] = "Contact is not added!";
 }
 header("location:index.php"); 
?>
