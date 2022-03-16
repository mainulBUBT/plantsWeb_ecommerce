<?php 

$sql = "SELECT photo FROM admin_table WHERE aid = ?";
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
   <a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='admin_dashboard.php')?"sidemenu": "" ?>" href="admin_dashboard.php">
    <b><i class="fas fa-tachometer-alt"></i> Dashboard</a></b>
  </a>
  <div class="dropdown dropright">
    <a class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='pending_parcels.php' || basename($_SERVER['PHP_SELF'])=='pickedup_parcels.php' || basename($_SERVER['PHP_SELF'])=='delivered_parcels.php' || basename($_SERVER['PHP_SELF'])=='transit_parcels.php' || basename($_SERVER['PHP_SELF'])=='return_parcels.php')?"sidemenu": "" ?> dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><b><i class="fas fa-box"></i> Parcels</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="pending_parcels.php">Pending</a>
      <a class="dropdown-item" href="pickedup_parcels.php">Picked up</a>
      <a class="dropdown-item" href="delivered_parcels.php">Delivered</a>
      <a class="dropdown-item" href="transit_parcels.php">In transit</a>
      <a class="dropdown-item" href="return_parcels.php">Return to Hub</a>
    </div>
  </div>
  <div class="dropdown dropright">
    <a class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='marchants_details.php' || basename($_SERVER['PHP_SELF'])=='employee_details.php')?"sidemenu": "" ?> dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><b><i class="fas fa-users"></i> Users</a></b>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="merchants_details.php">Merchant</a>
      <a class="dropdown-item" href="employee_details.php">Delivery Man</a>
    </div>
  </div>
  <a type="button" class="list-group-item list-group-item-action" href="parcel_track.php">
    <b><i class="fas fa-location-arrow"></i> Parcel Tracking</a></b>
  </a>
  <a type="button" class="list-group-item list-group-item-action" href="admin_payments.php">
    <b><i class="fas fa-money-check-alt"></i> Payments</a></b>
  </a>
  <div class="dropdown dropright">
    <a class="list-group-item list-group-item-action dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><b><i class="fas fa-table"></i> Reports</b>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="bdw_reports.php">Between Dates</a>
      <a class="dropdown-item" href="reqcounts_reports.php">Request Counts</a>
      <a class="dropdown-item" href="sales_reports.php">Demanding Charges</a>
    </div>
  </div>
  <a type="button" class="list-group-item list-group-item-action" href="admin_settings.php">
    <b><i class="fas fa-user-cog"></i> Settings</a></b>
  </a>
</div></div>
<?php
}
?>