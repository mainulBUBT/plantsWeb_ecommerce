<?php
session_start();

require_once "config/database.php";


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

    $sql = "SELECT user_id, username, email, password FROM `users` WHERE users.email = ?";

    if($stmt = $mysqli->prepare($sql)) {
      $stmt->bind_param("s", $param_email);
      $param_email = $email;

      if($stmt->execute()) {
        $stmt->store_result();

        if($stmt->num_rows == 1) {
          $stmt->bind_result($m_id, $name, $email, $pass);

          if($stmt->fetch()) {
            if(md5($password)==$pass) {

              $_SESSION['USER_ID']  = $m_id; 
              $_SESSION['USER_NAME'] = $name;
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
  $mysqli->close();

}


?>

<?php include "include/header.php"; ?>

<style>
  body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #e8e8e8de !important;
  }
  .account-block {
    padding: 0;
    background-image: url(assets/images/register.png);
    background-repeat: no-repeat;
    background-size: auto;
    height: 100%;
    position: relative;
    background-position-y: center;
  }
  .account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.03);
  }
  .account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
  }
  .text-theme {
    color: #5369f8 !important;
  }
  .btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
  }
</style>
</head>

<body>
 <?php include "include/navbar.php"; ?>

 <div id="main-wrapper" class="container">
  <div class="row justify-content-center mt-3 mb-3">
    <div class="col-xl-10">
      <div class="card border-0">
        <div class="card-body p-0">
          <div class="row no-gutters">
            <div class="col-lg-6">
              <div class="p-5">
                <div class="mb-3">
                  <h3 class="h4 font-weight-bold text-theme">Login</h3>
                </div>
                <!-- <h6 class="h5 mb-0">Just Do Register.</h6>
                  <p class="text-muted mt-2 mb-5">If You Really Want To Know, Look In The Register.</p> -->
                  <?php
                  if($msg != "")
                  {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <?php
                      echo $msg;
                      ?>
                    </div>
                    <?php
                  }
                  ?>
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" />
                    </div>
                    <div class="form-group mb-5">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" />
                    </div>
                    <button type="submit" class="btn btn-theme btn-block" name="register">Login</button>
                  </form>
                </div>
                <p class="text-muted text-center mb-2">New? Create an account-> <a href="user_register.php" class="text-primary ml-1">Register</a></p>
              </div>
              <div class="col-lg-6 d-none d-lg-inline-block">
                <div class="account-block rounded-right">
                  <div class="overlay rounded-right"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->

        <!-- end row -->
      </div>
      <!-- end col -->
    </div>
    <!-- Row -->
  </div>


<?php include "include/footer.php"; ?>
</body>
</html>


