<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/Format.php");
include_once ($filepath."/../lib/Database.php");
?>


<?php

class Brand
{
	private $fm;
	private $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function brandInsert($brandName)
	{
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
	
	if (empty($brandName)) {
			$msg = "<span class='error'>Brand Name cannot be Empty !</span>";
				return $msg;
		}else{
			$query = "INSERT INTO tbl_brand (brandName) VALUES ('$brandName')";
			$inserbrand = $this->db->insert($query);
			if ($inserbrand) {
				$msg = "<span class='success'>Brand has been Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Brand has not Inserted !</span>";
				return $msg;
			}
		}
	}
	
	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;

	}

	public function getBrandById($id)
	{
		$query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function brandUpdate($brandName,$id)
	{
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
	
	if (empty($brandName)) {
			$msg = "<span class='error'>Brand name cannot be Empty !</span>";
				return $msg;
		}else{
			$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
			$update_row = $this->db->update($query);
			if ($update_row) {
				$msg = "<span class='success'>Brand has been Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Brand name not Updated !</span>";
				return $msg;
			}
			
		}
	}

	public function delBrandById($id)
	{
		$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
		$result= $this->db->delete($query);
		if ($result) {
				$msg = "<span class='success'>brand has been Deleted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>brand has not been Deleted !</span>";
				return $msg;
			}
	}

	

}

?>