<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "SELECT * FROM `brands`;";

 $stmt= $conn->prepare($query);
 $result= $stmt->execute();
 $brands= $stmt->fetchAll();

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
            <div class="row justify-content-center mt-4">
                <div class="col-md-5">
                    <h3 class="text-center">List:</h3>

                    <div class="mb-2">
                    <button type="button" class="btn btn-secondary btn-sm"><a href="creat.php" class="text-white text-decoration-none">Creat new product</a></button>
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
    if(count($brands)>0):
    ?>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($brands as $brand):
    ?>
    <tr>
      <td><?= ($brand['title']); ?></td>
      <td><?=($brand['is_active'] == 1)? 'Active' :'Deactivated';?></td>
      <td><a href="show.php?id=<?php echo($brand['id']); ?>">Show</a>|<a href="edit.php?id=<?php echo($brand['id']); ?>"> Edit</a> |<a href="delete.php?id=<?php echo($brand['id']); ?>" onclick="return confirm('Are you sure you want to delete')"> Delete</a> </td>
      
    </tr>
    <?php
    endforeach;
  else:
    ?>
    <tr>
      <td>
        No product Available. <a href="creat.php">Add some product</a>
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