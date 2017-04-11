<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/Format.php");
include_once ($filepath."/../lib/Database.php");
?>


<?php

class Cart
{
	private $fm;
	private $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function addToCart($quantity,$id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$productId = mysqli_real_escape_string($this->db->link,$id);

		$sId = session_id();

		$productQuery = "SELECT * FROM tbl_product WHERE productId = '$productId'";

		$result = $this->db->select($productQuery)->fetch_assoc();

		$productName = $result['productName'];
		$price       = $result['price'];
		$image       = $result['image'];

		$chkquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
		$getPro = $this->db->select($chkquery );
		if ($getPro) {
			$msg= "Product allready added !";
			return $msg;
		}else{

		$query = "INSERT INTO tbl_cart (sId,productId,productName,price,quantity,image) VALUES ('$sId','$productId','$productName','$price','$quantity','$image')";
	 	     $insertRow = $this->db->insert($query);
	 	    if ($insertRow) {
				header("Location:cart.php");
			}else{
				header("Location:cart.php");
			}
		}
	}

	public function getCartProduct(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
	   	$result = $this->db->select($query);
	   	return $result;
	}

	public function updateCartQuantity($quantity,$cartId){
		$quantity  = mysqli_real_escape_string($this->db->link,$quantity);
		$cartId  = mysqli_real_escape_string($this->db->link,$cartId);

		 $query = "UPDATE tbl_cart SET 
						 				quantity ='$quantity'
						 				WHERE cartId = '$cartId' ";
						 	$updateRow = $this->db->update($query);
						 	if ($updateRow) {
									header("Location:cart.php");
								}else{
									$msg = "<span class='error'>Quantity has not Updated !</span>";
									return $msg;
								}
	}

	public function delProductByCart($delPro){

		$delquery = "DELETE FROM tbl_cart WHERE cartId = '$delPro'";
		$result= $this->db->delete($delquery);
		if ($result) {
				echo "<script>window.location=cart.php;</script>";
			}else{
				$msg = "<span class='error'>Product has not been Deleted !</span>";
				return $msg;
			}
	}

	public function chkCartTable(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
	   	$result = $this->db->select($query);
	   	return $result;
	}

	public function delCustomerCart(){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId' ";
		$this->db->delete($query);
	}

	public function productOrder($cmrId){
		$sId    = session_id();
		$query  = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
	   	$getPro = $this->db->select($query);
	   	if ($getPro) {
	   		while ($result = $getPro ->fetch_assoc()) {
	   			$productId = $result['productId'];
	   			$productName = $result['productName'];
	   			$quantity = $result['quantity'];
	   			$price = $result['price'] * $quantity;
	   			$image = $result['image'];

	   	$query = "INSERT INTO tbl_order (cmrId,productId,productName,quantity,price,image) VALUES ('$cmrId','$productId','$productName','$quantity','$price','$image')";
	 	     $insert_row = $this->db->insert($query);
	   		}
	   	}
	   	
	}
	public function payableAmount($cmrId){
		$query = "SELECT price FROM tbl_order WHERE cmrId = '$cmrId' AND date = now() ";
	   	$result = $this->db->select($query);
	   	return $result;
	}

}
?>