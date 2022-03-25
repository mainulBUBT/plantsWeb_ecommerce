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
	$plant_id = $_POST['plant_id'];
	$product_name = $_POST['product_name'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$availability = $_POST['availability'];
	$cat_id = $_POST['cat_name'];
	$details = $_POST['details'];


	$sql_update = "UPDATE products SET product_name=?,price=?,quantity=?,availability=?, cat_id=?, details=?  WHERE plant_id=?";
	$stmt = $mysqli->prepare($sql_update);
	$stmt -> bind_param('sssssss',$product_name, $price,$quantity,$availability,$cat_id,$details,$plant_id);
	if ($stmt -> execute() === TRUE) {

		?>
		<script type="text/javascript">
			alert("Record has been upadated successfully .");
			window.location = "all_products.php";
		</script>
		<?php
	} else {
		echo "Error updating record: " . $mysqli->error;
	}
}


if(isset($_POST['img_update'])){

	$product_id = $_POST['img_id'];

	 // Get image name
	$pic_1 = $_FILES['pic_1']['name'];
	$pic_2 = $_FILES['pic_2']['name'];
	$pic_3 = $_FILES['pic_3']['name'];

	 // Get text
    //$image_text = $conn -> real_escape_string($_POST['image_text']);

    // image file directory
	$target_1 = "../assets/images/".basename($pic_1);
	$target_2 = "../assets/images/".basename($pic_2);
	$target_3 = "../assets/images/".basename($pic_3);

	    // execute query
	if(move_uploaded_file($_FILES['pic_1']['tmp_name'], $target_1)&&
		move_uploaded_file($_FILES['pic_2']['tmp_name'], $target_2)&&
		move_uploaded_file($_FILES['pic_3']['tmp_name'], $target_3))
	{
		$sql = "UPDATE products SET pic_1 =?, pic_2=?, pic_3=? WHERE plant_id=?";
		$stmt =  $mysqli -> prepare($sql);
		$stmt -> bind_param('ssss',$pic_1,$pic_2,$pic_3, $product_id);

		if ($stmt -> execute() === TRUE) 
		{
			?>
			<script type="text/javascript">
				alert("Image Updated successfully .");
				window.location = "all_products.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Image Couldn't Upload .");
				window.location = "all_products.php";
			</script>
			<?php
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
			window.location = "completed_orders.php";
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
						Completed Orders List 
					</div>
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col">Price</th>
									<th scope="col">Quantity</th>
									<th scope="col">Availability</th>
									<th scope="col">Category</th>
									<th scope="col">Details</th>
									<th scope="col">Date</th>
									<th colspan="3" style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql_products = "SELECT plant_id, product_name, price, quantity, availability,details, DATE(products.date) as dates, category.cat_name as cat_name
								FROM products
								INNER JOIN category
								ON products.cat_id = category.cat_id";
								$result = $mysqli->query($sql_products);
								while($row = $result->fetch_assoc())
								{

									?>
									<tr>
										<td><?php echo $row["plant_id"]?></td>
										<td><?php echo $row["product_name"]?></td>
										<td><?php echo $row["price"]?></td>
										<td><?php echo $row["quantity"]?></td>
										<td><?php echo $row["availability"]?></td>
										<td><?php echo $row["cat_name"]?></td>
										<td><?php echo $row["details"]?></td>
										<td><?php echo $row["dates"]?></td>
										<td><button type="button" class="btn btn-warning editbtn" data-bs-toggle="modal" data-bs-target="#editmodal"><i class="fas fa-edit"></i></button></td>
										<td><button type="button" class="btn btn-danger dlt" data-bs-toggle="modal" data-bs-target="#delete"><i class="fas fa-trash"></i></button></td>
										<td><button type="button" class="btn btn-info img" data-bs-toggle="modal" data-bs-target="#images"><i class="fas fa-camera"></i></button></td>
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

		<!----------------------------------------------Product Edit Modal----------------------------->
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
								<label for="exampleInputID">Product ID</label>
								<input class="form-control" type="text" id="plant_id" name="plant_id" readonly>
							</div>
							<div class="form-group">
								<label for="exampleInputID">Product Name</label>
								<input class="form-control" type="text" id="product_name" name="product_name">
							</div>
							<div class="form-group">
								<label for="exampleInputID">Product Price</label>
								<input class="form-control" type="text" id="price" name="price">
							</div>
							<div class="form-group">
								<label for="exampleInputID">Product Quantity</label>
								<input class="form-control" type="text" id="quantity" name="quantity">
							</div>
							<div class="form-group">
								<label for="exampleInputID">Product Availability</label>
								<input class="form-control" type="text" id="availability" name="availability">
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Product Category</label>
								<select class="form-select" id="cat_name" name="cat_name">
									<?php

									$sql_cat = "SELECT * FROM `category`";
 								$resultz = $mysqli->query($sql_cat); // get the mysqli result

 								while($rowz = $resultz->fetch_assoc()){?>
 									<option value="<?php echo $rowz['cat_id']; ?>"><?php echo ucfirst($rowz['cat_name']); ?></option>
 									
 									<?php
 								}
 								?>
 							</select>
 						</div>
 						<div class="form-group">
 							<label for="exampleInputID">Product Description</label>
 							<input class="form-control" type="text" id="details" name="details">
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

 	<!----------------------------------------------Image Edit Modal----------------------------->
 	<!-- The Modal -->
 	<div class="modal" id="images">
 		<div class="modal-dialog">
 			<div class="modal-content">

 				<!-- Modal Header -->
 				<div class="modal-header">
 					<h4 class="modal-title">Update Order Infortamtion</h4>
 					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
 				</div>

 				<!-- Modal body -->
 				<div class="modal-body">
 					<form action="" method="POST" enctype="multipart/form-data">
 						<div class="form-group">
 							<label for="exampleInputID">Product ID</label>
 							<input class="form-control" type="text" id="img_id" name="img_id" readonly>
 						</div>
 						<div class="mb-3">
 							<label for="formFile" class="form-label">Upload Picture 1</label>
 							<input class="form-control" type="file" name="pic_1">
 						</div>
 						<div class="mb-3">
 							<label for="formFile" class="form-label">Upload Picture 2</label>
 							<input class="form-control" type="file" name="pic_2">
 						</div>
 						<div class="mb-3">
 							<label for="formFile" class="form-label">Upload Picture 3</label>
 							<input class="form-control" type="file" name="pic_3">
 						</div>
 					</div>

 					<!-- Modal footer -->

 					<div class="modal-footer">
 						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 						<button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="img_update">Confirm</button>
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

 				$('#plant_id').val(data[0]);
 				$('#product_name').val(data[1]);
 				$('#price').val(data[2]);
 				$('#quantity').val(data[3]);
 				$('#availability').val(data[4]);
 				$('#cat_name').val(data[5]);
 				$('#details').val(data[6]);




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

 	<script>
 		$(document).ready(function(){
 			$('#datatablesSimple').on('click','.img', function() {
 				$('#images').modal('show');
 				$tr = $(this).closest('tr');
 				var data= $tr.children("td").map(function(){
 					return $(this).text();
 				}).get();

 				console.log(data);

 				$('#img_id').val(data[0]);



 			});
 		});

 	</script>


