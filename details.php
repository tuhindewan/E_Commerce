<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'classes/Product.php'; 
$pd = new Product();
?>
<?php include_once 'classes/Cart.php'; ?>
<?php include_once 'classes/Category.php'; ?>

<?php 

if (isset($_GET['proId'])) {

    $proId = $_GET['proId'];
}

 ?>

 <?php 
 $ct = new Cart();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
	
		$quantity = $_POST['quantity'];
		$addCart  = $ct->addToCart($quantity,$proId);

}
?>

<?php

if (isset($_POST['compare'])) {
	$productId = $_POST['productId'];
	$cmrId = Session::get('cmrId');
	$insertCompare = $pd->insertCompareData($productId, $cmrId);
}

?>

<?php 
if (isset($_POST['wList'])) {
	$productId = $_POST['productId'];
	$cmrId = Session::get('cmrId');
	$saveWlist = $pd->saveWlistData($productId, $cmrId);
}

 ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				<?php 
				
				$getPd = $pd->getSingleProduct($proId);
				if ($getPd) {
					while ($result = $getPd->fetch_assoc()) {
						
					
				

				 ?>				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName'];?> </h2>
									
					<div class="price">
						<p>Price: <span>$<?php echo $result['price'];?></span></p>
						<p>Category: <span><?php echo $result['catName'];?></span></p>
						<p>Brand:<span><?php echo $result['brandName'];?></span></p>
					</div>
				<div class="add-cart">

					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
			    </div>
					<span style="color: red;font-size: 19px"><?php 

					if (isset($addCart )) {
					 	echo $addCart ;
					 } ?>
					 	
					 </span>
					 <span style="color: green;font-size: 19px">
					 <?php if (isset($insertCompare)) {
					 	echo $insertCompare;
					 } ?>
					 </span>
					 <span style="color: green;font-size: 19px">
					 <?php if (isset($saveWlist)) {
					 	echo $saveWlist;
					 } ?>
					 </span>
				<?php $login = Session::get("custlogin");
	  				if ($login==true) { ?>
				  <div class="add-cart">
				  <div class="myButton" style="width: 100%; float: left; margin-right: 40px; margin-top: 10px">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId'];?>"/>
						<input type="submit" class="buysubmit" name="compare" value="Add To Compare"/>
					</form>	
					</div>
					<div class="myButton" style="width: 100%; float: left; margin-right: 40px; margin-top: 10px">
					<form action="" method="post">
					<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId'];?>"/>
						<input type="submit" class="buysubmit" name="wList" value="Save To WishList"/>
					</form>	
					</div>
			    </div>
			    <?php } ?>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body'];?>
	    </div>
	    <?php } } ?>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php 

					$cat = new Category();
					$getCat = $cat ->getAllCat();
					if ($getCat) {
						while ($result = $getCat->fetch_assoc()) {
							
						
					

					 ?>

				      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
				     <?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
  <?php include_once 'inc/footer.php'; ?>