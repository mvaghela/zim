<?php
include("system/config.inc.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
}
include("function/measurement.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Product |<?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="jscolor/jscolor.js"></script>
</head>
<body>
<?php include("include/header.php");?>
		<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script> 
		<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		<script type="text/javascript">
	$(document).ready(function() {
		$("#ajax").fancybox();
		$("#fancybox-close").click(function(){
			location.reload();	
		});
		$("#fancybox-overlay").click(function(){
			location.reload();	
		});
	});
</script>
		<?php
				  $user_sql="SELECT * FROM `measurements` WHERE `for`='".$_REQUEST['for']."' AND `type`='".$_REQUEST['type']."' "; 
				  $user_res=$obj_db->select($user_sql);
?>
		<div class="block">
			<div class="block_head">
				<div class="bheadl"></div>
				<div class="bheadr"></div>
				<h2>Edit Measurement</h2>				
			</div>
			<div class="block_content">
            <?php if($_REQUEST['msg']=="added") {
				echo '<div class="message success" style="display: block;"><p>Record Added Successfully.</p>
				</div>';
				}
				if($_REQUEST['msg']=="updated") {
					echo '<div class="message success" style="display: block;"><p> Record Updated Successfully. </p>
					</div>';
				}
				if($_REQUEST['msg']=="deleted") {
					echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Successfully. </p>
					</div>';
				}
			?>
            
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
                    <input type="hidden" name="for" value="<?php echo $_REQUEST['for']?>" />
                    <input type="hidden" name="type" value="<?php echo $_REQUEST['type']?>" />
					<table style="margin:25px;" cellpadding="5">
						<tr>
							<td>Title</td>
							<td>:</td>
							<td>
								<input class="text small" type="text" name="title" value="<?php echo stripslashes($user_res[0]['title']) ?>" />
							</td>
						</tr>                       
                        <script type="text/javascript">
							$(document).ready(function()
							{
								<?php if($user_res[0]['video_link']!='' && $user_res[0]['youtubevideo']=='yes'){ ?>
									$(".youtubevideo").show();
									$(".selfvideo").hide();
								<?php } ?>								
								$('#youtube').click(function() {
								if (this.checked) {
									$(".selfvideo").hide();
									$(".youtubevideo").show();
								} else {
									$(".youtubevideo").hide();
									$(".selfvideo").show();									
								}
							});
							});
						</script>
						<tr>
							<td>Video Type</td>
							<td>:</td>
							<td>
								You Tube Video <input type="checkbox" name="youtube" id="youtube" value="yes" <?php if($user_res[0]['youtubevideo']=='yes'){?> checked="checked" <?php }?>/>&nbsp;&nbsp;&nbsp;
                                <!--Self Hosted Video <input type="radio" name="video" id="self" value="selfhosted" />&nbsp;&nbsp;&nbsp;-->
							</td>
						</tr>
						<tr>
							<td> Video </td>
							<td>:</td>
							<td>
                            	<div class="youtubevideo" style="display:none;">
                                	<textarea name="video_link" style="width:415px;"><?php echo stripslashes($user_res[0]['video_link']); ?></textarea> <br />                               	
                                	Enter YouTube video link here
                                </div>
                                <div class="selfvideo">
                                	<input type="file" name="video" value=""/> 
                                    <input type="hidden" name="vid" value="<?php echo $user_res[0]['video']; ?>" />                              	
                                </div>
							</td>
						</tr>                        
						<tr>
							<td>Image 1</td>
							<td>:</td>
							<td>
								<input type="file" name="image1" value="" />
                                <input type="hidden" name="img1" value="<?php echo $user_res[0]['image1']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 1</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description1" value="<?php echo stripslashes($user_res[0]['image_desc_1']); ?>" />                                
							</td>
						</tr>
                        <tr>
							<td>Image 2</td>
							<td>:</td>
							<td>
								<input type="file" name="image2" value="" />
                                <input type="hidden" name="img2" value="<?php echo $user_res[0]['image2']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 2</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description2" value="<?php echo stripslashes($user_res[0]['image_desc_2']); ?>" />
							</td>
						</tr>
                        <tr>
							<td>Image 3</td>
							<td>:</td>
							<td>
								<input type="file" name="image3" value="" />
                                <input type="hidden" name="img3" value="<?php echo $user_res[0]['image3']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 3</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description3" value="<?php echo stripslashes($user_res[0]['image_desc_3']); ?>" />
							</td>
						</tr>
						<?php if($_REQUEST['for']=='body-shape' || $_REQUEST['for']=='shirt-fit' || $_REQUEST['for']=='pant-fit' || $_REQUEST['for']=='pant-waist-image'){?>
						<tr>
							<td>Image 4</td>
							<td>:</td>
							<td>
								<input type="file" name="image4" value="" />
                                <input type="hidden" name="img4" value="<?php echo $user_res[0]['image4']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 4</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description4" value="<?php echo stripslashes($user_res[0]['image_desc_4']); ?>" />
							</td>
						</tr>	
						<tr>
							<td>Image 5</td>
							<td>:</td>
							<td>
								<input type="file" name="image5" value="" />
                                <input type="hidden" name="img5" value="<?php echo $user_res[0]['image5']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 5</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description5" value="<?php echo stripslashes($user_res[0]['image_desc_5']); ?>" />
							</td>
						</tr>	
						<tr>
							<td>Image 6</td>
							<td>:</td>
							<td>
								<input type="file" name="image6" value="" />
                                <input type="hidden" name="img6" value="<?php echo $user_res[0]['image6']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 6</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description6" value="<?php echo stripslashes($user_res[0]['image_desc_6']); ?>" />
							</td>
						</tr>	
						<tr>
							<td>Image 7</td>
							<td>:</td>
							<td>
								<input type="file" name="image7" value="" />
                                <input type="hidden" name="img7" value="<?php echo $user_res[0]['image7']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 3</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description7" value="<?php echo stripslashes($user_res[0]['image_desc_7']); ?>" />
							</td>
						</tr>	
						<tr>
							<td>Image 8</td>
							<td>:</td>
							<td>
								<input type="file" name="image8" value="" />
                                <input type="hidden" name="img8" value="<?php echo $user_res[0]['image8']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 8</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description8" value="<?php echo stripslashes($user_res[0]['image_desc_8']); ?>" />
							</td>
						</tr>	
						<tr>
							<td>Image 9</td>
							<td>:</td>
							<td>
								<input type="file" name="image9" value="" />
                                <input type="hidden" name="img9" value="<?php echo $user_res[0]['image9']; ?>" />
							</td>
						</tr>
						<tr>
							<td>Description 9</td>
							<td>:</td>
							<td>
								<input type="text" class="text" name="description9" value="<?php echo stripslashes($user_res[0]['image_desc_9']); ?>" />
							</td>
						</tr>
						<?php }?>							
						<tr>
							<td valign="top">Title Discription</td>
							<td valign="top">:</td>
							<td>
								<textarea id="discription" name="discription"><?php echo stripslashes($user_res[0]['description']); ?></textarea>
								<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'discription',
                {
					filebrowserBrowseUrl :'ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserImageBrowseUrl : 'ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserFlashBrowseUrl :'ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});

			//]]>
			</script> 
							</td>
						</tr>					
					</table>
					<hr />
					<input type="submit" name="submit" class="submit long" value="Edit Measurement" />
					</td>
					<div style="clear:both;">&nbsp;</div>
				</form>
			</div>
			<div class="bendl"></div>
			<div class="bendr"></div>
		</div>		
		<?php include("include/footer.php");?>
</body>
</html>
