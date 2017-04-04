<?php include_once '../helpers/Format.php'; ?>
<?php include_once '../lib/Database.php'; ?>

<?php

class Category
{
	private $fm;
	private $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function catInsert($catName)
	{
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
	
	if (empty($catName)) {
			$msg = "<span class='error'>Username or Password cannot be Empty !</span>";
				return $msg;
		}else{
			$query = "INSERT INTO tbl_cat (catName) VALUES ('$catName')";
			$inserCat = $this->db->insert($query);
			if ($inserCat) {
				$msg = "<span class='success'>Category has been Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Category has not Inserted !</span>";
				return $msg;
			}
		}
	}
	
	public function getAllCat(){
		$query = "SELECT * FROM tbl_cat ORDER BY catId DESC";
		$result = $this->db->select($query);
		return $result;

	}

	public function getCatById($id)
	{
		$query = "SELECT * FROM tbl_cat WHERE catId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function catUpdate($catName,$id)
	{
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
	
	if (empty($catName)) {
			$msg = "<span class='error'>Category name cannot be Empty !</span>";
				return $msg;
		}else{
			$query = "UPDATE tbl_cat SET catName = '$catName' WHERE catId = '$id'";
			$update_row = $this->db->update($query);
			if ($update_row) {
				$msg = "<span class='success'>Category has been Updated Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Category name not Updated !</span>";
				return $msg;
			}
			
		}
	}
}

?>