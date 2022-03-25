<?php 
session_start();

include '../config/database.php';

if(isset($_SESSION['ADMIN_NAME']))
{
  $NAME= $_SESSION["ADMIN_NAME"];
  $ids = $_SESSION["ADMIN_ID"];
}
else {
  echo "<script> location.href='login.php' </script>";
}


?>


<?php include 'includes/header.php';?>


<div id="layoutSidenav">

	<?php include 'includes/sidebar.php';?>
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4 mt-5">
				<div class="card mb-4">
					<div class="card-header">
						<i class="fas fa-table me-1"></i>
						Completed Orders List 
					</div>
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th scope="col">Invoice</th>
									<th scope="col">Name</th>
									<th scope="col">Unit Price</th>
									<th scope="col">Quantity</th>
									<th scope="col">Earn Amount</th>
									<th scope="col">Cat ID</th>
									<th scope="col">Order Status</th>
									<th scope="col">Pay Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql_user = "SELECT u.username as username, p.product_name as product_name, p.price as price, o.order_id as order_id, o.quantity as quantity, o.user_amount as user_amount, o.cat_id as cat_id, o.order_status as order_status, o.pay_status as pay_status
								FROM products as p
								INNER JOIN orders as o
								ON p.plant_id = o.product_id
								INNER JOIN users as u
								ON o.user_id = u.user_id";
								$result = $mysqli->query($sql_user);
								while($row = $result->fetch_assoc())
								{

									?>
									<tr>
										<td><?php echo $row["order_id"]?></td>
										<td><?php echo $row["product_name"]?></td>
										<td><?php echo $row["price"]?></td>
										<td><?php echo $row["quantity"]?></td>
										<td><?php echo $row["user_amount"]?></td>
										<td><?php echo $row["cat_id"]?></td>
										<td><?php if($row["order_status"]==1){
											echo 'Completed';
										}else{
											echo "Pending";
										}?></td>
										<td><?php if($row["pay_status"]==1){
											echo 'Done';
										}else{
											echo "Not Yet";
										}?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>




		<?php include 'includes/footer.php';?>


		