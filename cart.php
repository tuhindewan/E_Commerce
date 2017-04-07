<?php include_once 'inc/header.php'; ?>
<?php include_once 'classes/Cart.php';
$ct = new Cart();
?>
<?php 

if (isset($_POST['submit'])) {
	
	$quantity = $_POST['quantity'];
	$cartId = $_POST['cartId'];

	$updateCart = $ct->updateCartQuantity($quantity,$cartId);
}


 ?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<span style="color: green;font-size: 18px;">
			    		
			    		<?php 
			    		if (isset($updateCart)) {
			    			echo $updateCart;
			    		}
			    		 ?>
			    	</span>
						<table class="tblone">
							<tr>
								<th width="5%%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>

							<?php 
							
							$getPro = $ct->getCartProduct();
							if ($getPro) {
								$i=0;
								$sum = 0;
								while ($result = $getPro->fetch_assoc()) {
									
								$i++;
							

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td>$ <?php echo $result['price']; ?></td>
								<td>
									<form action="" method="post">

										<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>

									</form>
								</td>
								<td>
									<?php 

									$total = $result['price'] * $result['quantity'];
									echo $total;
									$sum = $sum + $total;
									 ?>
								</td>
								<td><a href="">X</a></td>
							</tr>
							
							<?php } } ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
									 
									 <?php 

									 $vat = $sum * 0.1;
									 $gtotal = $sum + $vat;
									 echo "$ ". $gtotal;

									  ?>

								 </td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 
 <?php include_once 'inc/footer.php'; ?>
