<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <?php 
                    $plist = $pd->getAllProduct();
                    $allpd = $plist->num_rows;
                 ?>
              <div class="mr-5"><?php echo $allpd;?> Products !</div>
            </div>
            <a href="viewproduct.php" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-8">
          <div class="panel panel-info">
            <h3 class="panel-heading">Current Banner</h3><hr>
            <div class="panel-body">
              <?php
                $bn = $pd->getBanner();
                while ($row = $bn->fetch_assoc()) {
                    

               ?>
               <img style="width:95%; height:100px" src="<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>">
              <?php    
                }
              ?>
                <!-- <img src="uploads/banner.php" alt="Banner"> -->
            </div>
            <br>
            <a href="changebanner.php" class="btn btn-info"> Change Banner</a>
          </div>
        </div>  
      </div>

      <hr>


    </div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>