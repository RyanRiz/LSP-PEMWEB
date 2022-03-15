<?php

require'app.php';

if(isset($_COOKIE["login"])){
    if($_COOKIE["login"] == 'true'){
        $_SESSION["login"] = true;
    }
};

if(isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
};

if (isset($_POST['submit'])) {
    $_SESSION["username"] = $_POST["username"];
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
 
    $result = mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"]) {
            $_SESSION["login"] = true;

            header("location: home.php");
            exit;
        }
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
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

    <title>Login | Car Wash</title>
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
                          <div class="form-floating">
                              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                              <label for="floatingPassword">Password</label>
                          </div>
                          <div class="col-12 pt-4">
                              <div class="row">
                                  <div class="col">
                                      <div class="d-grid gap-2">
                                        <a class="btn btn-primary" href="register.php" role="button">Register</a>
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="d-grid gap-2">
                                          <button type="submit" name="submit" class="btn btn-success">Login</button>
                                      </div>
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