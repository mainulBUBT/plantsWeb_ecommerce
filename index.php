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

<title>PlantsWeb | Nature is Beatuful</title>
<style>
 body {
  margin: 0;
  padding: 0;
  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  text-align: left;
  background-color: #e8e8e8de !important;
}
#myCarousel .carousel-item .mask {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-attachment: fixed
}

#myCarousel h4 {
  font-size: 50px;
  margin-bottom: 15px;
  color: #FFF;
  line-height: 100%;
  letter-spacing: 0.5px;
  font-weight: 600
}

#myCarousel p {
  font-size: 18px;
  margin-bottom: 15px;
  color: #d5d5d5
}

#myCarousel .carousel-item a {
  background: #F4BA0C;
  font-size: 15px;
  color: #FFF;
  padding: 14px 50px;
  display: inline-block;
  border-radius: 30px;
}

#myCarousel .carousel-item a:hover {
  background: #ffffff5e;
  text-decoration: none;
  color: black;
  border: 3px solid #F4BA0C;

}
#myCarousel .carousel-item h4 {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft
}

#myCarousel .carousel-item p {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight
}

#myCarousel .carousel-item a {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp
}

#myCarousel .carousel-item .mask img {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight;
  display: block;
  height: auto;
  max-width: 100%
}

#myCarousel h4,
#myCarousel p,
#myCarousel a,
#myCarousel .carousel-item .mask img {
  -webkit-animation-duration: 1s;
  animation-duration: 1.2s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both
}

#myCarousel .container {
  max-width: 1430px
}

#myCarousel .carousel-item {
  height: 100%;
  min-height: 550px
}

#myCarousel {
  position: relative;
  z-index: 1;
  background: #3f51b5 !important;
  background-size: cover;

}

.carousel-control-next,
.carousel-control-prev {
  height: 40px;
  width: 40px;
  padding: 12px;
  top: 60% !important;
  bottom: auto;
  /*  transform: translateY(-50%);*/
  background-color: #0D0D0DAB;
}

.carousel-item {
  position: relative;
  display: none;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  width: 100%;
  transition: -webkit-transform .6s ease;
  transition: transform .6s ease;
  transition: transform .6s ease, -webkit-transform .6s ease;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-perspective: 1000px;
  perspective: 1000px
}

.carousel-fade .carousel-item {
  opacity: 0;
  -webkit-transition-duration: .6s;
  transition-duration: .6s;
  -webkit-transition-property: opacity;
  transition-property: opacity
}

.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right,
.carousel-fade .carousel-item.active {
  opacity: 1
}

.carousel-fade .carousel-item-left.active,
.carousel-fade .carousel-item-right.active {
  opacity: 0
}

.carousel-fade .carousel-item-left.active,
.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item-prev.active,
.carousel-fade .carousel-item.active {
  -webkit-transform: translateX(0);
  -ms-transform: translateX(0);
  transform: translateX(0)
}

@supports (transform-style:preserve-3d) {

  .carousel-fade .carousel-item-left.active,
  .carousel-fade .carousel-item-next,
  .carousel-fade .carousel-item-prev,
  .carousel-fade .carousel-item-prev.active,
  .carousel-fade .carousel-item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

.carousel-fade .carousel-item-left.active,
.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item-prev.active,
.carousel-fade .carousel-item.active {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0)
}

@-webkit-keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0)
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0)
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0)
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0)
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp
}

@-webkit-keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

@keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight
}

.bbb_advs {
  width: 100%;
  padding-top: 47px;
  padding-bottom: 20px;
}
.bbb_adv {
  width: 100%;
  height: 220px;
  border: solid 1px #e8e8e8;
  box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1)
}

.bbb_adv_content {
  padding-left: 30px
}

.bbb_adv_subtitle {
  font-size: 12px;
  color: rgba(0, 0, 0, 0.5);
  margin-bottom: 26px
}

.bbb_adv_title a {
  font-size: 20px;
  font-weight: bold;
  color: #000000;
}
.bbb_adv_title a:hover {
  color: #0e8ce4;
  text-decoration: none;
}
.bbb_adv_title_2 a {
  font-size: 20px;
  font-weight: bold;
  color: #000000;
}

.bbb_adv_title_2 a:hover {
  opacity: 0.8;
  text-decoration: none;
}

.bbb_adv_text {
  color: #828282;
  margin-top: 10px;
  font-size: 14px
}

.bbb_adv_image {
  width: 168px;
  height: 100%
}

.bbb_adv_image img {
  display: block;
  max-width: 100%
}
.bbb_advs .card {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0,0,0,.125);
}
.bbb_advs .card .card-header {
  padding: .75rem 1.25rem;
  margin-bottom: 0;
  background-color: #7586db !important;
  border-bottom: 1px solid #7586db;
  color: white;
  font-weight: bold;
}
</style>

</head>

<?php include "include/header.php"; ?>

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
                <h5 class="font-weight-normal text-center"><?php echo $row["product_name"]?></h5>
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


