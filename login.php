<?php include_once 'inc/header.php'; ?>
<?php 
include_once 'classes/Customer.php'; 

$cmr = new Customer();
?>
<?php 

$custlogin = Session::get("custlogin");
if ($custlogin==true) {
	header("Location:order.php");
}

 ?>
	<?php 

	if (isset($_POST['login'])) {
		
		$custLogin = $cmr ->customerLogin($_POST);
	}

	 ?>

 <div class="main">


    <div class="content">
    	 <div class="login_panel">
    	 <?php if (isset($custLogin)) {
    	 	echo $custLogin;
    	 } ?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" >
                	<input name="email" placeholder="Email" type="text">
                    <input name="password" placeholder="Password" type="password">
                    <div class="buttons"><div><button name="login" class="grey">Sign In</button></div></div>
                    </div>
                 </form>
	<?php 

	if (isset($_POST['register'])) {
		
		$customerReg = $cmr ->customerRegistration($_POST);
	}

	 ?>

    	<div class="register_account">
    	 <?php 

if (isset($customerReg)) {
	echo $customerReg;
}
?>		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address"/>
						</div>
		    		<div>
							<input type="text" name="country" placeholder="Country"/>
						</div>		        
	
		          		<div>
							<input type="text" name="phone" placeholder="Phone"/>
						</div>
				  
				  <div>
							<input type="text" name="password" placeholder="Password"/>
						</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button name="register" class="grey">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 <?php include_once 'inc/footer.php'; ?>