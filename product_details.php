<?php
session_start();

require_once "config/database.php";

$id = '';

if(isset($_GET['id'])){
  $id = $_GET['id'];
 

}

$sql = "SELECT * FROM products WHERE plant_id=?"; // SQL with parameters
  $stmt = $mysqli->prepare($sql); 
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $row = $result->fetch_assoc();
  echo $row;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Responsive Navbar In Bootstrap 4</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
  <link rel="stylesheet" type="text/css" href="assets/font/all.css">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
  </style>
</head>

<body>
  <header>
    <div class="container" id="top">
      <div class="row">
        <div class="col-md-10 col-sm-12 col-xs-12">
          <ul class=" list-group list-group-horizontal">
            <li><i class='fas fa-envelope-open pr-2'></i><a href="#" class="pr-5"> Admin@mail.com</a></li>
            <li><i class='fas fa-phone pr-2'></i><a href="#" class="pr-3"> +12 365 4789</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-12 col-xs-12 text-left">
          <i class='fab fa-facebook'></i>
          <i class='fab fa-twitter-square'></i>
          <i class='fab fa-google-plus-square'></i>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark ownbg">
      <a class="navbar-brand text-white pl-5" href="#"><img src="https://w3hubs.com/wp-content/themes/wpex-magtastico/images/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product_details.php/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class='fa fa-shopping-cart'></i><span class="badge badge-pill badge-warning ml-1"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else{ echo '0';} ?></span></a>
          </li>     
        </ul>
      </div>  
    </nav>
  </header>

  <div class="container">
    <div class="col-lg-10 border p-3 main-section bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
            Product Detail Design Using Bootstrap 4.0
        </div>
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                <img src="http://nicesnippets.com/demo/pd-image1.jpg" class="border p-3">
                <span class="sub-img">
                    <img src="http://nicesnippets.com/demo/pd-image2.jpg" class="border p-2">
                    <img src="http://nicesnippets.com/demo/pd-image3.jpg" class="border p-2">
                    <img src="http://nicesnippets.com/demo/pd-image4.jpg" class="border p-2">
                </span>
            </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>Who What Wear</span>
                            <p class="m-0 p-0">Women's Velvet Dress</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">$30</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>Product Detail</h5>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris.</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Tag : </strong><a href="">Woman</a><a href="">,Man</a></p>
                        </div>
                        <div class="col-lg-12">
                            <h6>Quantity :</h6>
                            <input type="number" class="form-control text-center w-100" value="1">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                                    <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-success w-100">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-------------First JQuery then Popper then Bootstrap then Fontawesome ------------->

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>

</body>
</html>


