<?php include_once 'inc/header.php'; ?>
<?php include_once 'classes/Product.php'; ?>
<?php 
include_once 'classes/Cart.php'; 

?>

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
$ct = new Cart();
if (isset($_GET['orderId']) && $_GET['orderId']=='order') {
    $cmrId = Session::get('cmrId');

    $insertOrder = $ct->productOrder($cmrId);

    $delCart = $ct->delCustomerCart();
    header("Location:success.php");
}

?>
<style>
.division{width: 50%;float: left;}
.tblone{width: 500px;margin: 0 auto;border: 2px solid #ddd;}
.tblone tr td{text-align: justify;}
.tblone h2  {text-align: center;}
.tbltwo{float:right;text-align:left;width: 60%;border: 2px solid #ddd; margin-right: 14px; margin-top: 12px;}
.tbltwo tr td{text-align: justify; padding: 5px 10px;}
.ordernow {padding-bottom: 30px;}
.ordernow a{width: 200px;margin: 20px auto 0px;text-align: center;padding: 5px;font-size: 30px;display: block;background: red;color: white;border-radius: 3px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	   <div class="division">
               <table class="tblone">
                       <tr>
                                <th >NO</th>
                                <th >Product</th>
                                <th >Price</th>
                                <th >Quantity</th>
                                <th >Total</th>
                            </tr>

                            <?php 
                            
                            $getPro = $ct->getCartProduct();
                            if ($getPro) {
                                $i=0;
                                $sum = 0;
                                $qty = 0;
                                while ($result = $getPro->fetch_assoc()) {
                                    
                                $i++;
                            

                             ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td><?php echo $result['price']; ?></td>
                                <td>$ <?php echo $result['quantity']; ?></td>
                                <td>
                                    <?php 

                                    $total = $result['price'] * $result['quantity'];
                                    echo $total;
                                    
                                     ?>
                                </td>
                            </tr>
                            <?php 
                            $sum = $sum + $total; 
                        
                            $qty = $qty + $result['quantity'];
                            
                            ?>
                            <?php } } ?>

                        <table class="tbltwo" style="float:right;text-align:left;" width="40%">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>$ <?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10% ($<?php echo $vat = $sum * 0.1; ?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>
                                     
                                     <?php 

                                     $vat = $sum * 0.1;
                                     $gtotal = $sum + $vat;
                                     echo "$ ". $gtotal;

                                      ?>

                                 </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td><?php echo $qty; ?></td>
                            </tr>
                       </table>
           </div>
           <div class="division">
               <?php 
        $id = Session::get("cmrId");
        $getcust = $cmr -> getCustomerData($id);
        if ($getcust) {
            while ($result = $getcust->fetch_assoc()) {
                
            
        
         ?>
        <table class="tblone">
            <tr>
                <td colspan="3"><h2>Your Profile Details</h2></td>          
            </tr>
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
            <tr>
                <td></td>
                <td></td>
                <td><a href="editProfile.php">Update Details</a></td>
            </tr>

            
        </table>
        <?php } }  ?>       
           </div>
 		</div>
 	</div>
    <div class="ordernow"><a href="?orderId=order">Order</a></div>
	</div>
  <?php include_once 'inc/footer.php'; ?>