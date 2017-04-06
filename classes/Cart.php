<?php include_once '../helpers/Format.php'; ?>
<?php include_once '../lib/Database.php'; ?>

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
}
?>