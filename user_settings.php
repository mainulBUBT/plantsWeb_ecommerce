<?php
//------------------------- Start the session--------------------//

session_start();
require_once "config/database.php";
if(isset($_SESSION['USER_NAME']))
{
  $NAME= $_SESSION["USER_NAME"];
  $id = $_SESSION["USER_ID"];
}


if (isset($_POST['update'])) {
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  $username = $_POST['username'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];


  if (strlen(trim($password1)) < 6) {
    ?>
    <script type="text/javascript">
      alert("password must be at least 6 charecter long.");
      window.location = "user_settings.php";
    </script>
    <?php
  }
  if (strcmp($password1, $password2) !== 0) {
   ?>
   <script type="text/javascript">
    alert("Password doesn't match.");
    window.location = "user_settings.php";
  </script>
  <?php
}
else{
  $password = md5($password1);
  $sql = "UPDATE users SET username=?, mobile=?, address=?,password=? WHERE user_id=?";
  $stmt = $mysqli->prepare($sql);
  $stmt -> bind_param('sssss',$username,$mobile,$address,$password, $id);
  if ($stmt->execute()) {
   ?>
   <script type="text/javascript">
    alert("Record updated successfully.");
    window.location = "user_settings.php";
  </script>
  <?php
}
}
}
?>


<?php include "include/header.php"; ?>

</head>

<body>
 <?php include "include/navbar.php"; ?>
 <div class="container mt-5">
  <div class="row">
    <?php
    $sql = "SELECT * FROM `users` WHERE user_id = $id";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="col-lg-4 pb-5">
      <!-- Account Sidebar-->
      <div class="author-card pb-3">
        <div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"></div>
        <div class="author-card-profile">
          <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
          </div>
          <div class="author-card-details">
            <h5 class="author-card-name text-lg"><?php echo $row['username'];?></h5><span class="author-card-position">Joined <?php echo date("d-m-Y", strtotime($row['date'])); ?></span>
          </div>
        </div>
      </div>
      <div class="wizard">
        <nav class="list-group list-group-flush">
          <a class="list-group-item" href="user_area.php">
            <div class="d-flex justify-content-between align-items-center">
              <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                <div class="d-inline-block font-weight-medium text-uppercase">Dashboard</div>
              </div>
            </div>
          </a><a class="list-group-item active" href="#"><i class="fe-icon-user text-muted"></i>Profile Settings</a>
        </nav>
      </div>
    </div>
    <!-- Profile Settings-->
    <div class="col-lg-8 pb-5">
      <form class="row" action="" method="POST">
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-fn">Username</label>
            <input class="form-control" type="text" name="username" value="<?php echo $row['username'];?>" required="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-ln">Mobile Number</label>
            <input class="form-control" type="text" name="mobile" value="<?php echo $row['mobile'];?>" required="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-email">E-mail Address</label>
            <input class="form-control" type="email" name="email" value="<?php echo $row['email'];?>" disabled="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-phone">Address</label>
            <input class="form-control" type="text" name="address" value="<?php echo $row['address'];?>" required="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-pass">New/Old Password</label>
            <input class="form-control" type="password" name="password1">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-confirm-pass">Confirm Password</label>
            <input class="form-control" type="password" name="password2">
          </div>
        </div>
        <div class="col-12">
          <hr class="mt-2 mb-3">
          <div class="d-flex flex-wrap justify-content-between align-items-center">
            <button class="btn btn-style-1 btn-primary btn-block" type="submit" name="update">Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "include/footer.php"; ?>

</body>
</html>


