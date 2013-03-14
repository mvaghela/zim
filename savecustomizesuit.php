<?php include("system/config.inc.php"); 
include("function/savecustomizesuit.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Bag |<?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
#fancybox-content {
	background:#FFF;
	padding:10px;
}
#fancybox-close{
	display:none !important;	
}
</style>

</head>
<body>
<div style="width:auto;" align="center">
	<div class="login_mainx" >
<?php if($_REQUEST['acn']=='savecust'){ ?>
		
			<form action="savecustomizesuit.php" method="post" >
			<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h1>Save Customize Name</h1>
					</div>
				</td>
			</tr>
			<tr>
				<td> Name :	</td>
				<td>  <input type="text" class="textinput"  name="textinput">	</td>
			</tr>

			<tr>
				<td colspan="3">
					<input type="submit" name="submit" class="btn" value="Submit" />
				</td>
			</tr>
		</table>
		</form>
<?php } ?>

<?php if($_REQUEST['acn']=='usedcustomizesuit'){ 

$category_sql="select * from `savesuitcustomize` where `userid` = '".$_SESSION['userid']."'";
$category=$obj_db->select($category_sql);
if($category) {
?>
		
			<form action="savecustomizesuit.php" method="post" >
			<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h1>Select Your Customize</h1>
					</div>
				</td>
			</tr>
			<tr>
				<td> Name :	</td>
				<td> <select style="float:left; width:auto;" name="option" class="styled categorycall">
						<option>----Select Your Customize----</option>
						<?php for($i=0;$i<count($category);$i++) { ?>
						<option value="<?php echo $category[$i]['savesuitcustomizeid']?>"><?php echo $category[$i]['customizename']?></option>
						<?php } ?>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="3">
					<input type="submit" name="submit" class="btn" value="Submit" />
				</td>
			</tr>
		</table>
		</form>
		<?php } else  { ?>
			<table>
			<tr>
				<td colspan="3">
					<div class="login_title">
						<h2>You have not saved any customization option for Suit!!</h2>
						<h2>so first select customize option and save it!!</h2>
					</div>
				</td>
			</tr>
			

			<tr>
				<td colspan="3">
					<center>
						<div class="add-to-bag" style="float:none;"><a href="suitcustomize.php?productid=<?php echo $_REQUEST['productid'];?>" >CUSTOMIZE</a></div>
					</center>
				</td>
			</tr>
		</table>
		<?php } ?>
<?php } ?>		
	</div>
</div>
</body>
</html>