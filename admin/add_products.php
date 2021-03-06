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

if(isset($_POST['submit']))
{
   // Initialize message variable

	$name = $_POST['p_name'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$availability = $_POST['availability'];
	$category = $_POST['category'];
	$details = $_POST['details'];


  // If upload button is clicked ...

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
		
		$query = "INSERT INTO `products`(`product_name`, `details`, `price`, `quantity`, `availability`, `pic_1`, `pic_2`, `pic_3`, `cat_id`) VALUES (?, ?, ?, ?, ?,?,?,?,?)";
		if($stmt = $mysqli->prepare($query)) {
			$stmt->bind_param("sssssssss", $param_name, $param_details, $param_price, $param_quantity, $param_availability, $param_pic1,$param_pic2,$param_pic3,$param_cat);
			$param_name = $name;
			$param_details = $details;
			$param_price = $price;
			$param_quantity = $quantity;
			$param_availability =$availability;
			$param_pic1 = $pic_1;
			$param_pic2 = $pic_2;
			$param_pic3 = $pic_3;
			$param_cat = $category;
			if ($stmt -> execute()) {
				?>
				<script type="text/javascript">
					alert("Product Uploaded successfully .");
					window.location = "add_products.php";
				</script>
				<?php
			}

		}


	}
}
?>






<title>Add new product</title>

<?php include 'includes/header.php';?>


<div id="layoutSidenav">

	<?php include 'includes/sidebar.php';?>
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">

				<div class="card mb-4 mt-3">
					<div class="card-header">
						<i class="fas fa-table me-1"></i>
						Add New Product 
					</div>
					<div class="card-body">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="name" class="form-label">Product Name:</label>
								<input type="text" class="form-control" placeholder="Enter Product Name" name="p_name">
							</div>
							<div class="mb-3">
								<label for="price" class="form-label">Product Price:</label>
								<input type="text" class="form-control" placeholder="Enter Price" name="price">
							</div>
							<div class="mb-3">
								<label for="quantity" class="form-label">Product Quantity:</label>
								<input type="text" class="form-control" placeholder="Enter Quantity" name="quantity">
							</div>
							<div class="mb-3">
								<label for="exampleFormControlSelect1">Select Availability</label>
								<select class="form-select" id="status" name="availability">
									<option value="0">Stock Out</option>
									<option value="1">In Stock</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="exampleFormControlSelect1">Select Category</label>
								<select class="form-select" id="status" name="category">
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
 						<div class="mb-3">
 							<label for="exampleFormControlTextarea1" class="form-label">Short Description</label>
 							<textarea class="form-control" name="details" rows="3"></textarea>
 						</div>
 						<div class="d-grid gap-2">
 							<button type="submit" class="btn btn-primary" name="submit">Submit</button>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</main>




 	<?php include 'includes/footer.php';?>


