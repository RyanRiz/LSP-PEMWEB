<?php

require 'app.php';

if (isset($_POST["register"])){
    if (register ($_POST) > 0){
        echo " <script>
                alert('User Berhasil Ditambahkan!');
                document.location.href = 'login.php';
                </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register | Car Wash</title>
  </head>
  <body>
      <div class="container">
          <div class="d-flex pt-5">
              <img src="LOGO.png" class="img-thumbnail rounded-circle mx-auto" width="200" height="200" alt="" srcset="">
          </div>

          <div class="title">
              <div class="pt-3">
                  <h1 class="text-center">SELAMAT DATANG DI CAR WASH <br> SMKN 2 BANJARMASIN</h1>
              </div>
          </div>
      
          <div class="box pt-3">
              <div class="card col-md-5 mx-auto">
                  <div class="card-body">
                      <?php if(isset($msg)) :?>
                        <?= $msg ?>
                        <?php endif ?>
                      <form action="" method="post">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
                              <label for="floatingInput">Username</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                              <label for="floatingPassword">Password</label>
                          </div>
                          <div class="form-floating">
                              <input type="password" class="form-control" name="confirm_password" id="floatingPassword" placeholder="Password">
                              <label for="floatingPassword">Confirm Password</label>
                          </div>
                          <div class="row pt-4">
                            <div class="col-6">

                            </div>
                              <div class="col-6">
                                  <div class="d-grid gap-2">
                                      <button type="submit" name="register" class="btn btn-primary">Register</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>