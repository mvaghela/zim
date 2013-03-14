<?php
include("system/config.inc.php");
include("function/login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Login </title>
	
    <style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
    </style>
	
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->
<script type="text/javascript">
function validateForm()
{
var x=document.forms["loginform"]["uname"].value
if (x==null || x=="")
  {
  alert("User name must be filled out");
  return false;
  }
var x=document.forms["loginform"]["password"].value
if (x==null || x=="")
  {
  alert("Password must be filled out");
  return false;
  }  
}
</script>
</head>




<body>
	
	<div id="hld">
	
		<div class="wrapper">		<!-- wrapper begins -->
		
		
		
		
		
		
			
			
			
			
			
			
			
			<div class="block small center login">
			
				<div class="block_head" >
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Login</h2>
					<ul>
						<li><a href="http://www.zimba-customtailor.com/development/">back to the site</a></li>
					</ul>
				</div>		<!-- .block_head ends -->
				
				
				
				
				<div class="block_content" style="min-height:190px; ">
					
					
					
					<form action="login.php" onsubmit="return validateForm()"  name="loginform" method="post">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
                    <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
						<p>
							<label>Username:</label> <br />
							<input type="text" class="text" name="uname" value="" />
						</p>
						
						<p>
							<label>Password:</label> <br />
							<input type="password" class="text" name="password" value="" />
						</p>
						
						<p>
							<input type="submit" class="submit" name="submit" value="Login" /> &nbsp; 
							 
						</p>
					</form>
					
				</div>		<!-- .block_content ends -->
					
				<div class="bendl"></div>
				<div class="bendr"></div>
								
			</div>		<!-- .login ends -->
			
			
			
			
			
			
			
			
			
			
			
		
		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	
	
	<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.img.preload.js"></script>
	<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="js/facebox.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.tooltip.js"></script>
	<script type="text/javascript" src="js/jquery.select_skin.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="js/ajaxupload.js"></script>
	<script type="text/javascript" src="js/jquery.pngfix.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	
	
</body>
</html>