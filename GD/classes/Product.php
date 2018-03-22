<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/Session.php");
include_once ($filepath."/../libs/Database.php");
include_once ($filepath."/../helpers/Format.php");

Class Product{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
	}


	public function insertProduct($data, $file){
		//validation of product data
		$productName = $this->fm->validation($data['pname']);
		$productName = mysqli_real_escape_string($this->db->link, $productName);


		$pdescription = $data['pdescription'];
		$pdescription = mysqli_real_escape_string($this->db->link, $pdescription);

		$p_price = $this->fm->validation($data['p_price']);
		$p_price = mysqli_real_escape_string($this->db->link, $p_price);


		//take image information using super global variable $_FILES[];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		
		if (empty($productName) or empty($pdescription) or empty($p_price) or empty($file_name))
		{
			$msg = "<span class='error'>Fields must not be empty !.</span>";
			return $msg;
		}else{
			//validate uploaded images
			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			
			if ($file_size >10048567) {
				$msg = "<span class='error'>Product not found !.</span>";
				return $msg;
			} elseif (in_array($file_ext, $permited) === false) {
				echo "<span class='error'>You can upload only:-"
				.implode(', ', $permited)."</span>";
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				
				$query = "INSERT INTO tbl_product(productName,description,price,image) 
				VALUES('$productName','$pdescription','$p_price','$uploaded_image')";

				$inserted = $this->db->insert($query);
				if ($inserted) {
					$msg = "<span class='success'>Product inserted successfully.</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Failed to insert.</span>";
					return $msg;
				}
		 	}

		}

	}


	//get All product list
	public function getAllProduct(){
		
		$sql = "SELECT * FROM tbl_product ORDER BY id DESC ";

		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}

	//get Product by ID
	public function getProdById($id){
		$pid = $this->fm->validation($id);
		$pid = mysqli_real_escape_string($this->db->link, $pid);
		$sql = "SELECT * FROM tbl_product WHERE id = '$pid' ";
		$result = $this->db->select($sql);
		return $result;
	}

	//delete product by product id
	public function deleteProduct($id){
		$getImgSql =  "SELECT * FROM tbl_product WHERE id='$id'";
		$getimg = $this->db->select($getImgSql);
		if ($getimg) {
			while ($rows = $getimg->fetch_assoc()) {
				$delimg = $rows['image'];
				unlink($delimg);
			}
		}
		//query for delete all info from product table	
		$sql = "DELETE FROM tbl_product WHERE id='$id'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = "<span class='success'>Product Successfully Deleted !.</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>Failed to Delete.</span>";
			return $msg;
		}
	}

	//update product by product id
	public function updateProduct($data, $file, $id){
		$productName = $this->fm->validation($data['pname']);
		$productName = mysqli_real_escape_string($this->db->link, $productName);


		$pdescription = $data['pdescription'];
		$pdescription = mysqli_real_escape_string($this->db->link, $pdescription);

		$p_price = $this->fm->validation($data['p_price']);
		$p_price = mysqli_real_escape_string($this->db->link, $p_price);


		//take image information using super global variable $_FILES[];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		
		if (empty($productName) or empty($pdescription) or empty($p_price) )
		{
			$msg = "<span class='error'>Fields must not be empty !.</span>";
			return $msg;
		}else{

			if (!empty($file_name)) {
				//delete previous image
				$getImgSql =  "SELECT * FROM tbl_product WHERE id='$id'";
				$getimg = $this->db->select($getImgSql);
				if ($getimg) {
					while ($rows = $getimg->fetch_assoc()) {
						$delimg = $rows['image'];
						unlink($delimg);
					}
				}

				//validate uploaded images
				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				$uploaded_image = "uploads/".$unique_image;
				
				if ($file_size >10048567) {
					$msg = "<span class='error'>Product not found !.</span>";
					return $msg;
				} elseif (in_array($file_ext, $permited) === false) {
					echo "<span class='error'>You can upload only:-"
					.implode(', ', $permited)."</span>";
				}else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "UPDATE tbl_product
							  SET 
							  productName     = '$productName',
							  description     = '$pdescription',
							  price           = '$p_price',
							  image           = '$uploaded_image'
							  WHERE id        = '$id' ";

					$updated = $this->db->update($query);
					if ($updated) {
						$msg = "<span class='success'>Product updated successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Failed to updated.</span>";
						return $msg;
					}
			 	}
			}else{

				    $query = "UPDATE tbl_product
							  SET
							   productName    = '$productName',
							  description     = '$pdescription',
							  price           = '$p_price'
							  WHERE id        = '$id' ";

					$updated = $this->db->update($query);
					if ($updated) {
						$msg = "<span class='success'>Product updated successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Failed to updated.</span>";
						return $msg;
					}

			}
			
		}

	}

	public function getBanner(){
		$sql = "SELECT * FROM tbl_banner WHERE id=1 ";
		$result = $this->db->select($sql);
		return $result;
	}


	//update product by product id
	public function updateBanner($data, $file){
		$bannertext = $this->fm->validation($data['bannertext']);
		$bannertext = mysqli_real_escape_string($this->db->link, $bannertext);

		//take image information using super global variable $_FILES[];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		
		if (empty($bannertext) )
		{
			$msg = "<span class='error'>Fields must not be empty !.</span>";
			return $msg;
		}else{

			if (!empty($file_name)) {

				$getImgSql =  "SELECT * FROM tbl_banner WHERE id=1";
				$getimg = $this->db->select($getImgSql);
				if ($getimg) {
					while ($rows = $getimg->fetch_assoc()) {
						$delimg = $rows['image'];
						unlink($delimg);
					}
				}

				//validate uploaded images
				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				$uploaded_image = "uploads/".$unique_image;
				
				if ($file_size >10048567) {
					$msg = "<span class='error'>Banner not found !.</span>";
					return $msg;
				} elseif (in_array($file_ext, $permited) === false) {
					echo "<span class='error'>You can upload only:-"
					.implode(', ', $permited)."</span>";
				}else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "UPDATE tbl_banner
							  SET 
							  name            = '$bannertext',
							  image           = '$uploaded_image'
							  WHERE id        = 1 ";

					$updated = $this->db->update($query);
					if ($updated) {
						$msg = "<span class='success'>Banner updated successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Failed to updated.</span>";
						return $msg;
					}
			 	}
			}else{

				    $query = "UPDATE tbl_banner
							  SET
							  name     = '$bannertext'
							  WHERE id        = 1";

					$updated = $this->db->update($query);
					if ($updated) {
						$msg = "<span class='success'>Banner updated successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Failed to updated.</span>";
						return $msg;
					}

			}
			
		}

	}
	public function getAllPost($start_from, $per_page){
		
		$sql = "SELECT * FROM tbl_product ORDER BY id DESC limit $start_from, $per_page";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			//$msg = "<span class='error'>No Posts found !.</span>";
			return false;
		}
	}

	public function getTotalPostRows(){
		$sql = "SELECT * FROM tbl_product ORDER BY id DESC";
	
		$result = $this->db->select($sql);
		return $result;
	}
//end of class
}

?>