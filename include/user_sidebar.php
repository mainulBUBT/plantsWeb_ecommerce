<?php 
	$sql = "SELECT photo FROM merchant WHERE m_id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt -> bind_param("s", $ids);
	$stmt->execute();
	$result = $stmt->get_result();

    // output data of each row
	while($row = $result->fetch_assoc()) {
     // $profile = $row['photo'];
		?>


		<div class="col-sm-12 col-md-12 col-lg-4"><div class="list-group">
			<div class="list-group-item list-group-item-action sidemenu">
			</div>
			<div class="list-group-item list-group-item-action ">
				<?php echo "<img src='../assets/images/".$row['photo']."' width='30%' height='30%' class='img-fluid img-thumbnail mx-auto d-block' alt=''>";?><h5 class="text-center"><?php echo $NAME; ?></h5>
			</div>
			<a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='user_dashboard.php')?"sidemenu": "" ?>" href="user_dashboard.php">
				<b><i class="fas fa-tachometer-alt"></i> Dashboard</a></b>
				<a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='all_parcels.php')?"sidemenu": "" ?>" href="all_parcels.php">
					<b><i class="fas fa-clipboard-list"></i> All Parcel List</a></b>
				</a>
				<a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='parcel_req.php')?"sidemenu": "" ?>" href="parcel_req.php">
					<b><i class="fas fa-folder-plus"></i> Add Pickup Request</a></b>
				</a>
				<a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='track_parcel.php')?"sidemenu": "" ?>" href="track_parcel.php">
					<b><i class="fas fa-location-arrow"></i> Parcel Tracking</a></b>
				</a>
				<a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='user_payments.php')?"sidemenu": "" ?>" href="user_payments.php">
					<b><i class="fas fa-money-check-alt"></i> Payments</a></b>
				</a>
				<a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='user_settings.php')?"sidemenu": "" ?>" href="user_settings.php">
					<b><i class="fas fa-user-cog"></i> Settings</a></b>
				</a>
			</div></div>
			<?php
		}
		?>