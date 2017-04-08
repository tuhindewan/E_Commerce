<?php include_once 'inc/header.php'; ?>

<?php 

$custlogin = Session::get("custlogin");
if ($custlogin==false) {
	header("Location:login.php");
}

 ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>ORDER PAGE</h2>
    		</div>
    	</div> 	
       <div class="clear"></div>
    </div>
 </div>
</div>
 
 <?php include_once 'inc/footer.php'; ?>
