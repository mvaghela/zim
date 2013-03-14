<?php
include("system/config.inc.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
  $for="Slider Gallery";
//  $title=" Manage Photo Gallery";
  $title2="Image";
  $txt="Slider Gallery";
  $disname="Image Name";

include("function/slidergallery.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slider Photo Gallery | Zymba</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
</head>

<body>
<?php include("include/header.php");?>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />

	<script src="js/jquery.colorbox-min.js"></script>
    

 <?php if(isset($_REQUEST['id'])) { 
				  $user_sql="SELECT * FROM `slidergallery` WHERE `id`='".$_REQUEST['id']."' ";
				  $user_res=$obj_db->select($user_sql);

				  $album_sql="SELECT * FROM `album` WHERE `id`='".$user_res[0]['albumid']."' ";
				  $album_res=$obj_db->select($album_sql);
				  ?>
                  
			<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Add/Edit <?php echo $title2; ?></h2>
					
					<ul>
						
						<li><a href="slidergallery.php?page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>">Back to listing</a></li>
					</ul>
				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
				<table style="margin:25px;" cellpadding="5">
                                        <tr>
                                          <td><?php echo $disname; ?></td>
                                          <td>:</td>
                                          <td><input class="text small" type="text" name="title" value="<?php echo $user_res[0]['title'] ?>" /></td>
                                        </tr>
                                        <?php //if(isset($_REQUEST['id']) && $_REQUEST['id']=='addnew') {?>
                                        <?php //} else { ?>
										<tr>
                                          <td>Hypertext</td>
                                          <td>:</td>
                                          <td>
                                          <input type="text" class="text small" name="url" value="<?php echo $user_res[0]['url'] ?>"/>
                                          </td>
                                        </tr>                                        
                                        <?php //} ?>
                                      <tr>
                                          <td>Image</td>
                                          <td>:</td>
                                          <td><input class="text small"  type="file" name="image" value="<?php echo $user_res[0]['image'] ?>" />
                                          </td>
                                        </tr>
                                        <tr>
                                          <td>Status</td>
                                          <td>:</td>
                                          <td>Active :
                          <input type="radio"  checked="checked"  name="status" class="nobg" value="Active" />
                          &nbsp;&nbsp; Inactive :
                          <input type="radio" <?php if($user_res[0]['status']=="inactive") { ?>  checked="checked" <?php } ?> name="status" class="nobg"  value="inactive" /></td>
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
					
					$sqlcpont="SELECT count(id) AS `countno` FROM `slidergallery` ";
					$count = $obj_db->select($sqlcpont);
				  
					$sql="SELECT * FROM `slidergallery`  ORDER BY `id` DESC LIMIT $s1,$s2";
					$result=$obj_db->select($sql);
				  
				
				  ?>
			<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Slider Gallery</h2>
					
					<ul>
						
						<li><a href="slidergallery.php?id=addnew&albumid=<?php echo $_REQUEST['albumid'];?>">Add Image</a></li>
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
						?>
<!-- popup start -->

<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
    $(document).ready(function() {
      

        $("a[rel=example_group]").fancybox({
             'transitionIn'  : 'elastic',
			'transitionOut'  : 'elastic',
            
        });

      
    });
</script>          
<!-- popup end -->
					
					            <form action="" method="post">
                                      <input type="hidden" name="totalrow" value="<?php echo count($result); ?>" />
	                                  <input type="hidden" name="page" value="<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" />


                    <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                    <tr>
                                        <td width="15px" class="gridheaderbg"> <strong>#</strong> </td>
                                        <td width="80px" class="gridheaderbg"><strong>Image</strong></td>
                                        <td class="gridheaderbg"><strong><?php echo $disname; ?></strong></td>
                                        <td width="80px" class="gridheaderbg"><strong>url</strong></td>
                                        <td width="100px" class="gridheaderbg"><strong>Display Order</strong></td>
                                        <td width="80px" class="gridheaderbg" nowrap="nowrap"><strong>Status</strong></td>
                                        <td width="30px" class="gridheaderbg"> <strong>#</strong> </td>
                                    </tr>
                                      <?php for($i=0;$i<count($result); $i++) { 
									   
									  ?>
                                    <tr class="row0">
                                        <td class="nrlbg<?php echo ($i & 1); ?>" ><?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?></td>
                                        
                                        <td class="nrlbg<?php echo ($i & 1); ?>" >
											<?php if($result[$i]['image']!='') { ?>
                                            
                                            <a rel="example_group" href="upload/slidergallery/<?php echo $result[$i]['image']; ?>" title="<?php echo $result[$i]['title']; ?>">
                                              <img height="40px" src="upload/slidergallery/thumb/<?php echo $result[$i]['image']; ?>"></a>
                                            
                                            <?php } ?>
                                        </td>
                                        <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['title']; ?></td>
                                        <td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['url']; ?></td>
                                        
                                        <td class="nrlbg<?php echo ($i & 1); ?>">
                                            <input type="text" class="text small" style="width:35px; margin-left:20px; text-align:center" value="<?php echo $result[$i]['displayorder']; ?>" name="order<?php echo $i; ?>" />
                                            <input type="hidden" name="pid<?php echo $i; ?>" value="<?php echo $result[$i]['id']; ?>" />                                        
                                        </td>
                                        
                                        <td class="nrlbg<?php echo ($i & 1); ?>"><a href="slidergallery.php?change=<?php echo $result[$i]['id'].$condition; ?>&status=<?php echo $result[$i]['status']; ?>&page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><?php echo ucfirst($result[$i]['status']); ?></a></td>
                                        
                                        <td class="nrlbg<?php echo ($i & 1); ?>" style="white-space:nowrap;"><a href="slidergallery.php?id=<?php echo $result[$i]['id']; ?>&img=<?php echo $result[$i]['image'];?>&page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="slidergallery.php?del=<?php echo $result[$i]['id'] ?>&img=<?php echo $result[$i]['image'];?>&page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" OnClick="return confirm('Are you sure want to delete this Record?');"><img src="images/cross.png" /></a></td>
                                    </tr>
                                      <?php } ?>
                                          <tr>
                                          	<td class="nrlbg0" colspan="4">&nbsp;</td>
                                          	<td class="nrlbg0"><input type="submit" style="margin-left:21px;" name="submit" value="OK" class="submit long2" /></td>
                                            <td class="nrlbg0" colspan="2">&nbsp;</td>
                                          </tr>
                                    </table>
                         </form>         
				<div class="pagination right"><?php doPages($recordperpage, Removeword($current,"([p][a][g][e][=]\w*[&]*)") . checkurlconnectergiven(Removeword($current,"([p][a][g][e][=]\w*[&]*)")), "", $count[0]['countno']); ?></div>
                                    
				</div>		<!-- .block_content ends -->
			</div>
                <div class="bendl"></div>
                <div class="bendr"></div>
            </div>

             <?php } ?>   
              <?php include("include/footer.php");?>
</body>
</html>
