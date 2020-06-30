
<body id="page-top">

    <!-- ======= Header/ Navbar ======= -->
    <?php

  require_once "includes/header.php";
 ?>
<div class=" bg-secondary py-5"></div>
  <div style="height:80px; width:100%"></div>
  <!-- GALLERY -->
  <div class="container">
    <!-- TITLE -->
    <div class="row">
      <div class="col-sm-12">
        <div class="title-box text-center">
            <h3 class="title-a">
              Gallery
            </h3>
            <p class="subtitle-a">
              My best pictures will all be on this page
            </p>
            <div class="line-mf"></div>
        </div>
      </div>
    </div>
  </div>
    <!-- END OF TITLE -->
<div class="container img-wrapper">
  <div class="row text-center ">

    <!--PHP DISPLAY CODE  -->
    <?php

require_once 'includes/dbh.inc.php';
// SELECT DATA FROM THE DATABASE
$sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:index.php?SelectError");
    exit();
}else{
    mysqli_stmt_execute($stmt);
    // Get Results
    $results = mysqli_stmt_get_result($stmt);

    // Spit data 
    while ($row = mysqli_fetch_assoc($results)) {
        echo '  <!-- IMAGE ONE -->
        <div class="col-md-4  img-containe my-2  bg-dange">
         <div class="card"> 
         <a href="gallery.php">
         <div class="">
           <img class="img-responsive img-fluid card-bod img" src="assets/img/gallery/'.$row["imgFullNameGallery"].'" alt="">
         </div>
         <div class="card-footer">
           <h3>'.$row["titleGallery"].'</h3>
           <p>'.$row["descGallery"].'</p>
         </div>
       </div>
       </a>
        </div>
        <!-- END OF IMAGE ONE -->';

       
    }
}
?>
    <!-- END OF PHP CODE -->
  

  </div>
</div>
    <!-- IMAGES WRAPPER -->

    <!-- END OF IMAGE WRAPPER -->

  <!-- END GALLERY -->
    <!-- UPLOAD FORM -->
    <?php 

        if(isset($_SESSION['useruid'])){
            if($_SESSION['useruid'] == "admin"){
            echo '<div class="container" style="background:#f3f3f3">
            <div class="row my-2">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form class="py-4" action="includes/gallery.inc.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" name="filename" id="" placeholder="File Name..">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="imgtitle" id="" placeholder="Image Title..">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="imgdesc" id="" placeholder="Image Description..">
                        </div>
                        <div class="form-group">
                            <input class="my-2" type="file" name="file" id="">
                            <button class="btn btn-block btn-info" type="submit" name="uploadsubmit">UPLOAD</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>';
      }
        }
    ?>
     
  <!-- ======= Footer ======= -->
  <?php
    require_once "includes/footer.php";
  ?>
  <!-- End  Footer -->
</body>
</html>