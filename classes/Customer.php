<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/Format.php");
include_once ($filepath."/../lib/Database.php");
?>


<?php

class Customer
{
	private $fm;
	private $db;

	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function customerRegistration($data){
		$name = mysqli_real_escape_string($this->db->link,$data['name']);
		$address = mysqli_real_escape_string($this->db->link,$data['address']);
		$city = mysqli_real_escape_string($this->db->link,$data['city']);
		$country = mysqli_real_escape_string($this->db->link,$data['country']);
		$zip = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$password = mysqli_real_escape_string($this->db->link,md5($data['password']));

		if (empty($name) or empty($address) or empty($city) or empty($country) or empty($zip) or empty($phone) or empty($email) or empty($password)) {
			$msg = "<span class='error'>Fields Must not be Empty !</span>";
				return $msg;
			}

			$emailQuery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1 ";
			$result = $this->db->select($emailQuery);
			if ($result) {
				$msg =  "<span class='error'>Email Already Exists !</span>";
				return $msg;
				}else{
					$query = "INSERT INTO tbl_customer (name,address,city,country,zip,phone,email,password) VALUES ('$name','$address','$city','$country','$zip','$phone','$email','$password')";
				 	$insertRow = $this->db->insert($query);
				 	if ($insertRow) {
							$msg = "<span class='success'>Customer Data Inserted Successfully.</span>";
							return $msg;
						}else{
							$msg = "<span class='error'>Customer Data not Inserted !</span>";
							return $msg;
						}
		}					}
}
?>