 <div class="col-sm-12 col-md-12 col-lg-4"><div class="list-group">
  <div class="list-group-item list-group-item-action sidemenu">
  </div>
  <div class="list-group-item list-group-item-action ">
    <img src="../assets/images/profile.png" width="35%" height="35%" class="img-fluid rounded-circle mx-auto d-block" alt=""><h5 class="text-center bold"><?php echo $SNAME; ?></h5>
  </div>
  <a type="button"  class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='staff_space.php')?"sidemenu": "" ?>" href="staff_space.php">
    <b><i class="fas fa-wallet"></i> Space Desk</a></b>
  <a type="button" class="list-group-item list-group-item-action <?php echo (basename($_SERVER['PHP_SELF'])=='staff_work.php')?"sidemenu": "" ?>" href="staff_work.php">
    <b><i class="fas fa-clipboard-list"></i> Work Management</a></b>
  <a type="button" class="list-group-item list-group-item-action" href="#">
    <b><i class="fas fa-user-cog"></i> Settings</a></b>
  </a>
</div></div>
