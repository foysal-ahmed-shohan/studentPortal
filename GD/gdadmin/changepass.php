<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Update Admin Credentials</a>
        </li>
      </ol>
    	 <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		        $added = $ad->changePassword($_POST);
		        if ($added) {
		        	echo "<span class='success' style='text-align:center;margin:10px;'>Admin Credenial updated successfully</span>";
		        }else{
		        	echo "<span class='error' style='text-align:center;margin:10px;'>Old Password not match</span>";
		        }
		    }
		?>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
			<?php
                $bn = $ad->getAdmin();
                while ($row = $bn->fetch_assoc()) {

             ?>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="email" value="<?php echo $row['name'];?>" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'];?>" required>
		    </div>
		  </div>
			<div class="form-group col-sm-6 has-feedback">
			   <input type="text" name="oldpass" class="form-control" id="email" placeholder="Enter Current password" required>
			   <p class="help-block text-info">To change admin info current password will be required</p>
			</div>	

			<div class="form-group col-sm-6">
			   <input type="text" name="newpass" class="form-control" id="email" placeholder="Enter new password" >
			   <p class="help-block text-info">If you don't want to change password, leave it blank</p>
			</div>	
		
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<i class="fa fa-plus" aria-hidden="true"></i>
		      <input type="submit" class="btn btn-primary" value="Update Admin Credential" />
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