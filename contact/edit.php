<?php
$_id = $_GET['id'];

$web_root='http://localhost/Pondit_Practice/crud_pondit/contact/Uploads/';

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_exam", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `contact` WHERE id = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);

$result = $stmt->execute();
$contact = $stmt->fetch();

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
        <div class="col-6">
          <h3 class="text-center">Edit hare:</h3>
          <form method="post" action="update.php" enctype="multipart/form-data" class="mt-3">

            <div class="mb-3 row">
              <label for="inputid" class="col-md-2 col-form-label"></label>
              <div class="col-md-10">
                <input type="hidden" class="form-control" id="inputid" name="id" value="<?= $contact['id']; ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="inputFirst_Name" class="col-md-2 col-form-label">First Name:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="inputFirst_Name" name="First_Name" value="<?= $contact['First_Name']; ?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputLast_Name" class="col-md-2 col-form-label">Last Name:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="inputLast_Name" name="Last_Name" value="<?= $contact['Last_Name']; ?>">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="inputemail" class="col-md-2 col-form-label">E-mail:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="inputemail" name="Email" value="<?= $contact['Email']; ?>">
              </div>
            </div>

            
            <div class="mb-3 row">
              <label for="inputdate" class="col-md-2 col-form-label">Birthday:</label>
              <div class="col-md-10">
                <input type="date" class="form-control" id="inputdate" name="Date_of_Birth" value="<?= $contact['Date_of_Birth'];?>">
              </div>
            </div>

            <div class="mb-4">
              <p>Please select your gender:</p>
              <div class="form-check">
                <input class="form-check-input" 
                type="radio" 
                id="male" 
                name="Gender" 
                value="Male" <?php if($contact['Gender'] == 'Male'){ echo"checked";}?> 
                <label for="male" class="form-label">Male</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" 
                type="radio" 
                id="female" 
                name="Gender" 
                value="Female"  <?php if($contact['Gender'] == 'Female'){ echo"checked";}?>
                <label for="female" class="form-label">Female</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" 
                type="radio" 
                id="others" 
                name="gender" 
                value="Others" <?php if($contact['Gender'] == 'Others'){ echo"checked";}?>
                <label for="others" class="form-label">Others</label>
              </div>
            </div>

            <div class="mb-3 row">
                      <label for="inputpicture" class="col-md-2 col-form-label">Photo:</label>
                      <div class="col-md-10">
                        <input type="file" 
                        class="form-control" 
                        id="inputpicture" 
                        name="Photo"
                        value="<?= $contact['Photo']; ?>">
                        <img src="<?=$web_root . $contact['Photo']; ?>" alt="">

                        <input type="hidden" 
                        class="form-control" 
                        id="inputpicture" 
                        name="old_Photo"
                        value="<?= $contact['Photo']; ?>">
                      </div>
                    </div>

            <div class="mb-3">
                <p>Please select your City:</p>
                <select name="City" class="form-select" aria-label="Default select example">
                  <option <?php if($contact['City'] ==''){ echo "selected"; } ?> value="">Select your city</option>
                  <option <?php if($contact['City'] =='Dhaka'){ echo "selected"; } ?> value="Dhaka">Dhaka</option>
                  <option <?php if($contact['City'] =='Chittagong'){ echo "selected"; } ?> value="Chittagong">Chittagong</option>
                  <coption <?php if($contact['City'] =='Sylhet'){ echo "selected"; } ?> value="Sylhet">Sylhet</option>
                    <option <?php if($contact['City'] =='Barisal'){ echo "selected"; } ?> value="Barisal">Barisal</option>
                    <option <?php if($contact['City'] =='Khulna'){ echo "selected"; } ?> value="Khulna">Khulna</option>
                    <option <?php if($contact['City'] =='Rajshahi'){ echo "selected"; } ?> value="Rajshahi">Rajshahi</option>
                    <option <?php if($contact['City'] =='Mymensing'){ echo "selected"; } ?> value="Mymensing">Mymensing</option>
                    <option <?php if($contact['City'] =='Rangpur'){ echo "selected"; } ?> value="Rangpur">Rangpur</option>
                </select>
              </div>
            



            <?php
            $_Hobbies = explode(", ", $contact['Hobbies']);
            ?>


            <div class="mb-4">
              <p>Select your hobbis </p>
              <div class="form-check">
                <?php
                if (in_array('Cricket', $_Hobbies)) {
                ?>
                  <input class="form-check-input" type="checkbox" id="cricket" name="Hobbies[]" value="Cricket" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" id="cricket" name="Hobbies[]" value="Cricket">
                <?php
                }
                ?>

                <label for="cricket" class="form-label">Cricket</label>
              </div>

              <div class="form-check">
                <?php
                if (in_array('Football', $_Hobbies)) {
                ?>
                  <input class="form-check-input" type="checkbox" id="football" name="Hobbies[]" value="Football" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" id="football" name="Hobbies[]" value="Football">
                <?php
                }
                ?>
                <label for="football" class="form-label">Football</label>
              </div>

              <div class="form-check">
                <?php
                if (in_array('Chess', $_Hobbies)) {
                ?>
                  <input class="form-check-input" type="checkbox" id="Chess" name="Hobbies[]" value="Chess" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" id="Chess" name="Hobbies[]" value="Chess">
                <?php
                }
                ?>
                <label for="Chess" class="form-label">Chess</label>
              </div>

              <div class="form-check">
                <?php
                if (in_array('Programming', $_Hobbies)) {
                ?>
                  <input class="form-check-input" type="checkbox" id="Programming" name="Hobbies[]" value="Programming" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" id="Programming" name="hobbies[]" value="Programming">
                <?php
                }
                ?>
                <label for="Programming" class="form-label">Programming</label>
              </div>

              <div class="form-check">
                <?php
                if (in_array('Traveling', $_Hobbies)) {
                ?>
                  <input class="form-check-input" type="checkbox" id="Traveling" name="Hobbies[]" value="Traveling" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" id="Traveling" name="hobbies[]" value="Traveling">
                <?php
                }
                ?>
                <label for="Traveling" class="form-label">Traveling</label>
              </div>
            </div>

            <div class="mb-4">
              <p>Are you agreed with our terms and condition?</p>
              <?php
              if ($contact['toggle'] == 1) {
              ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="yes" name="toggle" value="1" <label for="yes" class="form-label" checked>Yes</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" id="no" name="toggle" value="0" <label for="no" class="form-label">No</label>
                </div>
              <?php
              } else {
              ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="yes" name="toggle" value="1" <label for="yes" class="form-label" >Yes</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" id="no" name="toggle" value="0" <label for="no" class="form-label" checked>No</label>
                </div>
              <?php
              }
              ?>
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