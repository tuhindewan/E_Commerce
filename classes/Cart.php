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


		$query = "INSERT INTO tbl_cart (sId,productId,productName,price,quantity,image) VALUES ('$sId','$productId','$productName','$price','$quantity','$image')";
	 	     $insertRow = $this->db->insert($query);
	 	    if ($insertRow) {
				header("Location:cart.php");
			}else{
				header("Location:cart.php");
			}
	}
}
?>