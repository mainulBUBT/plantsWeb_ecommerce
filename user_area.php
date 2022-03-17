<?php
session_start();

require_once "config/database.php";



?>

<?php include "include/header.php"; ?>

<style>
  body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #e8e8e8de !important;
  }
  .account-block {
    padding: 0;
    background-image: url(assets/images/register.png);
    background-repeat: no-repeat;
    background-size: auto;
    height: 100%;
    position: relative;
    background-position-y: center;
  }
  .account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.03);
  }
  .account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
  }
  .text-theme {
    color: #5369f8 !important;
  }
  .btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
  }
</style>
</head>

<body>
 <?php include "include/navbar.php"; ?>

 


  <!-------------First JQuery then Popper then Bootstrap then Fontawesome ------------->

  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>


</body>
</html>


