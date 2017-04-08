<?php include_once 'inc/header.php'; ?>
<?php include_once 'classes/Product.php'; ?>
<?php include_once 'classes/Cart.php'; ?>
<?php include_once 'classes/Category.php'; ?>
<?php 
include_once 'classes/Customer.php';
$cmr = new Customer();
?>

<?php 

$custlogin = Session::get("custlogin");
if ($custlogin==false) {
	header("Location:login.php");
}
?>
<?php 
if (isset($_POST['submit'])) {

	$cmrid = Session::get("cmrId");
		
    $Updatecmr = $cmr ->customerUpdate($_POST,$cmrid);
}
?>
<style>
	.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;}
	.tblone tr td{text-align: justify;}
	.tblone h2  {text-align: center;}
	.tblone input[type="text"]{width: 400px;font-size: 15px;padding: 5px;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<?php 
    	$id = Session::get("cmrId");
    	$getcust = $cmr -> getCustomerData($id);
    	if ($getcust) {
    		while ($result = $getcust->fetch_assoc()) {
    	 ?>
    	 <form action="" method="post">
		<table class="tblone">
			<?php 

				if (isset($Updatecmr)) {
					
					echo "<tr><td colspan='2'>".$Updatecmr."</td></tr>";
				}
			 ?>
			<tr>
				<td colspan="2"><h2>Update Profile Details</h2></td>			
			</tr>
			<tr>
				<td width="20%">Name</td>
				<td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
			</tr>
			
			<tr>
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>
			</tr>
			<tr>
				<td>Zipcode</td>
				<td><input type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Save"></td>
			</tr>

			
		</table>
		</form>
		<?php } }  ?>		
 		</div>
 	</div>
	</div>
  <?php include_once 'inc/footer.php'; ?>