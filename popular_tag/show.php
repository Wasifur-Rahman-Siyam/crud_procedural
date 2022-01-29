<?php
$_id=$_GET['id'];
//var_dump($_GET);

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "SELECT * FROM `popular_tag` WHERE id = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );

 $result= $stmt->execute();
 $popular_tag= $stmt->fetch();
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
                <div class="col-md-5">
                    <h3 class="text-center">Show:</h3>

                    <dl class="row">
                      <dt class="col-md-2">Id:</dt>
                      <dd class="col-md-10"><?= $popular_tag['id']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-2">Name:</dt>
                      <dd class="col-md-10"><?= $popular_tag['name']; ?></dd>
                    </dl>


                    <dl class="row">
                      <dt class="col-md-2">Link:</dt>
                      <dd class="col-md-10"><?= $popular_tag['link']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Is active:</dt>
                      <dd class="col-md-8">
                        <?=($popular_tag['is_active'] == 1)? 'Active' :'Deactivated';?>
                      </dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Created at:</dt>
                      <dd class="col-md-8"><?= $popular_tag['created_at']; ?></dd>
                    </dl>

                    <dl class="row">
                      <dt class="col-md-4">Modified at:</dt>
                      <dd class="col-md-8"><?= $popular_tag['modified_at']; ?></dd>
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