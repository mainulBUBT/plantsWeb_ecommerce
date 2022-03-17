<?php
session_start();

require_once "config/database.php";

if(isset($_SESSION['USER_NAME']))
{
  $NAME= $_SESSION["USER_NAME"];
  $id = $_SESSION["USER_ID"];
}
else {
  echo "<script> location.href='user_login.php' </script>";
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
  .card {
    border: none;
    margin-bottom: 24px;
    -webkit-box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
    box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
  }

  .avatar-xs {
    height: 2.3rem;
    width: 2.3rem;
  }
</style>
</head>

<body>
 <?php include "include/navbar.php"; ?>


 <div class="container">
  <div class="row mt-5">
    <div class="col-xl-3 col-md-6">
      <div class="card bg-pattern">
        <div class="card-body">
          <div class="float-right">
            <i class="fa fa-archive text-primary h4 ml-3"></i>
          </div>
          <h5 class="font-size-20 mt-0 pt-1">24</h5>
          <p class="text-muted mb-0">Total Projects</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-pattern">
        <div class="card-body">
          <div class="float-right">
            <i class="fa fa-th text-primary h4 ml-3"></i>
          </div>
          <h5 class="font-size-20 mt-0 pt-1">18</h5>
          <p class="text-muted mb-0">Completed Projects</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card bg-pattern">
        <div class="card-body">
          <div class="float-right">
            <i class="fa fa-file text-primary h4 ml-3"></i>
          </div>
          <h5 class="font-size-20 mt-0 pt-1">06</h5>
          <p class="text-muted mb-0">Pending Projects</p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card">
        <div class="card-body">
          <form>
            <div class="form-group mb-0">
              <label>Search</label>
              <div class="input-group mb-0">
                <input type="text" class="form-control" placeholder="Search..." aria-describedby="project-search-addon" />
                <div class="input-group-append">
                  <button class="btn btn-danger" type="button" id="project-search-addon"><i class="fa fa-search search-icon font-12"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <table id="employee_data" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Category</th>
                <th scope="col">Order Status</th>
                <th scope="col">Pay Status</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $sql = "SELECT p.product_name,p.price, c.cat_name, o.order_status, o.pay_status, o.quantity, o.amount, o.order_id
          FROM products p
          INNER JOIN category c ON p.cat_id = c.cat_id
          INNER JOIN orders o ON p.plant_id   = o.product_id
          INNER JOIN users u ON o.user_id = u.user_id
          WHERE o.user_id='$id' ORDER BY o.order_id ASC";
             $result = $mysqli -> query($sql);
             while( $row = $result -> fetch_assoc())
             {

              ?>
              <tr>
                <td><?php echo $row["product_name"]?></td>
                <td><?php echo $row["price"]?></td>
                <td><?php echo $row["quantity"]?></td>
                <td><?php echo $row["amount"]?></td>
                <td><?php echo $row["cat_name"]?></td>
                <td><?php echo $row["order_status"]?></td>
                <td><?php echo $row["pay_status"]?></td>
              </tr>
              <?php
            }
            ?>
          </table> 
          <!-- end project-list -->
        </div>
      </div>
    </div>
  </div>
  <!-- end row -->
</div>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

<?php include 'include/footer.php' ?>
<script>  
 $(document).ready(function(){  
  $('#employee_data').DataTable();  
});  
</script>  
</body>
</html>


