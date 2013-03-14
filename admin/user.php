<?php
include("system/config.inc.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 

  $for="Service";

  $title=" Manage User";
  $title2="User";
  $txt="User";
  $disname="User";

include("function/user.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Manage Service | <?php echo $sitename; ?> </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	</head>

<body>
<?php include("include/header.php");?>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />

	<script src="js/jquery.colorbox-min.js"></script>
 <?php if(isset($_REQUEST['id'])) { 
				  $user_sql="SELECT * FROM `user` WHERE `userid`='".$_REQUEST['id']."' ";
				  $user_res=$obj_db->select($user_sql);
				  ?>
                  
<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Add/Edit <?php echo $title2; ?></h2>
					
					<ul>
						<?php if($_REQUEST['acn']=='order') { ?>
                        <li><a href="order.php">Back to listing</a></li>
                        <?php } else { ?>
                        <li><a href="user.php<?php echo $condition2; ?>">Back to listing</a></li>
                        <?php } ?>
						
					</ul>
				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
                    <input type="hidden" name="oldstatus" value="<?php echo $user_res[0]['status']; ?>"  />
				<table style="margin:25px;" cellpadding="5">
                                        <tr>
                                          <td>First name</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="firstname" value="<?php echo $user_res[0]['firstname'] ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td>Last name</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="lastname" value="<?php echo $user_res[0]['lastname'] ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td>Password</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="password" value="<?php echo $user_res[0]['password'] ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td>Email</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="email" value="<?php echo $user_res[0]['email'] ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td>Phone</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="phone" value="<?php echo $user_res[0]['phone'] ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td>Birthday</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="birthday" value="<?php echo $user_res[0]['birthday'] ?>" /></td>
                                        </tr>
                                        <tr>
                                          <td>Gender </td>
                                          <td>:</td>
                                          <td><select id="gender"  class="styled validate[required]" name="gender">
                         <option value="">---- Select ----</option>
                        <option <?php if($user_res[0]['gender']=='male') { ?> selected="selected" <?php } ?> value="male">Male</option>
                        <option <?php if($user_res[0]['gender']=='female') { ?> selected="selected" <?php } ?> value="female">Female</option>
                      </select></td>
                                        </tr>
                                       
                                        
                                        
                                         <tr>
                                          <td>Address</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="address" value="<?php echo $user_res[0]['address'] ?>" /></td>
                                        </tr>
                                        
                                         <tr>
                                          <td>State</td>
                                          <td>:</td>
                                          <td> <input class="text small" type="text" name="state" value="<?php echo $user_res[0]['state'] ?>" />
                                          
                                          </td>
                                        </tr>
                                          <tr>
                                          <td>Country</td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="country" value="<?php echo $user_res[0]['country'] ?>" /></td>
                                        </tr>
                                       
                                        <tr>
                                          <td>Status</td>
                                          <td>:</td>
                                          <td>Active :
                          <input type="radio"  checked="checked"  name="status" class="nobg" value="active" />
                          &nbsp;&nbsp; Inactive :
                          <input type="radio" <?php if($user_res[0]['status']=="inactive") { ?>  checked="checked" <?php } ?> name="status" class="nobg"  value="inactive" /> &nbsp;&nbsp; Block :
                          <input type="radio" <?php if($user_res[0]['status']=="block") { ?>  checked="checked" <?php } ?> name="status" class="nobg"  value="block" /></td>
                                        </tr>
                                        
                                        
                                      </table>
                                        <hr />
                                        
                                        <input type="submit" name="submit" class="submit long" value="Add/Edit <?php echo $title2;?>" /></td>
                                  <div style="clear:both;">&nbsp;</div>
                	
					</form>
                    
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>
            <?php } else { 
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
					$sqlcpont="SELECT count(userid) AS `countno` FROM `user` ";
					$count = $obj_db->select($sqlcpont);
				  
				  $sql="SELECT * FROM `user`  ORDER BY `userid` DESC LIMIT $s1,$s2";
				  $result=$obj_db->select($sql);
				  
				
				  ?>
<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2><?php echo  $title; ?></h2>
					
					<ul>
						
						<li><a href="user.php?id=addnew<?php echo $condition; ?>">Add Record</a></li>
					</ul>
				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
					
                    <?php if($_REQUEST['msg']=="added") {
						echo '<div class="message success" style="display: block;"><p>Record Added Successfully.</p></div>';
					}
						if($_REQUEST['msg']=="updated") {
							echo '<div class="message success" style="display: block;"><p> Record Updated Successfully. </p></div>';
						}
						if($_REQUEST['msg']=="deleted") {
							echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Successfully. </p></div>';
						}
						if($_REQUEST['msg']=="2") {
							echo '<div class="message errormsg" style="display: block;"><p>Email Alredy Exist. </p></div>';
						}
						?>
                	

                    <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                      <tr>
                                        <td class="gridheaderbg"> # </td>
                                       
                                       <td class="gridheaderbg"><strong>Name</strong></td>
                                          <td class="gridheaderbg"><strong>Password</strong></td>
                                          <td class="gridheaderbg"><strong>Email</strong></td>
                                          <td class="gridheaderbg"><strong>Phone</strong></td>
                                          <td class="gridheaderbg"><strong>Join Date</strong></td>
                                         <td class="gridheaderbg" nowrap="nowrap"><strong>Status</strong></td>
                                        <td class="gridheaderbg"> <strong>#</strong> </td>
                                      </tr>
                                      <?php for($i=0;$i<count($result); $i++) { 
									   
									  ?>
                                        <script>
											$(document).ready(function(){
												$("a[rel='viewimahe<?php echo $i; ?>']").colorbox({slideshow:true});
											});
										</script>


                                      <tr class="row0">
                                        <td class="nrlbg<?php echo ($i & 1); ?>" ><?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?></td>
                                     <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['firstname']." ".$result[$i]['lastname']; ?></td>
                                      <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['password']; ?></td>
                                     <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['email']; ?></td>
                                     <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['phone']; ?></td>
                                     <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['registrationdate']; ?></td>
                                 
                                     
                                       
                                            
                                        
                                         <td class="nrlbg<?php echo ($i & 1); ?>"><?php echo ucfirst($result[$i]['status']); ?></td>
                                        <td class="nrlbg<?php echo ($i & 1); ?>" style="white-space:nowrap;"><a href="user.php?id=<?php echo $result[$i]['userid'].$condition; ?>"><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="user.php?del=<?php echo $result[$i]['userid'] ?>&amp;img=<?php echo $result[$i]['image'].$condition; ?>" OnClick="return confirm('Are you sure want to delete this Record?');"><img src="images/cross.png" /></a></td>
                                      </tr>
                                      <?php } ?>
                                          
                                    </table>
	
<div class="pagination right"><?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?></div>
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>

             <?php } ?>   
              <?php include("include/footer.php");?>
</body>
</html>
