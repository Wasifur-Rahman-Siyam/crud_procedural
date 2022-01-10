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
                <div class="col-md-5">
                    <h3 class="text-center">Add hare:</h3>
                    <form  method="post" action="store.php" enctype="multipart/form-data" class="mt-3">

                    <div class="mb-3 row">
                      <label for="inputid" class="col-md-2 col-form-label"></label>
                      <div class="col-md-10">
                        <input type="hidden" class="form-control" id="inputid" name="id">
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="inputtitle" class="col-md-2 col-form-label">Title:</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="inputtitle" name="title">
                      </div>
                    </div>

              

                    <div class="mb-3 row">
                      <label for="inputlink" class="col-md-2 col-form-label">link:</label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="inputlink" name="link">
                      </div>
                    </div>


                    <div class="form-check">
                      <input class="form-check-input" 
                      type="checkbox" 
                      value="1" 
                      id="inputisactive"
                      name="is_active">
                      <label class="form-check-label" for="inputisactive">
                      Is Active
                      </label>
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