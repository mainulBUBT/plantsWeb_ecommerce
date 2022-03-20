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
  print_r($row);

  ?>

  <?php include "include/header.php"; ?>
  <title>PlantsWeb | Nature is Beatuful</title>
  <style>

    .carousel-item {
      width: 100%
    }
    .carousel-indicators {
      position: absolute;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 15;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-pack: center;
      justify-content: center;
      padding-left: 0;
      margin-right: 15%;
      margin-left: 15%;
      list-style: none;
      background-color: #00000085;
    }
    .carousel-control-next-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
      background-color: #000000db;
    }
    .carousel-control-prev-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
      background-color: #000000db;
    }
    .price span {
      font-size: 18px
    }
    .cut {
      text-decoration: line-through;
      color: red
    }
    .icons i {
      font-size: 17px;
      color: green;
      margin-right: 2px
    }
    .offers i {
      color: green
    }
    .delivery i {
      color: blue
    }
    label.radio {
      cursor: pointer
    }
    label.radio input {
      position: absolute;
      top: 0;
      left: 0;
      visibility: hidden;
      pointer-events: none
    }
    label.radio span {
      padding: 2px 11px;
      margin-right: 3px;
      border: 1px solid #8f37aa;
      display: inline-block;
      color: #8f37aa;
      border-radius: 3px;
      text-transform: uppercase
    }
    label.radio input:checked+span {
      border-color: #8f37aa;
      background-color: #8f37aa;
      color: #fff
    }

  </style>
</head>

<body>
  <?php include "include/navbar.php"; ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-light">
          <div class="card-body">
            <div class="row">
              <?php
              $sql = "SELECT * FROM products WHERE plant_id=?"; // SQL with parameters
              $stmt = $mysqli->prepare($sql); 
              $stmt->bind_param("i", $id);
              $stmt->execute();
              $result = $stmt->get_result(); // get the mysqli result
              $row = $result->fetch_assoc();
              ?>
              <div class="col-md-5">
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                  <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="img-thumbnail w-100 d-block" src="assets/images/<?php echo $row['pic_1']?>" alt="Slide Image" loading="lazy"></div>
                    <div class="carousel-item"><img class="img-thumbnail w-100 d-block" src="assets/images/<?php echo $row['pic_2']?>" alt="Slide Image"></div>
                    <div class="carousel-item"><img class="img-thumbnail w-100 d-block" src="assets/images/<?php echo $row['pic_3']?>" alt="Slide Image"></div>
                  </div>
                  <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                  </ol>
                </div>
              </div>
              <div class="col-md-7">
                <h4><?php echo $row['product_name'];?></h4>
                <div class="price"><span class="mr-2">৳ <?php echo $row['price'];?></span></div>
                <div class="d-flex flex-row">
                  <div class="icons mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i></div><span>1200 ratings &amp; 564 reviews</span>
                </div>
                <div class="d-flex align-items-center mt-4 offers mb-1"><i class="fa fa-check-square-o mt-1"></i><span class="ml-1 font-weight-bold">Bank Offers</span><span class="ml-1">20% Instant Discount on SBI Credit Cards<br></span></div>
                <div class="d-flex align-items-center offers mb-1"><i class="fa fa-check-square-o mt-1"></i><span class="ml-1 font-weight-bold">Bank Offers</span><span class="ml-1">5% Unlimited Cashback on Axis Bank Credit Card<br></span></div>
                <div class="d-flex align-items-center offers mb-1"><i class="fa fa-check-square-o mt-1"></i><span class="ml-1 font-weight-bold">Bank Offers</span><span class="ml-1">Extra 5% off* with Axis Bank Buzz Credit Card<br></span></div>
                <div class="d-flex align-items-center offers"><i class="fa fa-check-square-o mt-1"></i><span class="ml-1 font-weight-bold">Bank Offers</span><span class="ml-1">20% Instant Discount on pay with&nbsp;&nbsp;google wallet<br></span></div>
                <div class="d-flex align-items-center mt-5 delivery"><i class="fa fa-map-marker"></i><span class="ml-2">Delivery by 23 Jul, Tuesday<br></span><span class="ml-2 mr-2">|<br></span><span class="ml-2 mr-2 text-success">FREE<br></span></div>
                <hr>
                <div class="d-flex align-items-center mt-2"> <label class="radio"> <input type="radio" name="ram" value="128GB" checked> <span>128GB</span> </label> <label class="radio"> <input type="radio" name="ram" value="256GB"> <span>256GB</span> </label> <label class="radio"> <input type="radio" name="ram" value="256GB"> <span>512GB</span> </label> </div>
                <div><span class="font-weight-bold">Seller:</span><span class="ml-2">Sargam Electronics</span></div>
                <div class="mt-3"><button class="btn btn-dark mr-2" type="button">ADD TO CART</button><button class="btn btn-success" type="button">BUY NOW</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 

  <?php include "include/footer.php"; ?>
</body>
</html>

