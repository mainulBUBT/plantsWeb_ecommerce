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

</head>

<?php include "include/header.php"; ?>

<body>
 <?php include "include/navbar.php"; ?>

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
</body>
</html>


