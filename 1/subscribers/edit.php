<?php
$_id=$_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "SELECT * FROM `subscribers` WHERE id = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );

 $result= $stmt->execute();
 $tag= $stmt->fetch(); 

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Crud: Creat</title>
  </head>
  <body>
    <section>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-5">
                    <h3 class="text-center">Edit hare:</h3>
                    <form  method="post" action="update.php" enctype="multipart/form-data" class="mt-3">

                    <div class="mb-3 row">
                      <label for="inputid" class="col-md-2 col-form-label"></label> 
                      <div class="col-md-10">
                        <input type="hidden" class="form-control" id="inputid" name="id"
                        value="<?= $tag['id']; ?>">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputemail" class="col-md-2 col-form-label">E-mail</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" 
                        id="inputemail" 
                        name="email" 
                        value="<?= $tag['email']; ?>">
                      </div>
                    </div>


                    <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                  </div>

                  <button type="button" class="btn btn-secondary "><a href="index.php" class="text-white text-decoration-none">Back to index</a></button>

                    </form>

                </div>
            </div>
        </div>
    </section>


  </body>
</html>