<?php 
include_once "admin_header.php";


if (isset($_GET['delpd'])) {
        $delid = $_GET['delpd'];
        $delprod = $pd->deleteProduct($delid);
    }

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Showing Products info</a>
        </li>
      </ol>
		
	<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Products</div>
        <div class="card-body">
          <?php 
            //delete student
              if (isset($delprod)) {
                echo $delprod."<br>";
              }
            
          ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Photo</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                    $i=0;
                    $plist = $pd->getAllProduct();
                      if ($plist) {
                        while ($row = $plist->fetch_assoc()) {
                      $i++;
                 ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo$row['productName'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><?php echo $fm->textShorten($row['description'], 100);?></td>
                  <td><img style="width:80px; height:60px;" src="<?php echo $row['image'];?>" ></td>
                  
                  <td><a href="editproduct.php?prodid=<?php echo $row['id'];?>" class="btn btn-sm btn-primary">Edit</a>  <a class="btn btn-danger btn-sm" href="?delpd=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete?');">Delete</a></td>
                </tr>
                
                <?php } }else{

                  echo "<span class='error'>No product found!</span>";

                } ?>
              </tbody>
             
            </table>
          </div>
        </div>
      </div>
	</div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>