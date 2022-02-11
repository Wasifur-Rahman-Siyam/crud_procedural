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
              <label for="inputname" class="col-md-2 col-form-label">Name:</label>
              <div class="col-md-10">
                <input type="text" class="form-control" id="inputname" name="name">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="inputemail" class="col-md-2 col-form-label">Email:</label>
              <div class="col-md-10">
                <input type="email" class="form-control" id="inputlink" name="email">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="inputpassword" class="col-md-2 col-form-label">Password:</label>
              <div class="col-md-10">
                <input type="password" class="form-control" id="inputpassword" name="password">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="inputdate" class="col-md-2 col-form-label">Birthday:</label>
              <div class="col-md-10">
                <input type="date" class="form-control" id="inputdate" name="birthday">
              </div>
            </div>


            <div class="mb-3">
              <p>Please select your City:</p>
              <select name="city" class="form-select" aria-label="Default select example">
                <option value="" selected>Select your city</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
                <coption value="Rajshahi">Rajshahi</option>
                  <option value="Sylhet">Sylhet</option>
                  <option value="Gazipur">Gazipur</option>
              </select>
            </div>


            <div class="mb-4">
              <p>Select your hobbis </p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cricket" name="hobbies[]" value="Cricket">
                <label for="cricket" class="form-label">Cricket</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="football" name="hobbies[]" value="Football">
                <label for="football" class="form-label">Football</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="swimming" name="hobbies[]" value="Swimming">
                <label for="swimming" class="form-label">Swimming</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="programming" name="hobbies[]" value="Programming">
                <label for="Programming" class="form-label">Programming</label>
              </div>
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