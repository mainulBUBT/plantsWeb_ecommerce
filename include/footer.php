<?php
if(isset($_SESSION['USER_ID'])) {?>
	<div class="text-center">PlantsWEB - 2022</div>
<?php }
else{?>
	<footer class="footer">
		<div class="row">
			<div class="col-sm-6 col-md-4 footer-navigation">
				<h3><a href="#">Plants<span>WEB</span></a></h3>
				<p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
				<p class="company-name">PLANTSWEB.COM © 2022</p>
			</div>
			<div class="col-sm-6 col-md-4 footer-contacts">
				<div><span class="fa fa-map-marker footer-contacts-icon"> </span>
					<p><span class="new-line-span">21 Revolution Street</span>NY, USA</p>
				</div>
				<div><i class="fa fa-phone footer-contacts-icon"></i>
					<p class="footer-center-info email text-left"> +1 9485045958</p>
				</div>
				<div><i class="fa fa-envelope footer-contacts-icon"></i>
					<p> <a href="#" target="_blank">support@plantsweb.com</a></p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-4 footer-about">
				<h4>About the company</h4>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias tempora ducimus porro provident iure labore, repellat, laboriosam reiciendis odit velit distinctio ratione quae sapiente officiis placeat sed nemo animi aliquid!</p>
				<div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
			</div>
		</div>
	</footer>
	<?php 
}
?>



<!-------------First JQuery then Popper then Bootstrap then Fontawesome ------------->

<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./assets/DataTables/datatables.min.js"></script>
<script src="./assets/js/lightslider.js"></script>
<link type="text/css" rel="stylesheet" href="./assets/css/lightslider.css" /> 
<script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>
