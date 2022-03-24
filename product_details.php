<?php
session_start();

require_once "config/database.php";

$id = '';

if(isset($_GET['id'])){
  $id = $_GET['id'];


}

// $sql = "SELECT * FROM products WHERE plant_id=?"; // SQL with parameters
// $stmt = $mysqli->prepare($sql); 
// $stmt->bind_param("i", $id);
// $stmt->execute();
//   $result = $stmt->get_result(); // get the mysqli result
//   $row = $result->fetch_assoc();


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
                <hr>
                <div class="d-flex flex-row">
                  <h4>Description</h4>
                </div>
                <?php echo $row['details']?>
                <div class="d-flex align-items-center mt-5 delivery"><i class="fa fa-clock-o"></i>
                  <span class="ml-2"><?php echo date("d-m-Y", strtotime($row['date']));?><br></span><span class="ml-2 mr-2">|<br></span><span class="ml-2 mr-2 text-success">CASH ON DELIVERY<br></span>|<br></span><span class="ml-2 mr-2 text-success"><?php if($row['availability']=='1'){
                    echo "In Stock";
                  }else{
                    echo "Stock Out";
                  }?><br></span></div>
                  <hr>
                  <form action="" method="POST">
                    <div class="mt-3"><button class="btn btn-dark mr-2 btn-block" type="submit" name="add-cart" value="<?php echo $row["plant_id"]?>">ADD TO CART</button>
                    </form>
                    </div>
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

