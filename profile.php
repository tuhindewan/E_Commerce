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
<style>
	.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;}
	.tblone tr td{text-align: justify;}
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
		<table class="tblone">
			<tr>
				<td width="20%">Name</td>
				<td width="5%">:</td>
				<td><?php echo $result['name']; ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $result['address']; ?></td>
			</tr>
			<tr>
				<td>City</td>
				<td>:</td>
				<td><?php echo $result['city']; ?></td>
			</tr>
			<tr>
				<td>Country</td>
				<td>:</td>
				<td><?php echo $result['country']; ?></td>
			</tr>
			<tr>
				<td>Zipcode</td>
				<td>:</td>
				<td><?php echo $result['zip']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $result['email']; ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?php echo $result['phone']; ?></td>
			</tr>

			
		</table>
		<?php } }  ?>		
 		</div>
 	</div>
	</div>
  <?php include_once 'inc/footer.php'; ?>