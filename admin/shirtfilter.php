<?php
include("system/config.inc.php");
//include("function/shirtfilter.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 

if(isset($_REQUEST['change'])) {
 
   if($_REQUEST['status']=='active')
   {
  $del_status="UPDATE `filter` SET `status` = 'inactive'  WHERE `optionid` = '".$_REQUEST['change']."'"; 
  
   $status_cat=$obj_db->sql_query($del_status);
   } else {
$del_status="UPDATE `filter` SET `status` = 'active'  WHERE `optionid` = '".$_REQUEST['change']."'";
   $status_cat=$obj_db->sql_query($del_status);
   }
   header("location:shirtfilter.php?msg=updated&page=".$_REQUEST['page']); 
   die();
 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Shirt Filter | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
<?php include("include/header.php");
		 $current = Removeword(selfURL(),"([m][s][g][=]\w*[&]*)");
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
		$sqlcpont="SELECT count(optionid) AS `countno` FROM `filter` ";
		$count = $obj_db->select($sqlcpont);
		
		$sql="SELECT * FROM `filter` ORDER BY `optionid` ASC LIMIT $s1,$s2";
		$result=$obj_db->select($sql);
?>

<div class="block">
			<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
							<h2>Manage Shirt Filter</h2>
				</div>
				
				<div class="block_content">


			<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="totalrow" value="<?php echo $count[0][0]; ?>" />
			    <input type="hidden" name="page" value="<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" />

                                  <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                    
                                        <tr>
                                          <td class="gridheaderbg" width="30"> # </td>
                                          <td class="gridheaderbg"> <strong>Option Name</strong></td>
                                      	  <td class="gridheaderbg" width="100">Status</strong></td>
                                        </tr>
										
                                        <?php for($i=0;$i<count($result); $i++) { ?>
                                        <tr class="row0">
                                          <td class="nrlbg<?php echo ($i & 1); ?>"> <?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?> </td>
                                          <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['optionname']; ?></td>
									
									   <td class="nrlbg<?php echo ($i & 1); ?>"><a href="shirtfilter.php?change=<?php echo $result[$i]['optionid'].$condition; ?>&status=<?php echo $result[$i]['status']; ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><?php echo ucfirst($result[$i]['status']); ?></a></td>

                                            </tr>
                                         <?php } ?> 
					<tr>
						<td colspan="7">
							<div class="pagination right" style="padding-top: 10px;">
								<?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?>
							</div>
						</td>
					</tr>

                                    </table>
							</form>
                                    
				</div>		<!-- .block_content ends -->
			                <div class="bendl"></div>
                <div class="bendr"></div>
            </div>
              <?php include("include/footer.php");?>
</body>
</html>
