<?php include("system/config.inc.php");
include("function/pages.php");
include("function/login1.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Account Settings</title>
</head>
<body>
<?php include('include/header.php'); ?>
<div class="topbg">
	<div class="wrapper">
		<div class="inner-title">
						<ul>
							<li class="first"><a>Account Settings</a></li>
							<li class="last"><a>Create an Account</a></li>
						</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<!--<div class="inner-title">
				<ul>
                	<li><a>Account Settings</a></li>
					<li class="last"><a>Create an Account</a></li>
				</ul>
			</div>-->
            <script language="javascript">
				jQuery(document).ready(function(){
					jQuery("#account_form").validationEngine();
				});
			</script>
			<div class="filter-fabric">
				<div class="setting_left">
                	<div class="instr">
                    	<div class="instr_title">
                        	Custom Made
                        </div>
                        <div class="instr_desc">
                        	If you have any question about our custom made policy, you may <a href="#">contact us</a>.
                        </div>
                    </div>                    
                    <div class="instr">
                    	<div class="instr_title">
                        	Need help?
                        </div>
                        <div class="instr_desc">
                        	If you have any question or need help with your account, you may contact us to assist you<br /><a href="#">contact us</a>
                        </div>
                    </div>                    
                    <div class="instr">
                    	<div class="instr_title">
                        	Zymba Customer Service
                        </div>
                        <div class="instr_desc">
                        	Our customer service representative are always there to help you 24x7 365 days a year.
                        </div>
                    </div>
                </div>
                <div class="setting_center">
                	<div class="middle_form_box">
                    	<div class="middle_title">
                        	Returning Customers
                        </div>
                        <div class="middle_form">
                        	<form id="account_form" method="post">
                            	Email Address<span>*</span><br />
                                <input type="text" name="email" class="login_text validate[required,maxSize[250],custom[email]]"  /><br /><br />
                                password<span>*</span><br />
                                <input type="password" name="password" class="login_text validate[required,maxSize[250]]" /><br /><br />
                                <div class="check">
                                	<input type="checkbox" name="remember" /> Remember me<br />
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="login_button">
                                	<input type="submit" name="submit" class="btn" value="login"/>
                                </div>
                             </form>
                        </div>
                    </div>
                    
                    <div class="middle_form_box">
                    	<div class="middle_title">
                        	New Customers
                        </div>
                        <div class="middle_form">
							<div class="middle_form_inner_data">
		                        	You can checkout without creating an Account, You'll have a chance to create an Account letter. 
        					</div>                                                  	
                                <div class="login_button">
                                	<a href="shipping.php" class="btn">Continue Checkout</a>
                                </div>
                             
                        </div>
                    </div>
                </div>
                <div class="setting_right">
                	<div class="new_customers">
                    	<div class="customers_title">
                        	New Customers
                        </div>
                        <div class="customers_desc">
                        	Creating an account is easy, just fill in the Form on next page and enjoy the benefits of having an account. 
                        </div>
                    </div>
                    
                    <div class="new_customers">
                    	<div class="customers_title">
                        	New Customers
                        </div>
                        <div class="customers_desc">
                        	By creating an account you will have access to:
                            	<ul>
                                	<li>Saving Customization profile</li>
                                    <li>Saving Measurement Profile</li>
                                    <li>Online Order Tracking</li>
                                </ul> 
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>