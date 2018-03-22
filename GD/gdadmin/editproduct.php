<?php 
include_once "admin_header.php";

if (!isset($_GET['prodid']) && $_GET['prodid'] == NULL) {
        echo "<script>window.location='viewpproduct.php';</script>";
    }else{
        $pdid = $_GET['prodid'];
    }
?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Update product details</a>
        </li>
      </ol>
    	 <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		        $added = $pd->updateProduct($_POST,$_FILES,$pdid);
		        if ($added) {
		        	echo "<span class='success' style='text-align:center;margin:10px;'> $added </span>";
		        }
		    }
		?>

		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
			<?php
               		$pdinfo = $pd->getProdById($pdid);
               		if ($pdinfo) {
               			while ($pdresult = $pdinfo->fetch_assoc()) {
               ?>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Poduct Name:</label>
		    <div class="col-sm-10">
		      <input type="text" name="pname" class="form-control" id="email" value="<?php echo $pdresult['productName'];?>" >
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Price:</label>
		    <div class="col-sm-10">
		      <input type="text" name="p_price" class="form-control" id="email" value="<?php echo $pdresult['price'];?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Description:</label>
		    <div class="col-sm-10"> 
		      <textarea name="pdescription" class="form-control" cols="5" rows="5" id="pwd"><?php echo $pdresult['description'];?></textarea>
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-10"> 
		      <img style="width:300px; height:200px;" src="<?php echo $pdresult['image'];?>" alt="">
		    </div>
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
		}
		?>
		</form>
	</div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>