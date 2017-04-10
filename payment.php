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
	
.payment{width: 500px; height: 200px;text-align: center;border: 1px solid #ddd; margin: 0px auto;padding: 50px;}
.payment h2 {border-bottom: 1px solid #ddd;margin-bottom: 63px;padding-bottom: 10px;}
.payment a {background: red;color: white;font-size: 25px;padding: 5px 30px;border-radius: 3px;}
.back a{ width: 150px; margin: 5px auto 0; padding:7px 0;text-align: center; display: block; background: #555; border: 1px solid #333; color: #fff; border-radius: 3px; font-size: 25px; }
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	 <div class="payment">
    	 	<h2>Choose Payment Option</h2>
    	 	<a href="paymentoffline.php">Offline Payment</a>
    	 	<a href="paymentonline.php">Online Payment</a>
    	 </div>
    	 <div class="back">
    	 	<a href="cart.php">Previous</a>
    	 </div>
 		</div>
 	</div>
	</div>
  <?php include_once 'inc/footer.php'; ?>