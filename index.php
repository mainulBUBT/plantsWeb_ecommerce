<?php
session_start();
// session_destroy();

require_once "config/database.php";

if(isset($_POST['add-cart'])){

  $id = $_POST['add-cart'];
  $sql = "SELECT * FROM products WHERE plant_id='$id'"; // SQL with parameters
  $result = $mysqli->query($sql); // get the mysqli result
  $row = $result->fetch_assoc();
  $quantity = "1";
  if (isset($_SESSION['cart'][$id])) {
   
    echo 'added';
  }
  else{
    $_SESSION['cart'][$id] = array(
      'id' => $row['plant_id'],
      'name' => $row['product_name'],
      'price' => $row['price'],
      'quantity' => $quantity,
      'img' => $row['pic_1'],
      'cat' => $row['cat_id'],
    );
  }


}
echo "<pre>";
  print_r($_SESSION['cart']);
echo "</pre>";

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
            <a class="nav-link" href="product_details.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class='fa fa-shopping-cart'></i><span class="badge badge-pill badge-warning ml-1"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else{ echo '0';} ?></span></a>
          </li>     
        </ul>
      </div>  
    </nav>
  </header>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row mb-md-2">
        <?php
        $sql = "SELECT * FROM `products`ORDER BY plant_id DESC";
        $result = $mysqli -> query($sql);
        while( $row = $result -> fetch_assoc())
        {
          ?>

          <div class="col-md-3">
            <div class="card shadow-sm border-light mb-4">
              <a href="product_details.php?id=<?php echo $row["plant_id"]?>" class="position-relative">
               <img src='assets/images/<?php echo $row['pic_1']?>' height='220px' class='card-img-top' alt='image'> </a>
               <div class="card-body">
                <a href="#">
                  <h5 class="font-weight-normal text-center"><?php echo $row["product_name"]?></h5>
                </a>
                <!--  <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Los-Angeles, Hollywood, USA</span></div> -->
                
                <h3 class="text-center">
                  $<?php echo $row["price"]?>
                </h3>

                <form action="index.php" method="POST">
                  <div class="d-flex justify-content-between">
                   <button type="submit" class="btn btn-primary btn-block" name="add-cart" value="<?php echo $row["plant_id"]?>"><i class='fa fa-shopping-cart'></i> Add to cart</button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       <?php } ?>
     </div>


     <div class="row py-4 mt-md-5">
      <div class="col text-center">
        <a href="#" class="btn btn-lg shadow btn-primary mt-1">Browse all</a>
      </div>
    </div>
  </div>
</section>



<!-------------First JQuery then Popper then Bootstrap then Fontawesome ------------->

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>

</body>
</html>


