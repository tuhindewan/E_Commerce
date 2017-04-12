<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../helpers/Format.php");
include_once ($filepath."/../classes/Cart.php");
include_once ($filepath."/../lib/Database.php");
?>
<?php 
$ct = new Cart();
$fm = new Format();
if (isset($_GET['cmrId'])) {
	$id = $_GET['cmrId'];
	$time = $_GET['time'];

	$shifted = $ct->shiftProduct($id,$time);
}
?>
<?php 

if (isset($_GET['delId'])) {
	$delId = $_GET['delId'];
	$time = $_GET['time'];

	$delshifted = $ct->delshiftProduct($delId,$time);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
                <?php if (isset($shifted)) {
                	echo $shifted;
                } ?> 
                <?php 

                if (isset($delshifted)) {
                	echo $delshifted;
                }

                 ?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ProductID</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Cust. ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
	
					$getOrder = $ct->getAllOrderProduct();
					if ($getOrder) {
						while ($result = $getOrder->fetch_assoc()) {

					 ?>
						<tr class="odd gradeX">
							<td><?php echo $result['productId']; ?></td>
							<td><?php echo $result['date']; ?></td>
							<td><?php echo $result['productName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td>$<?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">View Details</a></td>
							<?php 
							if ($result['status']=='0') { ?>

								<td><a href="?cmrId=<?php echo $result['cmrId'];?>&time=<?php echo $result['date'];?>">Shifted</a></td>
							 <?php } elseif($result['status']=='1') {?>

							<td>Pending</td>
							<?php }else{  ?>

									<td><a href="?delId=<?php echo $result['cmrId'];?>&time=<?php echo $result['date'];?>">Remove</a></td>
							<?php }  ?>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
