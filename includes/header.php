<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DEPHYSTUDIO</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body id="page-top">

  <!-- ======= Header/ Navbar ======= -->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">DephyStudio</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
        <?php 
          if (isset($_SESSION['useruid'])) {
                echo '
                <li class="nav-item">
                <a class="nav-link js-scroll active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll" href="#service">Services</a>
              </li>';
              if ($_SESSION['useruid'] == "admin") {
                echo '<li class="nav-item">
                <a class="nav-link js-scroll" href="gallery.php">Gallery</a>
              </li>';
            }else {
                echo '<li class="nav-item">
                <a class="nav-link js-scroll" href="#gallery">Gallery</a>
              </li>';
            }
                echo '
                <li class="nav-item">
                <a class="nav-link js-scroll" href="#blog">Blog</a>
              </li>
                <li class="nav-item">
                <a class="nav-link js-scroll" href="#contact">Contact</a>
              </li>
                  <li class="nav-item">
                  
                    <a class="nav-link js-scroll text-right ml-5"  href="includes/logout.php">
                    <form class="form-inline my-2 my-lg-0 mx-2" action="includes/logout.inc.php" method="POST">
                    <button class="btn btn-outline-success my-2 my-sm-0 " type="logout-submit">Logout</button>
                    </form></a>
                  </li>
                ';
                
            }else{
              echo '
              <li class="nav-item">
              <a class="nav-link js-scroll active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll" href="#service">Services</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link js-scroll" href="#gallery">Gallery</a>
                </li>
            <li class="nav-item">
              <a class="nav-link js-scroll" href="#blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll" href="#contact">Contact</a>
            </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll text-right ml-5"  href="login.php"><i class="fa fa-user"></i></a>
                </li>
              ';
              }
        ?>
         
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>