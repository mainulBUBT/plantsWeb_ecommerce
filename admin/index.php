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
			<div class="container-fluid px-4">
				<h1 class="mt-4">Dashboard</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				
				<div class="row">
					<?php
					$sql_board = "SELECT (SELECT COUNT(order_id) FROM orders) as total,(SELECT COUNT(order_id) FROM orders WHERE order_status='1') as completed,(SELECT COUNT(order_id) FROM orders WHERE order_status='0') as pending, (SELECT SUM(user_amount) FROM orders WHERE pay_status='1' and order_status='1') as paid, (SELECT COUNT(user_id) FROM users) as users";

					$results = $mysqli -> query($sql_board);
					while( $rows = $results -> fetch_assoc())
					{

						?>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-primary text-white mb-4">
								<div class="card-body"><b><?php echo $rows["total"]?></b> Total Order Request</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-warning text-white mb-4">
								<div class="card-body"><b><?php echo $rows["pending"]?></b> Pending Orders</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="pending_orders.php">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-success text-white mb-4">
								<div class="card-body"><b><?php echo $rows["completed"]?></b> Completed Orders</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="completed_orders.php">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-danger text-white mb-4">
								<div class="card-body"><b><?php echo $rows["paid"]?></b>৳ Revenue</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-info text-white mb-4">
								<div class="card-body"><b><?php echo $rows["users"]?></b> Active Users</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="users.php">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<?php
					}
						?>
					</div>
					<div class="row">
						<div class="col-xl-6">
							<div class="card mb-4">
								<div class="card-header">
									<i class="fas fa-chart-area me-1"></i>
									Area Chart Example
								</div>
								<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="card mb-4">
								<div class="card-header">
									<i class="fas fa-chart-bar me-1"></i>
									Bar Chart Example
								</div>
								<div class="card-body"><?php include 'includes/chart_bar.php'?></canvas></div>
							</div>
						</div>
					</div>
				</div>
			</main>



			<?php include 'includes/footer.php';?>