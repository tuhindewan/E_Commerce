<?php 

 include_once '../helpers/Format.php'; 
 include_once '../lib/Database.php'; 

class User 
{
	
	private $fm;
	private $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

}

?>