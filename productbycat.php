<?php include_once 'inc/header.php'; ?>
<?php 

include_once 'classes/Product.php'; 
$pd= new Product(); 
include_once 'helpers/Format.php'; 
$fm= new Format(); 
?>
<?php 

if (!isset($_GET['catId']) && $_GET['catId']== NULL) {
    echo "<script>window.location='404.php';</script>";
}else{
    $id = $_GET['catId'];
}




 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Category</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

	      <?php 

	      $getproduct = $pd -> getProductByCat($id);
	      if ($getproduct) {
	      	while ($result = $getproduct->fetch_assoc()) {
	      		
	      	
	      
	       ?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					  <h2><?php echo $result['productName']; ?> </h2>
					  <p><?php echo $fm->textShorten($result['body'],60); ?></p>
					  <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
						<?php } }else{

							echo "Products Of This Category Are Not Available !";

							} ?>
			</div>

    </div>
 </div>
</div>
  <?php include_once 'inc/footer.php'; ?>