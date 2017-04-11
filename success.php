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
	
.psuccess{width: 500px; height: 200px;text-align: center;border: 1px solid #ddd; margin: 0px auto;padding: 50px;}
.psuccess h2 {border-bottom: 1px solid #ddd;margin-bottom: 20px;padding-bottom: 10px;}
 .psuccess p {line-height: 25px; font-size: 18px;text-align: left;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	 <div class="psuccess">

         <?php 

         $cmrId = Session::get("cmrId");
         $amount = $ct->payableAmount($cmrId);
         if ($amount) {
            $sum = 0;
             while ($result = $amount->fetch_assoc()) {
                 $price = $result['price'];
                 $sum = $sum+$price;
             }
         }

          ?>
    	 	<h2>Success</h2>
            <p>Total Payable Amount(Including Vat) : $
            <?php 

            $vat = $sum*0.1;
            $total = $sum+$vat;
            echo $total;
             ?>
            </p>
            <p>Thanhs For Purchase. Reaceive Your Order Successfully.We Will Contact You ASAP With Delivery Details.Here Is Your Details.....<a href="orderdetails.php">Visit Here</a></p>
    	 </div>
 		</div>
 	</div>
	</div>
  <?php include_once 'inc/footer.php'; ?>