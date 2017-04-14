<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'classes/Product.php'; 
$pd = new Product();
?>
<?php 
if (isset($_GET['delWishId'])) {
	$productId = $_GET['delWishId'];
	$cmrId = Session::get('cmrId');
	$delWishPro = $pd->delWlistProduct($cmrId,$productId);
}

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>WishList</h2>
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
							$getwishData = $pd->getWlistData($cmrId);
							if ($getwishData) {
								$i=0;
								while ($result = $getwishData->fetch_assoc()) {
									
								$i++;
							

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td>$ <?php echo $result['price']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td >
								<a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Buy Now</a>||
								
								<a href="?delWishId=<?php echo $result['productId']; ?>">Remove</a>
								</td>
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
