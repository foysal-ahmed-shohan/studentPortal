<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Add product</a>
        </li>
      </ol>
    	 <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		        $added = $pd->insertProduct($_POST,$_FILES);
		        if ($added) {
		        	echo "<span class='success' style='text-align:center;margin:10px;'>Product Added successfully</span>";
		        }
		    }
		?>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Poduct Name:</label>
		    <div class="col-sm-10">
		      <input type="text" name="pname" class="form-control" id="email" placeholder="Enter Product Name"required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Price:</label>
		    <div class="col-sm-10">
		      <input type="text" name="p_price" class="form-control" id="email" placeholder="Enter Price" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Description:</label>
		    <div class="col-sm-10"> 
		      <textarea name="pdescription" class="form-control" id="pwd" placeholder="Enter product description" required></textarea>
		    </div>
		  </div>
			
			<div class="form-group col-sm-4">
			  <input type="file" class="form-control" name="image" id="customFile" required>
			</div>	
		
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<i class="fa fa-plus" aria-hidden="true"></i>
		      <input type="submit" class="btn btn-primary" value="Submit" />
		    </div>
		  </div>
		</form>
	</div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>