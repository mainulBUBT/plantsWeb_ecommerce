<?php
session_start();
require_once "config/database.php";
// session_destroy();
$fees = 0;
if(isset($_SESSION['USER_NAME']))
{
  $NAME= $_SESSION["USER_NAME"];
  $ids = $_SESSION["USER_ID"];
}
else {
  echo "<script> location.href='user_login.php' </script>";
}

if(isset($_SESSION['cart'])){ 
 if(count($_SESSION['cart'])>0){
 }
 else{
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cart is empty. Add some to cart');
    window.location.href='index.php';
    </script>");
}
}else{ echo '0';} 
// session_destroy();


if(isset($_POST['update'])){
  $quantity = $_POST['option'];
  $id = $_POST['update'];

  $sql = "SELECT * FROM products WHERE plant_id='$id'";
  $result = $mysqli->query($sql); // get the mysqli result
  $row = $result->fetch_assoc();
  echo $quantity;

  $_SESSION['cart'][$id] = array(
    'id' => $row['plant_id'],
    'name' => $row['product_name'],
    'price' => $row['price'],
    'quantity' => $quantity,
    'img' => $row['pic_1'],
    'cat' => $row['cat_id'],
  );
}

if(isset($_GET['id']))
{
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);
  header("Location: cart.php");
}
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";

if(isset($_POST['order'])){
  $amount = $_POST['amount'];

  foreach($_SESSION['cart'] as $k => $item){
    $query = "INSERT INTO `orders` (`user_id`, `cat_id`, `product_id`,`quantity`, `amount`, `user_amount`) VALUES (?, ?, ?, ?, ?, ?)";
    if($stmt = $mysqli->prepare($query)) {
      $stmt->bind_param("ssssss", $param_user_id, $param_cat_id, $param_product_id, $param_quantity, $param_amount, $param_uamount);
      $param_user_id = $_SESSION['USER_ID'];
      $param_cat_id = $item['cat'];
      $param_product_id = $item['id'];
      $param_quantity = $item['quantity'];
      $param_amount = $amount;
      $param_uamount = $amount-60;



      if($stmt->execute()) {
        unset($_SESSION['cart'][$param_product_id]);
        header('Location: user_login.php');
      } else {
        $msg = "Something went wrong please try again.";
      }

                //close statement
      $stmt->close();
    }
  }
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
  .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.40rem
  }

  .img-sm {
    width: 80px;
    height: 80px
  }

  .itemside .info {
    padding-left: 15px;
    padding-right: 7px
  }

  .table-shopping-cart .price-wrap {
    line-height: 1.2
  }

  .table-shopping-cart .price {
    font-weight: bold;
    margin-right: 5px;
    display: block
  }

  .text-muted {
    color: #969696 !important
  }

  a {
    text-decoration: none !important
  }

  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: 0px
  }

  .itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
  }

  .dlist-align {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex
  }

  [class*="dlist-"] {
    margin-bottom: 5px
  }

  .coupon {
    border-radius: 1px
  }

  .price {
    font-weight: 600;
    color: #212529
  }

  .btn.btn-out {
    outline: 1px solid #fff;
    outline-offset: -5px
  }

  .btn-main {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 10px 19px;
    cursor: pointer;
    color: #fff;
    width: 100%
  }

  .btn-light {
    color: #ffffff;
    background-color: #F44336;
    border-color: #f8f9fa;
    font-size: 12px
  }

  .btn-light:hover {
    color: #ffffff;
    background-color: #F44336;
    border-color: #F44336
  }

  .btn-apply {
    font-size: 11px
  }
</style>
</head>

<body>
 <?php include "include/navbar.php"; ?>

 <div class="container">
  <div class="row mt-5">
    <aside class="col-lg-9">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-borderless table-shopping-cart">
            <thead class="text-muted">
              <tr class="small text-uppercase">
                <th scope="col">Product</th>
                <th scope="col" width="120">Quantity</th>
                <th scope="col" width="120">Price(Unit)</th>
                <th scope="col" class="text-right d-none d-md-block" width="200"></th>
              </tr>
            </thead>
            <tbody>
             <?php $total =0; $value=""; ?>
             <?php if(isset($_SESSION['cart'])) :?>
              <?php foreach($_SESSION['cart'] as $k => $item) :?>
                <form action="" method="POST"> 
                  <tr>
                    <td>
                      <figure class="itemside align-items-center">
                        <div class="aside"><img src="assets/images/<?php echo $item['img']; ?>" class="img-sm"></div>
                        <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true"><?php echo $item['name']; ?></a>
                          <?php 
                          $cat_id = $item["cat"];
                          $sql = "SELECT * FROM `category` WHERE cat_id='$cat_id'";
                          $result = $mysqli->query($sql); // get the mysqli result
                          $row = $result->fetch_assoc();
                          ?>
                          <p class="text-muted small">Category: <?php echo $row['cat_name']; ?></p>
                        </figcaption>
                      </figure>
                    </td>
                    <td> 
                      <?php 
                      $id = $item["id"];
                      $sql = "SELECT * FROM products WHERE plant_id='$id'";
                      $result = $mysqli->query($sql); // get the mysqli result
                      $rows = $result->fetch_assoc();
                      ?>
                      <select class="form-control" name="option" id="selectme">
                        <?php
                        $i = "";
                        for($i=1; $i<=$rows['quantity']; $i++){?>
                          <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                          <?php
                        }
                        ?>
                      </select> 
                    </td>
                    <td>
                      <div class="price-wrap"> <var class="price"><?php echo $item['price']; ?> $</var></div>
                    </td>
                    <td class="text-right d-none d-md-block">
                      <button class="btn btn-light" type="submit" name="update" value="<?php echo $item['id']; ?>"><i class="fa fa-refresh"></i> Update</button>
                      <a class="btn btn-light" href="cart.php?id=<?php echo $item['id']; ?>"><i class="fa fa-trash-o"></i> Remove</a>
                    </td>
                  </tr>
                </form>
                <?php $total += $item['quantity']*$item['price'];
                ?>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </aside>
  <aside class="col-lg-3">
    <div class="card mb-3">
      <div class="card-body">
        <form>
          <div class="form-group"> <label>Have coupon?</label>
            <div class="input-group"> <input type="text" class="form-control coupon" name="" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-body">

        <dl class="dlist-align">
          <dt>Total price:</dt>
          <dd class="text-right ml-3">$<?php echo $total; ?></dd>
        </dl>
        <dl class="dlist-align">
          <dt>Discount:</dt>
          <dd class="text-right text-danger ml-3">- $00.00</dd>
        </dl>
        <dl class="dlist-align">
          <dt>Delivery Fee:</dt>
          <?php if(isset($_SESSION['cart'])){ 
            if(count($_SESSION['cart'])>0)
              {?>
                <dd class="text-right ml-3"> $<?php $fees=60; echo $fees; ?></dd>
                <?php
              }
              else
                {?>
                  <dd class="text-right ml-3"> $<?php $fees=0; echo $fees; ?></dd>
                  <?php
                }
              }?> 
            </dl>
            <dl class="dlist-align">
              <dt>Total:</dt>
              <dd class="text-right text-dark b ml-3"><strong>$<?php echo $total+$fees; ?></strong></dd>
            </dl>
            <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true" data-toggle="modal" data-target="#cartModal"> Checkout Order </a> <a href="index.php" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
          </div>
        </div>
      </aside>
    </div>
  </div>


  <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h5 class="modal-title" id="exampleModalLabel">
            Your Shopping Cart
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-image">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $totals =0; $value="";?>
              <?php if(isset($_SESSION['cart'])) :?>
                <?php foreach($_SESSION['cart'] as $k => $item) :?>
                  <tr>
                    <td class="w-25">
                      <img src="assets/images/<?php echo $item['img']; ?>"  alt="Sheep" height = "50px">
                    </td>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price'];?></td>
                    <td class="qty"><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo $item['price']*$item['quantity']; ?></td>
                  </tr>
                  <?php $totals += $item['quantity']*$item['price'];
                  ?>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table> 
          <div class="d-flex justify-content-end">
            <h5>Total: <span class="price text-success">$<?php echo $totals+$fees; ?> (60$ Charge)</span></h5>
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="" method="POST">
            <input type="hidden" name="amount" value="<?php echo $totals+$fees; ?>">
            <button type="submit" class="btn btn-success" name="order">Place Order</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include 'include/footer.php' ?>


</body>
</html>


