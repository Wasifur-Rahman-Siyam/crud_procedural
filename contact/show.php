<?php
$_id=$_GET['id'];
$web_root='http://localhost/Pondit_Practice/crud_pondit/contact/Uploads/';

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_exam", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "SELECT * FROM `contact` WHERE id = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );

 $result= $stmt->execute();
 $contact= $stmt->fetch();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Crud: show</title>
  </head>
  <body>
    <section>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-6">
                    <h3 class="text-center">Show:</h3>


                    <dl class="row">
                      <dt class="col-md-4">Id:</dt>
                      <dd class="col-md-8"><?= $contact['id']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Full Name: :</dt>
                      <dd class="col-md-8"><?= $contact['First_Name']. ' ' . $contact['Last_Name']; ?> </dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Password:</dt>
                      <dd class="col-md-8"><?= $contact['Email']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Birthday:</dt>
                      <dd class="col-md-8"><?= date("d-m-Y", strtotime($contact['Date_of_Birth'])); ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-2">Picture:</dt>
                      <dd class="col-md-10"><img src="<?=$web_root . $contact['Photo']; ?>" alt=""></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">City:</dt>
                      <dd class="col-md-8"><?= $contact['City']; ?></dd>
                    </dl>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Hobbies:</dt>
                      <dd class="col-md-8"><?= $contact['Hobbies']; ?></dd>
                    </dl>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Condition:</dt>
                      <dd class="col-md-8">
                        <?=($contact['toggle'] == 1)? 'Yes' :'No';?>
                      </dd>
                    </dl>


                    <div>
                      <button type="button" class="btn btn-secondary btn-sm"><a href="index.php" class="text-white text-decoration-none">Back to index</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


  </body>
</html>