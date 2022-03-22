<?php 
include '../config/database.php';

// $query = $mysqli->query("SELECT COUNT(order_id) as orderz, MONTHNAME(date)as month FROM `orders`");

// foreach($query as $data)
// {
//   $month[] = $data['month'];
//   $orderz[] = $data['orderz'];
// }

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
									<td><i class="fas fa-edit"></i></td>
									<td><i class="fas fa-trash"></i></td>
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