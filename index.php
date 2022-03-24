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
// echo "<pre>";
//   print_r($_SESSION['cart']);
// echo "</pre>";

?>
<?php include "include/header.php"; ?>
<title>PlantsWeb | Nature is Beatuful</title>
<style>
 
</style>

</head>


<body>
 <?php include "include/navbar.php"; ?>
 <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="mask flex-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2">
              <h4>SUMMER PLANTS</h4>
              <p>This has many features that are simply awesome. The phone comes with a 3.50-inch display with a resolution of 320x480 pixels.</p> <br> <a href="#">BUY NOW</a>
            </div>
            <div class="col-md-5 col-12 order-md-2 order-1"><img src="assets/images/seed.png" class="mx-auto" alt="slide"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="mask flex-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-12 order-md-1 order-2">
              <h4>HP Pavillion</h4>
              <p>This has many features that are simply awesome.The phone comes with a 3.50-inch display with a resolution of 320x480 pixels.</p> <br> <a href="#">BUY NOW</a>
            </div>
            <div class="col-md-5 col-12 order-md-2 order-1"><img src="assets/images/seed_2.png" class="mx-auto" alt="slide"></div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>


<div class="bbb_advs">
  <div class="container-fluid">
    <div class="card bg-light text-dark">
      <div class="card-header">TOP CATEGORIES</div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4 bbb_adv_col">
            <!-- bbb_adv Item -->
            <div class="bbb_adv d-flex flex-row align-items-center justify-content-start">
              <div class="bbb_adv_content">
                <div class="bbb_adv_title"><a href="#">Plants</a></div>
                <div class="bbb_adv_text">Get all HousePlants or Raw Plants local price</div>
              </div>
              <div class="ml-auto">
                <div class="bbb_adv_image"><img src="assets/images/cat_1.png" alt=""></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 bbb_adv_col">
            <!-- bbb_adv Item -->
            <div class="bbb_adv d-flex flex-row align-items-center justify-content-start">
              <div class="bbb_adv_content">
                <div class="bbb_adv_title_2"><a href="#">Flowers</a></div>
                <div class="bbb_adv_text">All new headphones with upto 45% sale.</div>
              </div>
              <div class="ml-auto">
                <div class="bbb_adv_image"><img src="assets/images/cat_2.png" alt=""></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 bbb_adv_col">
            <!-- bbb_adv Item -->
            <div class="bbb_adv d-flex flex-row align-items-center justify-content-start">
              <div class="bbb_adv_content">
                <div class="bbb_adv_title"><a href="#">Fertilizer</a></div>
                <div class="bbb_adv_text">2018 trendy product here on BBBootstrap.com</div>
              </div>
              <div class="ml-auto">
                <div class="bbb_adv_image"><img src="assets/images/cat_3.png" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

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
                <h5 class="font-weight-normal text-center text-title"><?php echo $row["product_name"]?></h5>
              </a>
              <!--  <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Los-Angeles, Hollywood, USA</span></div> -->

              <h3 class="text-center">
                $<?php echo $row["price"];?>
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



<?php include "include/footer.php"; ?>
<script>  
  $(document).ready(function(){

    $('#myCarousel').carousel({
      interval: 3000,
    })

  });
</script>
</body>
</html>


