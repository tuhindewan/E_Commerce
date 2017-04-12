<?php include_once 'inc/header.php'; ?>
<?php
 include_once 'helpers/Format.php'; 
 $fm = new Format();
 include_once ($filepath."/../classes/Cart.php");
 $ct = new Cart();
?>

<?php 

$custlogin = Session::get("custlogin");
if ($custlogin==false) {
	header("Location:login.php");
}

?>
<?php 

if (isset($_GET['conId'])) {
	$cmrId = $_GET['conId'];
	$time = $_GET['time'];

	$confirmData = $ct ->shiftConfirm($cmrId, $time);

}


 ?>
<style>
	.tblone tr td {text-align: justify;}

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>Your Ordered Details</h2>
    			<table class="tblone">
							<tr>
								<th >NO</th>
								<th >Product Name</th>
								<th >Image</th>
								<th >Quantity</th>
								<th >Price</th>
								<th >Date</th>
								<th >Status</th>
								<th >Action</th>
							</tr>

							<?php 
							$cmrId = Session::get("cmrId");
							$getOrder = $ct->getOrderProduct($cmrId);
							if ($getOrder) {
								$i=0;
								while ($result = $getOrder->fetch_assoc()) {
									
								$i++;
							

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><?php echo $result['quantity']; ?></td>
								<td>
									<?php 

									$total = $result['price'];
									echo $total;
									
									 ?>
								</td>
								<td><?php echo $fm->formatDate($result['date']); ?></td>
								<td>
								<?php  
								if ($result['status']=='0') { 
									echo "Pending";
							 	}elseif($result['status']=='1'){?>
									<a href="?conId=<?php echo $cmrId;?>&time=<?php echo $result['date'];?>">Shifted</a>
							<?php	}else{
									echo "Confirm";
								}

								?>
									
								</td>
								<?php 

								if ($result['status']=='2') { ?>
									<td><a onclick="return confirm('Are You Sure To DELETE !');" href="">X</a></td>
								<?php } else{ ?>
								<td>N/A</td>
								<?php } ?>
							</tr>
							<?php } } ?>
							</table>
    		</div>
    	</div> 	
       <div class="clear"></div>
    </div>
 </div>
</div>
 
 <?php include_once 'inc/footer.php'; ?>
