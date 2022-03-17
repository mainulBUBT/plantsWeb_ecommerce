 <header>
 	<div class="container" id="top">
 		<div class="row">
 			<div class="col-md-10 col-sm-12 col-xs-12">
 				<ul class=" list-group list-group-horizontal">
 					<li><i class='fas fa-envelope-open pr-2'></i><a href="#" class="pr-5"> Admin@mail.com</a></li>
 					<li><i class='fas fa-phone pr-2'></i><a href="#" class="pr-3"> +12 365 4789</a></li>
 				</ul>
 			</div>
 			<div class="col-md-2 col-sm-12 col-xs-12 text-left">
 				<i class='fab fa-facebook'></i>
 				<i class='fab fa-twitter-square'></i>
 				<i class='fab fa-google-plus-square'></i>
 			</div>
 		</div>
 	</div>
 	<nav class="navbar navbar-expand-md navbar-dark ownbg">
 		<a class="navbar-brand text-white pl-5" href="index.php"><img src="./assets/images/logo.png" height="40px"> PlantsWEB</a>
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<div class="collapse navbar-collapse" id="collapsibleNavbar">
 			<ul class="navbar-nav ml-auto">
 				<li class="nav-item">
 					<a class="nav-link" href="index.php">Home</a>
 				</li>
 				<li class="nav-item">
 					<div class="dropdown">
 						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Categories</a>
 						<div class="dropdown-menu">
 							<?php
 							require_once "./config/database.php";

 							$sql = "SELECT * FROM `category`";
 								$result = $mysqli->query($sql); // get the mysqli result

 								while($rows = $result->fetch_assoc()){?>
 									<div class="dropdown-divider"></div>
 									<a class="dropdown-item" href="#"><?php echo ucfirst($rows['cat_name']); ?></a>
 									<?php
 								}
 								?>
 							</div>
 						</div>
 					</li>
 					<li class="nav-item">
 						<?php
 						if(isset($_SESSION['USER_ID'])) {?>
 							<div class="dropdown">
 								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Account</a>
 								<div class="dropdown-menu">
 									<a class="dropdown-item" href="./user_area.php">Dashboard</a>
 									<a class="dropdown-item" href="#">Settings</a>
 									<div class="dropdown-divider"></div>
 									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
 								</div>
 							</div>
 						<?php }
 						else{?>
 							<a class="nav-link" href="user_login.php">Login</a>
 							<?php 
 						}
 						?>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="cart.php"><i class='fa fa-shopping-cart'></i><span class="badge badge-pill badge-warning ml-1"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else{ echo '0';} ?></span></a>
 					</li>     
 				</ul>
 			</div>  
 		</nav>

 		<!-- logout Modal-->

 		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
 			<div class="modal-dialog" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<h5 class="modal-title" id="logoutModal">Logout</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<div class="modal-body">
 						Are you sure to logout from the account?
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-secondary" data-dismiss="modal">Not now</button>
 						<button type="button" class="btn btn-danger"><a id="link" href="include/logout.php" style="text-decoration: none;">Logout</a></button>
 					</div>
 				</div>
 			</div>
 		</div>
 	</header>