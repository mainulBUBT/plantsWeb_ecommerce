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


if(isset($_POST['update'])){
	$order_id = $_POST['order_id'];
	$status = $_POST['status'];

	if ($status == "1") {

		$find = "SELECT product_id, quantity FROM orders WHERE order_id = $order_id";
		$found = $mysqli->query($find);
		$call = $found->fetch_assoc();

		$product_id=$call['product_id'];
		$quant=$call['quantity'];

		$sql = "UPDATE orders SET order_status=? WHERE order_id=?";
		$stmt = $mysqli->prepare($sql);
		$stmt -> bind_param('ss',$status, $order_id);

		if ($stmt -> execute() === TRUE) {
			$product = "UPDATE products SET quantity=quantity-$quant WHERE plant_id=$product_id";
			if($mysqli->query($product)===TRUE){
				?>
				<script type="text/javascript">
					alert("Record has been upadated successfully .");
					window.location = "pending_orders.php";
				</script>
				<?php
			}
		} else {
			echo "Error updating record: " . $mysqli->error;
		}
	}
}


if(isset($_POST['delete']))
{
	$id = $_POST['delid'];
	echo $id;

	$sql = "DELETE FROM orders WHERE order_id=?";
	$stmt = $mysqli -> prepare($sql);
	$stmt -> bind_param('s', $id);

	if ($stmt -> execute() === TRUE) {
		?>
		<script type="text/javascript">
			alert("Order successfully removed.");
			window.location = "pending_orders.php";
		</script>
		<?php
	} else {
		echo "Error updating record: " . $conn->error;
	}



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
						Pending Orders List 
					</div>
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th scope="col">Invoice</th>
									<th scope="col">Name</th>
									<th scope="col">Unit Price</th>
									<th scope="col">Quantity</th>
									<th scope="col">Total Amount</th>
									<th scope="col">Category</th>
									<th scope="col">Order Status</th>
									<th colspan="2" style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql_user = "SELECT o.order_id as order_id, p.product_name,p.price, c.cat_name, (CASE WHEN o.order_status = 1 THEN 'Completed' WHEN o.order_status = 0 THEN 'Pending' end) as order_status, o.quantity, o.amount
								FROM products p
								INNER JOIN category c ON p.cat_id = c.cat_id
								INNER JOIN orders o ON p.plant_id   = o.product_id
								INNER JOIN users u ON o.user_id = u.user_id
								WHERE o.order_status = 0 ORDER BY o.order_id";
								$result = $mysqli->query($sql_user);
								while($row = $result->fetch_assoc())
								{

									?>
									<tr>
										<td><?php echo $row["order_id"]?></td>
										<td><?php echo $row["product_name"]?></td>
										<td><?php echo $row["price"]?></td>
										<td><?php echo $row["quantity"]?></td>
										<td><?php echo $row["amount"]?></td>
										<td><?php echo $row["cat_name"]?></td>
										<td><?php echo $row["order_status"]?></td>
										<td><button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal" data-bs-target="#editmodal"><i class="fas fa-edit"></i></button></td>
										<td><button type="button" class="btn btn-danger dlt" data-bs-toggle="modal" data-bs-target="#delete"><i class="fas fa-trash"></i></button></td>

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



		<!----------------------------------------------User Delete Modal----------------------------->
		<!-- The Modal -->
		<div class="modal" id="delete">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Delete Order</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						Do you remove the order from database?
						<form action="" method="POST">
							<div class="form-group">
								<label for="exampleInputID">Order ID</label>
								<input class="form-control" type="text" id="delid" name="delid" readonly>
							</div>
						</div>

						<!-- Modal footer -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="delete">Confirm</button>
						</form>
					</div>

				</div>
			</div>
		</div>

		<!----------------------------------------------User Edit Modal----------------------------->
		<!-- The Modal -->
		<div class="modal" id="editmodal">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Update Order Infortamtion</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form action="" method="POST">
							<div class="form-group">
								<label for="exampleInputID">Invoice ID</label>
								<input class="form-control" type="text" id="order_id" name="order_id" readonly>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Select Status</label>
								<select class="form-select" id="status" name="status">
									<option value="1">Completed</option>
								</select> 
							</div>
						</div>

						<!-- Modal footer -->

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="update">Confirm</button>
						</form>
					</div>

				</div>
			</div>
		</div>


		<?php include 'includes/footer.php';?>

		
		<script>
			$(document).ready(function(){
				$('#datatablesSimple').on('click','.editbtn', function() {
					$('#editmodal').modal('show');
					$tr = $(this).closest('tr');
					var data= $tr.children("td").map(function(){
						return $(this).text();
					}).get();

					console.log(data);

					$('#order_id').val(data[0]);




				});
			});
		</script>


		<script>
			$(document).ready(function(){
				$('#datatablesSimple').on('click','.dlt', function() {
					$('#delete').modal('show');
					$tr = $(this).closest('tr');
					var data= $tr.children("td").map(function(){
						return $(this).text();
					}).get();

					console.log(data);

					$('#delid').val(data[0]);



				});
			});

		</script>

		