<?php




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
  <title>Crud: Creat</title>
</head>

<body>
  <section>
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-6">
          <h3 class="text-center">Add hare:</h3>
          <form method="post" action="store.php" enctype="multipart/form-data" class="mt-3">

            <div class="mb-3 row">
              <label for="inputid" class="col-md-2 col-form-label"></label>
              <div class="col-md-10">
                <input type="hidden" class="form-control" id="inputid" name="id">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="inputname" class="col-md-2 col-form-label">First Name:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="inputname" name="First_Name">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="inputname" class="col-md-2 col-form-label">Last Name:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="inputname" name="Last_Name">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="inputemail" class="col-md-2 col-form-label">Email:</label>
              <div class="col-md-10">
                <input type="email" class="form-control" id="inputlink" name="Email">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="inputdate" class="col-md-2 col-form-label">Birthday:</label>
              <div class="col-md-10">
                <input type="date" class="form-control" id="inputdate" name="Date_of_Birth">
              </div>
            </div>

            <div class="mb-4">
              <p>Please select your gender:</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="male" name="Gender" value="Male" <label for="male" class="form-label">Male</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="female" name="Gender" value="Female" <label for="female" class="form-label">Female</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" id="Other" name="Gender" value="Other" <label for="Other" class="form-label">Other</label>
              </div>

              <div class="mb-3 row">
                <label for="inputpicture" class="col-md-2 col-form-label">Photo:</label>
                <div class="col-md-10">
                  <input type="file" class="form-control" id="inputpicture" name="Photo">
                </div>
              </div>


              <div class="mb-3">
                <p>Please select your City:</p>
                <select name="City" class="form-select" aria-label="Default select example">
                  <option value="" selected>Select your city</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Chittagong">Chittagong</option>
                  <coption value="Sylhet">Sylhet</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Mymensing">Mymensing</option>
                    <option value="Rangpur">Rangpur</option>
                </select>
              </div>


              <div class="mb-4">
                <p>Select your hobbis </p>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="cricket" name="Hobbies[]" value="Cricket">
                  <label for="cricket" class="form-label">Cricket</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="football" name="Hobbies[]" value="Football">
                  <label for="football" class="form-label">Football</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Chess" name="Hobbies[]" value="Chess">
                  <label for="Chess" class="form-label">Chess</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="programming" name="Hobbies[]" value="Programming">
                  <label for="Programming" class="form-label">Programming</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="Traveling" name="Hobbies[]" value="Traveling">
                  <label for="Traveling" class="form-label">Traveling</label>
                </div>
              </div>

              <div class="mb-4">
                <p>Are you agreed with our terms and condition?</p>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="yes" name="toggle" value="1" <label for="yes" class="form-label">Yes</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="no" name="toggle" value="0" <label for="no" class="form-label">No</label>
                </div>


                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
          </form>

          <div>
            <button type="button" class="btn btn-secondary btn-sm"><a href="index.php" class="text-white text-decoration-none">Back to index</a></button>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>

</html>