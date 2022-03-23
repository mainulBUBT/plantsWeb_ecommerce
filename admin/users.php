<?php 
include '../config/database.php';

if(isset($_POST['update'])){
	$user_id = $_POST['user_id'];
	$name = $_POST['username'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];

	$sql = "UPDATE users SET username=?,mobile=?, address=? WHERE user_id=?";
	$stmt = $mysqli->prepare($sql);
	$stmt -> bind_param('ssss',$name, $mobile, $address, $user_id);

	if ($stmt -> execute() === TRUE) {
		?>
		<script type="text/javascript">
			alert("Record has been upadated successfully .");
			window.location = "users.php";
		</script>
		<?php
	} else {
		echo "Error updating record: " . $conn->error;
	}
}


if(isset($_POST['delete']))
{
  $id = $_POST['delid'];
  echo $id;

  $sql = "DELETE FROM users WHERE user_id=?";
  $stmt = $mysqli -> prepare($sql);
  $stmt -> bind_param('s', $id);
  
  if ($stmt -> execute() === TRUE) {
    ?>
    <script type="text/javascript">
      alert("User successfully removed.");
      window.location = "users.php";
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
						All Users 
					</div>
					<div class="card-body">
						<table id="datatablesSimple">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile No.</th>
									<th>Address</th>
									<th>Joined</th>
									<th colspan="2" style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql_user = "SELECT * FROM `users`";
								$result = $mysqli->query($sql_user);
								while($row = $result->fetch_assoc())
								{

									?>
									<tr>
										<td><?php echo $row["user_id"];?></td>
										<td><?php echo $row["username"];?></td>
										<td><?php echo $row["email"];?></td>
										<td><?php echo $row["mobile"];?></td>
										<td><?php echo $row["address"];?></td>
										<td><?php echo  date('d-m-Y', strtotime($row['date']));?></td>
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
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						Do you remove the user from database?
						<form action="" method="POST">
						<div class="form-group">
								<label for="exampleInputID">User ID</label>
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
						<h4 class="modal-title">Update User Infortamtion</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form action="" method="POST">
							<div class="form-group">
								<label for="exampleInputID">User ID</label>
								<input class="form-control" type="text" id="user_id" name="user_id" readonly>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">User Email</label>
								<input class="form-control" type="text" id="email" name="email" readonly>
							</div>
							<div class="form-group">
								<label for="exampleInputName">User Name</label>
								<input class="form-control" type="text" id="username" name="username">
							</div>
							<div class="form-group">
								<label for="exampleInputMobile">User Mobile Number</label>
								<input class="form-control" type="text" id="mobile" name="mobile">
							</div>
							<div class="form-group">
								<label for="exampleInputAddress">User Address</label>
								<input class="form-control" type="text" id="address" name="address" >
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
				$('.editbtn').on('click', function() {
					$('#editmodal').modal('show');
					$tr = $(this).closest('tr');
					var data= $tr.children("td").map(function(){
						return $(this).text();
					}).get();

					console.log(data);

					$('#user_id').val(data[0]);
					$('#username').val(data[1]);
					$('#email').val(data[2]);
					$('#mobile').val(data[3]);
					$('#address').val(data[4]);



				});
			});
		</script>


		<script>
			$(document).ready(function(){
				$('.dlt').on('click', function() {
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