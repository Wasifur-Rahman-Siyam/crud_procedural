<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "SELECT * FROM `sponsers` WHERE soft_delete = 1;";

 $stmt= $conn->prepare($query);
 $result= $stmt->execute();
 $sponsers= $stmt->fetchAll();





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
    <title>Crud: index</title>
  </head>
  <body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <h3 class="text-center">Trash items:</h3>
                    <div class="mb-2">
                    <button type="button" class="btn btn-secondary btn-sm"><a href="index.php" class="text-white text-decoration-none">Go to index</a></button>
                    </div>

                    <script>
                      function hidediv(){
                        document.getElementById("message").style.display="none";
                      }
                      setTimeout("hidediv()",3000);
                    </script>

                      <div class="mb-1 text-center" id="message">
                      <?php
                      if (isset($_SESSION['message'])) {
                      echo  $_SESSION['message'];
                      $_SESSION['message']='';
                      }
                      ?>
                    </div>


                    <table class="table table-bordered">
                    <thead>
                    <?php 
    if(count($sponsers)>0):
    ?>
  
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($sponsers as $sponser):
    ?>
    <tr>
    <td><?= ($sponser['title']); ?></td>
      <td><?=($sponser['is_active'] == 1)? 'Active' :'Deactivated';?></td>
      <td><a href="show.php?id=<?php echo($sponser['id']); ?>">Show</a>|<a href="restore.php?id=<?php echo($sponser['id']); ?>" onclick="return confirm('Are you sure you want to Restore')"> Restore</a>|<a href="delete.php?id=<?php echo($sponser['id']); ?>" onclick="return confirm('Are you sure you want to delete permanently')"> Delete</a> </td>
      
    </tr>
    <?php
    endforeach;
  else:
    ?>
    <tr>
      <td>
        <strong> No product Available.</strong>
       
    </td>
    </tr>
    <?php
    endif;
    ?>
  </tbody>
</table>

                </div>
            </div>
        </div>
    </section>


  </body>
</html>