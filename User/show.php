<?php
$_id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "SELECT * FROM `user` WHERE id = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );

 $result= $stmt->execute();
 $user= $stmt->fetch();
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
                      <dd class="col-md-8"><?= $user['id']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">First Name:</dt>
                      <dd class="col-md-8"><?= $user['First_Name']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Last Name:</dt>
                      <dd class="col-md-8"><?= $user['Last_Name']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">E-mail:</dt>
                      <dd class="col-md-8"><?= $user['email']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Password:</dt>
                      <dd class="col-md-8"><?= $user['password']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Birthday:</dt>
                      <dd class="col-md-8"><?= date("d-m-Y", strtotime($user['birthday'])); ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">City:</dt>
                      <dd class="col-md-8"><?= $user['city']; ?></dd>
                    </dl>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Hobbies:</dt>
                      <dd class="col-md-8"><?= $user['hobbies']; ?></dd>
                    </dl>
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