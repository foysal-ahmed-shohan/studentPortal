<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Change Banner</a>
        </li>
      </ol>
    	 <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		        $added = $pd->updateBanner($_POST, $_FILES);
		        if ($added) {
		        	echo "<span class='success' style='text-align:center;margin:10px;'>Banner updated successfully</span>";
		        }
		    }
		?>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
			<?php
                $bn = $pd->getBanner();
                while ($row = $bn->fetch_assoc()) {

             ?>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Banner Name:</label>
		    <div class="col-sm-10">
		      <input type="text" name="bannertext" class="form-control" id="email" value="<?php echo $row['name'];?>">
		    </div>
		  </div>
			<div class="form-group col-sm-8">
			  <img style="width:95%; height:100px" src="<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>">
			</div>	
			
			<div class="form-group col-sm-4">
			  <input type="file" class="form-control" name="image" id="customFile">
			</div>	
		
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<i class="fa fa-plus" aria-hidden="true"></i>
		      <input type="submit" class="btn btn-primary" value="Submit" />
		    </div>
		  </div>
		  <?php
		  	}
		  ?>
		</form>
	</div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>