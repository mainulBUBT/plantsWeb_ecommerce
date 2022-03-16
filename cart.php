<?php
session_start();
// session_destroy();
require_once "config/database.php";

if(isset($_POST['update'])){
  $quantity = $_POST['option'];
  $id = $_POST['update'];

  if(isset($_SESSION['cart']))
  {
    foreach($_SESSION['cart'] as $k => $item)
    {
      $_SESSION['cart'][$id] = array(
        'id' => $item['id'],
        'name' => $item['name'],
        'price' => $item['price'],
        'quantity' => $quantity,
        'img' => $item['img'],
        'cat' => $item['cat'],
      );
    }
  }
}
else if(isset($_POST['remove']))
{
  $id = $_POST['remove'];
  unset($_SESSION['cart'][$id]);
}
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";


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
                <form action="" method="POST">
                  <?php foreach($_SESSION['cart'] as $k => $item) :?>

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
                    <td class="text-right d-none d-md-block"> <button class="btn btn-light" type="submit" name="update" value="<?php echo $item['id']; ?>"><i class="fa fa-refresh"></i> Update</button> <button class="btn btn-light" type="submit" name="remove" value="<?php echo $item['id']; ?>"><i class="fa fa-trash-o"></i> Remove</button></td>
                  </tr>
                  <?php $total += $item['quantity']*$item['price'];
                  ?>
                <?php endforeach ?>
              </form>

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
            <dd class="text-right ml-3"> $60.00</dd>
          </dl>
          <dl class="dlist-align">
            <dt>Total:</dt>
            <dd class="text-right text-dark b ml-3"><strong>$<?php echo $total+60; ?></strong></dd>
          </dl>
          <hr> <a href="billing.php" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Checkout Order </a> <a href="index.php" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
    </div>
  </div>
</aside>
</div>
</div>

<!-------------First JQuery then Popper then Bootstrap then Fontawesome ------------->

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>


</body>
</html>


