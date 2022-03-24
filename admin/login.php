<?php
//------------------------- Start the session--------------------//

session_start();
require_once "../config/database.php";

if(isset($_SESSION['ADMIN_NAME'])) {
  header("Location: index.php");
  exit;
}


$email = $password = "";
$msg = "";


//------------------------- VALIDATE POST REQUEST--------------------//
if($_SERVER["REQUEST_METHOD"] == "POST") {

  //------------------------- VALIDATE EMAIL--------------------//
  if(empty(trim($_POST['email']))) {
    $msg = "please enter your email address.";
  } else {
    $email = trim($_POST['email']);
  }

   //------------------------- VALIDATE PASSWORD--------------------//
  if(empty(trim($_POST['password']))) {
    $msg = "please enter your password.";
  } else {
    $password = trim($_POST['password']);
  }

  if(empty($msg)) {

    $sql = "SELECT admin_id, admin_name, email, admin_pass FROM `admin_table` WHERE admin_table.email = ?";

    if($stmt = $mysqli->prepare($sql)) {
      $stmt->bind_param("s", $param_email);
      $param_email = $email;

      if($stmt->execute()) {
        $stmt->store_result();

        if($stmt->num_rows == 1) {
          $stmt->bind_result($m_id, $name, $email, $pass);

          if($stmt->fetch()) {
            if(md5($password)==$pass) {

              $_SESSION['ADMIN_ID']  = $a_id; 
              $_SESSION['ADMIN_NAME'] = $name;
              print_r($pass); 

              header("Location: index.php");

            } else {
              $msg = "Incorrect password";
            }
          }
        } else {
          $msg = "Invalid email address, please try again.";
        }
      } else {
        $msg = "something went wrong, please try again.";
      }
                //close statement
      $stmt->close();

    }



  }

        //close database
  // $mysqli->close();

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login - SB Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                <div class="card-body">
                  <?php
                  if($msg != "")
                  {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <?php
                      echo $msg;
                      ?>
                    </div>
                    <?php
                  }
                  ?>
                  <form action="" method="POST">
                    <div class="form-floating mb-3">
                      <input class="form-control" name="email" type="email" placeholder="name@example.com" />
                      <label for="inputEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" name="password" type="password" placeholder="Password" />
                      <label for="inputPassword">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <button type="submit" class="btn btn-primary" name="submit">Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
