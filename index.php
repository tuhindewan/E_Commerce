<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/slider.php'; ?>
<?php include_once 'classes/Product.php'; ?>
<?php include_once 'helpers/Format.php'; ?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php 
			$pd = new Product();
			$fm = new Format();
			$getFproduct = $pd->getFeaturedProduct();
			if ($getFproduct) {
				while ($result = $getFproduct->fetch_assoc()) {
					
				
			

			 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['body'],60); ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
					<?php 
			$pd = new Product();
			$fm = new Format();
			$getNproduct = $pd->getNewProduct();
			if ($getFproduct) {
				while ($result = $getNproduct->fetch_assoc()) {
					
				
			

			 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['body'],60); ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>

				<?php } } ?>
				</div>
				
			</div>
    </div>
 </div>
</div>
<?php include_once 'inc/footer.php'; ?>