

<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/Format.php");
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../lib/Session.php");
Session::checkLogin();
 ?>


<?php 

/**
* adminlogin class
*/

class adminLogin 
{
	private $fm;
	private $db;
	public function __construct()
	{
		$this->fm = new Format();
		$this->db = new Database();
	}

	public function AdminLogin($adminUser,$adminPass)
	{
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

		if (empty($adminUser) || empty($adminPass)) {
			$loginmsg = "Username or Password cannot be Empty !";
			return $loginmsg;
		}else{
			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass ='$adminPass'";
			$result = $this->db->select($query);
			if ($result==true) {
				$value = $result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);
				header("Location:dashboard.php");
			}else{
				$loginmsg = "Username or Password not Match!";
			     return $loginmsg;
			}
		}
	}
}

 ?>