<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/lib/Session.php");
$custlogin = Session::get("custlogin");
if ($custlogin==false) {
	header("Location:login.php");
}

?>
<?php include_once 'inc/header.php'; ?>
<?php 
$custlogin = Session::get("custlogin");
if ($custlogin==false) {
	header("Location:login.php");
}

?>
<?php 
include_once 'classes/Product.php'; 
$pd = new Product();
?>
<style>
	
table.tblone img {
    height: 90px;
    width: 100px;
}

</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Product Comparison</h2>
			    	<span style="color: green;font-size: 18px;">
			    		
			    	</span>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Action</th>
							</tr>

							<?php 
							$cmrId = Session::get('cmrId');
							$getComData = $pd->getComapreData($cmrId);
							if ($getComData) {
								$i=0;
								while ($result = $getComData->fetch_assoc()) {
									
								$i++;
							

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td>$ <?php echo $result['price']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">View</a></span></td>
							</tr>
							
							<?php } } ?>
							</table>

							
							
					   
					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 100%; text-align: center;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 
 <?php include_once 'inc/footer.php'; ?>
