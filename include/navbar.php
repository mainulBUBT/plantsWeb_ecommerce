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
            <a class="nav-link" href="product_details.php">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class='fa fa-shopping-cart'></i><span class="badge badge-pill badge-warning ml-1"><?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']); }else{ echo '0';} ?></span></a>
          </li>     
        </ul>
      </div>  
    </nav>
  </header>