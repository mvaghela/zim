<?php
include("system/config.inc.php");
include("function/optiontype.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Option Type | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>


<body>
<?php include("include/header.php");?>

<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Manage Option Type</h2>
					<ul>
                         
						<li><a href="option.php">Back to Page</a></li>
					 <li><a href="optiontype.php?optiontypeid=addnew&optionid=<?php echo $_GET['optionid']; ?>">Add New</a></li>
					</ul>
				</div>	
				<div class="block_content">
					
                    <?php if($_REQUEST['msg']=="added") {
						echo '<div class="message success" style="display: block;"><p>Record Added Sucssesfully.</p></div>';
					}
						if($_REQUEST['msg']=="updated") {
							echo '<div class="message success" style="display: block;"><p> Record Updated Sucssesfully. </p></div>';
						}
						if($_REQUEST['msg']=="deleted") {
							echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Sucssesfully. </p></div>';
						}
						?>

<?php 
if(isset($_REQUEST['optiontypeid'])) { ?>
<form action="" method="post" enctype="multipart/form-data" name="testform">

<?php 
$user_sql="SELECT * FROM `optiontype` WHERE `optiontypeid`='".$_REQUEST['optiontypeid']."' ";
$user_res=$obj_db->select($user_sql);

?>
<div style="padding:10px; margin-left:20px;" class="inner" >
	Option Type  Name : 
	<input class="text small" style="width:250px;" type="text" name="scname" value="<?php echo $user_res[0]['optiontypename'] ?>" />
	&nbsp;&nbsp;
	
	UNIQ Name : 
	<input class="text small" style="width:250px;" type="text" name="uname" value="<?php echo $user_res[0]['uniqname'] ?>" />
	&nbsp;&nbsp;
	
	Status : 
	Active :<input type="radio"  checked="checked"  name="status" class="nobg" value="active" />
	&nbsp;&nbsp; Inactive :<input type="radio" <?php if($user_res[0]['status']=="inactive") { ?>  checked="checked" <?php } ?> name="status" 		 class="nobg"  value="inactive" />&nbsp;&nbsp;
	<input type="hidden" name="optionid" value="<?php echo $_REQUEST['optionid']; ?>" />
	<input type="hidden" name="optiontypeid" value="<?php echo $_REQUEST['optiontypeid']; ?>" />
	<input type="submit" name="submit" class="submit small" value="Submit" />
	<span style="padding-top:5px;">
		<a href="optiontype.php?optionid=<?php echo $_REQUEST['optionid'];?>" title="close">Close</a>
	</span>
</div>
</form>
<?php }  ?>



<?php 
		$current = Removemsg(selfURL());
		$currenturl = site_Encryption($current);
		$recordperpage = 10;
		if (isset($_REQUEST['page'])) {
			$page = $_REQUEST['page'];
			$s1 = $page * $recordperpage - $recordperpage;
			$s2 = $recordperpage;
		} else {
			$s1 = 0;
			$s2 = $recordperpage;
		}


	$sqlcpont="SELECT count(optiontype.optiontypeid) AS `countno` FROM `optiontype` WHERE optiontype.optionid=".$_REQUEST['optionid'].""; 
	$count = $obj_db->select($sqlcpont);

	$sql="SELECT optiontype.*,option.optionname FROM `optiontype`
	 		 LEFT OUTER JOIN `option` ON 
			 option.optionid =optiontype.optionid
			 WHERE optiontype.optionid=".$_REQUEST['optionid']." LIMIT $s1,$s2"; 
	$result=$obj_db->select($sql);
?> 

                                  <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                    
                                        <tr>
                                          <td class="gridheaderbg" width="30"> # </td>
                                          <td class="gridheaderbg"> <strong>Option Name</strong></td>
										  <td class="gridheaderbg"> <strong>Option Type Name</strong></td>
                                      	  <td class="gridheaderbg" width="100">Status</strong></td>
                                          <td class="gridheaderbg" width="55"> # </td>
                                        </tr>
										
                                        <?php for($i=0;$i<count($result); $i++) { ?>
                                        <tr class="row0">
                                          <td class="nrlbg<?php echo ($i & 1); ?>"> <?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?> </td>
                                          <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['optionname']; ?></td>
										<td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['optiontypename']; ?></td>
                                      
									  <td class="nrlbg<?php echo ($i & 1); ?>"><a href="optiontype.php?change=<?php echo $result[$i]['optiontypeid'];?>&optionid=<?php echo $result[$i]['optionid'] .$condition; ?>&status=<?php echo $result[$i]['status']; ?>&page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><?php echo ucfirst($result[$i]['status']); ?></a></td>                                       
									   <td class="nrlbg<?php echo ($i & 1); ?>">
    					 <a href="optiontype.php?optionid=<?php echo $result[$i]['optionid']; ?>&optiontypeid=<?php echo $result[$i]['optiontypeid']; ?>"><img src="images/edit.png" /></a>
    &nbsp;&nbsp;&nbsp;<a href="optiontype.php?del=<?php echo $result[$i]['optiontypeid'] ?>&optionid=<?php echo $result[$i]['optionid'] ?>" OnClick="return confirm('Are you sure want delete this Record?');"><img src="images/cross.png" /></a></td>
									   
                                            </tr>
                                         <?php } ?> 
										 <tr>
						<td colspan="5">
							<div class="pagination right" style="padding-top: 10px;">
								<?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?>
							</div>
						</td>
					</tr>
                                    </table>
                                    
				</div>		<!-- .block_content ends -->
			                <div class="bendl"></div>
                <div class="bendr"></div>
            </div>
              <?php include("include/footer.php");?>
</body>
</html>
