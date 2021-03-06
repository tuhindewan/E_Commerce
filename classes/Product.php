<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/Format.php");
include_once ($filepath."/../lib/Database.php");
class Product 
{
	
	private $fm;
	private $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}


	public function insertProduct($data,$file)
	{
		$productName  = mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId        = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId      = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body         = mysqli_real_escape_string($this->db->link,$data['body']);
		$price        = mysqli_real_escape_string($this->db->link,$data['price']);
		$type         = mysqli_real_escape_string($this->db->link,$data['type']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');

		$filename = $file['image']['name'];
		$fileSize = $file['image']['size'];
		$filetemp = $file['image']['tmp_name'];

		$div = explode('.', $filename);
	    $file_ext = strtolower(end($div));
		$unique_name = substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image = "upload/".$unique_name;

		if (empty($productName) or empty($catId) or empty($brandId) or empty($body) or empty($price) or empty($filename) or empty($type)) {
			$msg = "<span class='error'>Fields cannot be Empty !</span>";
				return $msg;

	}elseif($fileSize > 1048567){
	 echo "<span class='error'>Select An Image Less Then 1MB.</span>";

	 }elseif(in_array($file_ext,$permited)===false){
	 echo "<span class='error'>You Can Upload Only:- ".implode(', ',$permited)."</span>";

	 }else{
	 	move_uploaded_file( $filetemp,$upload_image);

	 	$query = "INSERT INTO tbl_product (productName,catId,brandId,body,price,image,type) VALUES ('$productName','$catId','$brandId','$body','$price','$upload_image','$type')";
	 	$insertRow = $this->db->insert($query);
	 	if ($insertRow) {
				$msg = "<span class='success'>Product has been Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Product has not Inserted !</span>";
				return $msg;
			}
	 }
   }

   public function getAllProduct(){
   	$query = "SELECT tbl_product.*, tbl_cat.catName, tbl_brand.brandName
   	          FROM tbl_product
   	          INNER JOIN tbl_cat
   	          ON tbl_product.catId = tbl_cat.catId
   	          INNER JOIN tbl_brand
   	          ON tbl_product.brandId = tbl_brand.brandId
   	          ORDER BY tbl_product.productId DESC";

			   	$result= $this->db->select($query);
			   	return $result;
   }

   public function getProById($id){
   	$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
   	$result = $this->db->select($query);
   	return $result;
   }

   public function updateProduct($data,$file,$id){
   		$productName  = mysqli_real_escape_string($this->db->link,$data['productName']);
		$catId        = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId      = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body         = mysqli_real_escape_string($this->db->link,$data['body']);
		$price        = mysqli_real_escape_string($this->db->link,$data['price']);
		$type         = mysqli_real_escape_string($this->db->link,$data['type']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');

		$filename = $file['image']['name'];
		$fileSize = $file['image']['size'];
		$filetemp = $file['image']['tmp_name'];

		$div = explode('.', $filename);
	    $file_ext = strtolower(end($div));
		$unique_name = substr(md5(time()),0,10).'.'.$file_ext;
		$upload_image = "upload/".$unique_name;

		if (empty($productName) or empty($catId) or empty($brandId) or empty($body) or empty($price)  or empty($type)) {
			$msg = "<span class='error'>Fields cannot be Empty !</span>";
			return $msg;

		}else{
			if (!empty($filename)) {

				if($fileSize > 1048567){
						 echo "<span class='error'>Select An Image Less Then 1MB.</span>";

						 }elseif(in_array($file_ext,$permited)===false){
						 echo "<span class='error'>You Can Upload Only:- ".implode(', ',$permited)."</span>";

						 }else{
						 	move_uploaded_file( $filetemp,$upload_image);

						 	 

						 	$query = "UPDATE tbl_product
						 				SET 
						 				productName ='$productName',
						 				catId		='$catId',
						 				brandId		='$brandId',
						 				body 		='$body',
						 				price		='$price',
						 				image		='$upload_image',
						 				type		='$type'
						 				WHERE productId = '$id' ";
						 	$updateRow = $this->db->update($query);
						 	if ($updateRow) {
									$msg = "<span class='success'>Product has been Updated Successfully.</span>";
									return $msg;
								}else{
									$msg = "<span class='error'>Product has not Updated !</span>";
									return $msg;
								}
						 }
						}
						 else{

			 	            $query = "UPDATE tbl_product
						 				SET 
						 				productName ='$productName',
						 				catId		='$catId',
						 				brandId		='$brandId',
						 				body 		='$body',
						 				price		='$price',
						 				type		='$type'
						 				WHERE productId = '$id' ";
						 	$updateRow = $this->db->update($query);
						 	if ($updateRow) {
									$msg = "<span class='success'>Product has been Updated Successfully.</span>";
									return $msg;
								}else{
									$msg = "<span class='error'>Product has not Updated !</span>";
									return $msg;
								}
						 }
		}

   }

   public function delProById($id){
   	$query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
   	$getdata = $this->db->select($query);
   	if ($getdata ) {
   		while ($getImg = $getdata->fetch_assoc()) {
   			$unlinkImg = $getImg['image'];
   			unlink($unlinkImg);
   		}
   	}

   	$delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
		$result= $this->db->delete($delquery);
		if ($result) {
				$msg = "<span class='success'>Product has been Deleted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Product has not been Deleted !</span>";
				return $msg;
			}
   }

   public function getFeaturedProduct(){
   	$query = "SELECT * FROM tbl_product WHERE type = '1' ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
   }

	public function getNewProduct(){
   	$query = "SELECT * FROM tbl_product  ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
   }

   public function getSingleProduct($id){
   	$query = "SELECT tbl_product.*, tbl_cat.catName, tbl_brand.brandName
   	          FROM tbl_product
   	          INNER JOIN tbl_cat
   	          ON tbl_product.catId = tbl_cat.catId
   	          INNER JOIN tbl_brand
   	          ON tbl_product.brandId = tbl_brand.brandId
   	          WHERE tbl_product.productId = '$id'";

			   	$result= $this->db->select($query);
			   	return $result;
   }

   public function getLatestIPhone(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '1' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestSamsung(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '3' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestAcer(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '4' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestCanon(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '5' LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	

	public function getProductByCat($id){
		$query = "SELECT * FROM tbl_product WHERE catId = '$id' ";
	   	$result = $this->db->select($query);
	   	return $result;
	}


	public function insertCompareData($productId, $cmrId){
		$productId  = mysqli_real_escape_string($this->db->link,$productId);
		$cmrId  = mysqli_real_escape_string($this->db->link,$cmrId);

		$cquery  = "SELECT * FROM tbl_compare WHERE productId = '$productId' AND cmrId = '$cmrId' ";
		$check = $this->db->select($cquery);

		if ($check) {
			$msg = "<span style='color:red;font-size:18px;'>Alredy Added !</span>";
				return $msg;
		}

		$query  = "SELECT * FROM tbl_product WHERE productId = '$productId' ";
	   	$result = $this->db->select($query)->fetch_assoc();
	   	if ($result) {
	   		
	   			$productId = $result['productId'];
	   			$productName = $result['productName'];
	   			$price = $result['price'];
	   			$image = $result['image'];

	   	$query = "INSERT INTO tbl_compare (cmrId,productId,productName,price,image) VALUES ('$cmrId','$productId','$productName','$price','$image')";
	 	     $insert_row = $this->db->insert($query);
	 	     if ($insert_row) {
				$msg = "<span class='success'>Added To Compare Page Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Not Added To Compare Page !</span>";
				return $msg;
			}
	   		
	   	}
	}
	public function getComapreData($cmrId){
		$query = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function delCompareData($cmrId){
		$query ="DELETE FROM  tbl_compare WHERE cmrId = '$cmrId'";
		$result = $this->db->delete($query);
	}

	public function saveWlistData($productId, $cmrId){
		$productId  = mysqli_real_escape_string($this->db->link,$productId);
		$cmrId  = mysqli_real_escape_string($this->db->link,$cmrId);

		$cquery  = "SELECT * FROM tbl_wlist WHERE productId = '$productId' AND cmrId = '$cmrId' ";
		$check = $this->db->select($cquery);

		if ($check) {
			$msg = "<span style='color:red;font-size:18px;'>Alredy Added !</span>";
				return $msg;
		}

		$query  = "SELECT * FROM tbl_product WHERE productId = '$productId' ";
	   	$result = $this->db->select($query)->fetch_assoc();
	   	if ($result) {
	   		
	   			$productId = $result['productId'];
	   			$productName = $result['productName'];
	   			$price = $result['price'];
	   			$image = $result['image'];

	   	$query = "INSERT INTO tbl_wlist (cmrId,productId,productName,price,image) VALUES ('$cmrId','$productId','$productName','$price','$image')";
	 	     $insert_row = $this->db->insert($query);
	 	     if ($insert_row) {
				$msg = "<span class='success'>Added To WishList Page Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Not Added To WishList Page !</span>";
				return $msg;
			}
	   		
	   	}
	}
	public function getWlistData($cmrId){
		$query = "SELECT * FROM tbl_wlist WHERE cmrId = '$cmrId' ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function delWlistProduct($cmrId,$productId){
		$query ="DELETE FROM  tbl_wlist WHERE cmrId = '$cmrId' AND productId = '$productId'";
		$result = $this->db->delete($query);
	}


}   


 ?>