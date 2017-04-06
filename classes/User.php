<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/helpers.php");
include_once ($filepath."/../lib/Database.php");
?>


<?php

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