<?php include_once '../classes/adminLogin.php'; ?>
<?php 

$al = new adminLogin();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);
	$loginchk = $al->AdminLogin($adminUser,$adminPass);
}


 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<span style="color: red;font-size: 18px;">
				<?php 
				if (isset($loginchk)) {
					echo $loginchk;
				}

				 ?>
			</span>
			<div>
				<input type="text" placeholder="Username"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Login" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="https://github.com/tuhindewan/E_Commerce">Md. Saiduzzaman Tuhin</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>