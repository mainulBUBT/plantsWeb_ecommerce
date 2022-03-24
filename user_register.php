<?php
session_start();

require_once "config/database.php";

$name = $email = $password = $mobile= $password2 = $address = "";
$msg= "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

        // VALIDATE NAME, EMAIL, PASSWORD
  if(empty($_POST['name'])) {
    $msg = "please enter an username";
  } else {
    $name = $_POST['name'];
  }

  if(empty($_POST['email'])) {
    $msg = "please enter an email";
  } else {
    $email = $_POST['email'];
  }

  if(empty($_POST['password'])) {
    $msg = "Please enter a password";
  } else if(strlen(trim($_POST['password'])) < 6) {
    $msg = "password must be at least 6 charecter long";
  } else {
    $password = trim($_POST['password']);
  }
  if(empty($_POST['password2'])) {
    $msg = "please re-enter password";
  } else {
    $password2 = trim($_POST['password2']);
  }
  if (strcmp($password, $password2) !== 0) {
    $msg = "password doesn't match";
  }
  else{
    $password = trim($_POST['password']);
  }
  if (empty($_POST['mobile'])) {
    $msg = "Please enter a mobile number";
  }
  else{
    $mobile = trim($_POST['mobile']);
  }
  if (empty($_POST['address'])) {
    $msg = "Please enter a address";
  }
  else{
    $address = trim($_POST['address']);
  }


        // INSERT NEW USER TO DATABASE
  if(empty($msg)) {

    $sql = "SELECT * FROM `users` WHERE email = '$email' ";
    $result = $mysqli->query($sql);
    if($result->num_rows > 0) {
      $msg = "Email already exists. Try new email to register";
    }
    else{

      $query = "INSERT INTO `users` (username, email, mobile, password, address) VALUES (?, ?, ?, ?, ?)";
      if($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("sssss", $param_name, $param_email, $param_mobile, $param_password, $param_address);
        $param_name = $name;
        $param_email = $email;
        $param_mobile = $mobile;
        $param_password = md5($password);
        $param_address = $address;


        if($stmt->execute()) {
          header('Location: user_login.php');
        } else {
          $msg = "Something went wrong please try again.";
        }

                //close statement
        $stmt->close();
      }

    }

  }


}

?>

<?php include "include/header.php"; ?>

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
                  <h3 class="h4 font-weight-bold text-theme">Register</h3>
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
                  <form method="POST" action="">
                    <div class="form-group">
                      <label for="yourName">Username</label>
                      <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <input type="text" class="form-control" name="mobile" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control" name="address" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" />
                    </div>
                    <div class="form-group mb-5">
                      <label for="exampleInputPassword1">Re-Password</label>
                      <input type="password" class="form-control" name="password2" />
                    </div>
                    <button type="submit" class="btn btn-theme btn-block">Register</button>
                  </form>
                </div>
                <p class="text-muted text-center mb-2">Already have an account? <a href="user_login.php" class="text-primary ml-1">login</a></p>
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


