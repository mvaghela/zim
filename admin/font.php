<?php
include("system/config.inc.php");
include("function/font.php");
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
<title>Manage Option | <?php echo $sitename; ?></title>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="jscolor/jscolor.js"></script>



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
		$sqlcpont="SELECT count(id) AS `countno` FROM `monogramfont` ";
		$count = $obj_db->select($sqlcpont);
		
		$sql="SELECT * FROM `monogramfont` ORDER BY `id` DESC LIMIT $s1,$s2";
		$result=$obj_db->select($sql);
?>

<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
							<h2>Manage</h2>
							<ul>
								<li>
									<a href="monogram.php">back</a>
								</li>
								
								<li>
									<a href="font.php?optionid=addnew">Add</a>
								</li>
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
		if(isset($_REQUEST['optionid'])) { ?>
		<form action="" method="post" enctype="multipart/form-data" name="testform">
			<?php 
				$user_sql="SELECT * FROM `monogramfont` WHERE `id`='".$_REQUEST['optionid']."' ";
				$user_res=$obj_db->select($user_sql);
			?>
			<div style="padding:10px; margin-left:20px;" class="inner" >
				Name :
				<input class="text small" style="width:250px;" type="text" name="cname" value="<?php echo $user_res[0]['name'] ?>" />
				&nbsp;&nbsp; &nbsp; &nbsp;
				File(.ttf file only) :
				<input type="file" name="font" value="" />
<!--<input type="text" class="cp-input" value="rgb(123,42,87)"/>-->	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		
				<input type="hidden" name="for" value="<?php echo $_REQUEST['for']; ?>" />
				<input type="hidden" name="optionid" value="<?php echo $_REQUEST['optionid']; ?>" />
				<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
				<input type="submit" name="submit" class="submit small" value="Submit" />
				<a href="font.php" title="close">Close</a>
			</div>
		</form>

<?php }  ?>

                                  <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                    
                                        <tr>
                                          <td class="gridheaderbg" width="30"> # </td>
                                          <td class="gridheaderbg"> <strong>Font Name</strong></td>
                                          <td class="gridheaderbg" width="55"> # </td>
                                        </tr>
										
                                        <?php for($i=0;$i<count($result); $i++) { ?>
                                        <tr class="row0">
                                          <td class="nrlbg<?php echo ($i & 1); ?>"> <?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?> </td>
                                          <td class="nrlbg<?php echo ($i & 1); ?>" nowrap="nowrap"><?php echo $result[$i]['name']; ?></td>
									
									  
	
	<td class="nrlbg<?php echo ($i & 1); ?>"  style="white-space:nowrap;"><a href="font.php?optionid=<?php echo $result[$i]['id']; ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="font.php?del=<?php echo $result[$i]['id'] ?>&amp;font=<?php echo $result[$i]['font'] ?>&amp;page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" OnClick="return confirm('Are you sure want delete this record?');"><img src="images/cross.png" /></a></td>
									   
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
                                    
				</div>		<!-- .block_content ends -->
			                <div class="bendl"></div>
                <div class="bendr"></div>
            </div>
              <?php include("include/footer.php");?>
</body>
</html>
