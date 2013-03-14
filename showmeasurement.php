<?php include("system/config.inc.php");
include("function/showmeasurement.php");
$sql="SELECT * FROM `".$_REQUEST['type']."_measurements` WHERE `measurement_id`='".$_REQUEST['id']."' AND `user_id`=".$_SESSION['userid'].""; 
$result=$obj_db->select($sql);

$select_iamges="SELECT * FROM `measurements`";
$measurements=$obj_db->select($select_iamges);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/jquery.stepy.css" />

<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>

<title>Show Measurement</title>
<style type="text/css">
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
#fancybox-content {
	background:#FFF;
	padding:10px;
	overflow: scroll hidden !important;
}
#fancybox-close{
	display:none !important;	
}
</style>
</head>
<body>
<script type="text/javascript">
	  jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#custom").validationEngine();
	});
</script>
<div class="step" style="width:1034px;">	
	<div class="login_main" id="register">
			<?php if($_REQUEST['type']=='shirt'){?>				
			<div>&nbsp;</div>
				<fieldset>
				<?php if($_REQUEST['image']=='image'){?>
				 <legend><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></legend>
                <form action="showmeasurement.php" method="post" name="measurement" id="custom">
					<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
					<input type="hidden" name="col" value="<?php echo $_REQUEST['col'];?>" />

					<div class="measurement-image-div">
                    	<div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[$_REQUEST['row']]['image1'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>"  width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_1']);?></p>
                        	<center><input type="radio" name="length" value="high" <?php if($result[0][$_REQUEST['col']]=='high') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[$_REQUEST['row']]['image2'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_2']);?></p>
                        	<center><input type="radio" name="length" value="medium" <?php if($result[0][$_REQUEST['col']]=='medium') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[$_REQUEST['row']]['image3'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_3']);?></p>
							<center><input type="radio" name="length" value="low" <?php if($result[0][$_REQUEST['col']]=='low') { ?> checked="checked" <?php } ?>/></center>
                         </div>
						 
						 <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[$_REQUEST['row']]['image4'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>"  width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_4']);?></p>
                        	<center><input type="radio" name="length" value="slim" <?php if($result[0][$_REQUEST['col']]=='slim') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[$_REQUEST['row']]['image5'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_5']);?></p>
                        	<center><input type="radio" name="length" value="normal" <?php if($result[0][$_REQUEST['col']]=='normal') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[$_REQUEST['row']]['image6'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_6']);?></p>
							<center><input type="radio" name="length" value="loose" <?php if($result[0][$_REQUEST['col']]=='loose') { ?> checked="checked" <?php } ?>/></center>
                         </div>
						 
						  <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[$_REQUEST['row']]['image7'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>"  width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_7']);?></p>
                        	<center><input type="radio" name="length" value="big" <?php if($result[0][$_REQUEST['col']]=='big') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[$_REQUEST['row']]['image8'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_8']);?></p>
                        	<center><input type="radio" name="length" value="med" <?php if($result[0][$_REQUEST['col']]=='med') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[$_REQUEST['row']]['image9'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_9']);?></p>
							<center><input type="radio" name="length" value="small" <?php if($result[0][$_REQUEST['col']]=='small') { ?> checked="checked" <?php } ?>/></center>
                         </div>
						 
						  <div class="submit_btn" style="float:left; margin-top:40px;margin-left:40px; ">
							  	<input type="submit" class="btn" name="submit" value="Modify Measurement" />
						  </div>
						</div>
				
				</form> 
				<?php } else {  ?>
                <legend><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></legend>
                <form action="showmeasurement.php" method="post" name="measurement" id="custom">
					<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
					<input type="hidden" name="col" value="<?php echo $_REQUEST['col'];?>" />
					<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></h1>
                              <?php echo stripslashes($measurements[$_REQUEST['row']]['description']);?>
							  
							  <script type="text/javascript">

                              	$(document).ready(function() {
									
									$("#slider").slider({
										range: "min",
										value: <?php echo $result[0][$_REQUEST['col']]?>,
										step: 10,
										min: 0,
										max: 500,
										slide: function( event, ui ) {
											$( "#length" ).val( ui.value );
										}
									});
									//$("#slider").slider("<?php echo $result[0][$_REQUEST['col']]?>");
									$("#length").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider").slider("value", parseInt(value));
										if(value==0) {
												var value = 0;
												//alert(value);
												$( "#length" ).val(0);
												console.log(value);
												$("#slider").slider("value", parseInt(value));
										}
									});
								});
							</script>
							
                              <div class="add-measurement">
							  <div id="slider"></div>
                              	<label><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></label>
                                <input type="text" class="validate[required,maxSize[4],custom[number]]" name="length" id="length" value="<?php echo $result[0][$_REQUEST['col']]?>"/>
                              </div>
                              
							  <div class="submit_btn" style="float:left; margin-top:40px;">
							  	<input type="submit" class="btn" name="submit" value="Modify Measurement" />
						  </div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[$_REQUEST['row']]['youtubevideo']=='yes'){ 
								echo $measurements[$_REQUEST['row']]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[$_REQUEST['row']]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div> 
					</form>  
					<?php }?>                
              </fieldset>
			<?php }?>
			<?php if($_REQUEST['type']=='pant'){?>
			<div>&nbsp;</div>				
				<fieldset>
				
				<?php if($_REQUEST['image']=='image'){?>
				 <legend><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></legend>
                <form action="showmeasurement.php" method="post" name="measurement" id="custom">
					<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
					<input type="hidden" name="col" value="<?php echo $_REQUEST['col'];?>" />

					<div class="measurement-image-div">
                    	<div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[$_REQUEST['row']]['image1'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>"  width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_1']);?></p>
                        	<center><input type="radio" name="length" value="high" <?php if($result[0][$_REQUEST['col']]=='high') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[$_REQUEST['row']]['image2'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_2']);?></p>
                        	<center><input type="radio" name="length" value="medium" <?php if($result[0][$_REQUEST['col']]=='medium') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[$_REQUEST['row']]['image3'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_3']);?></p>
							<center><input type="radio" name="length" value="low" <?php if($result[0][$_REQUEST['col']]=='low') { ?> checked="checked" <?php } ?>/></center>
                         </div>
						 
						 <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[$_REQUEST['row']]['image4'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>"  width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_4']);?></p>
                        	<center><input type="radio" name="length" value="slim" <?php if($result[0][$_REQUEST['col']]=='slim') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[$_REQUEST['row']]['image5'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_5']);?></p>
                        	<center><input type="radio" name="length" value="normal" <?php if($result[0][$_REQUEST['col']]=='normal') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[$_REQUEST['row']]['image6'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_6']);?></p>
							<center><input type="radio" name="length" value="loose" <?php if($result[0][$_REQUEST['col']]=='loose') { ?> checked="checked" <?php } ?>/></center>
                         </div>
						 
						  <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[$_REQUEST['row']]['image7'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>"  width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_7']);?></p>
                        	<center><input type="radio" name="length" value="big" <?php if($result[0][$_REQUEST['col']]=='big') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[$_REQUEST['row']]['image8'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_8']);?></p>
                        	<center><input type="radio" name="length" value="med" <?php if($result[0][$_REQUEST['col']]=='med') { ?> checked="checked" <?php } ?>/></center>
						 </div>
                         <div class="measurement-image" style="margin-left:18px !important; margin-right:30px !important;width:150px">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[$_REQUEST['row']]['image9'];?>" alt="<?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?>" width="150px"/>
                         	<p><?php echo stripslashes($measurements[$_REQUEST['row']]['image_desc_9']);?></p>
							<center><input type="radio" name="length" value="small" <?php if($result[0][$_REQUEST['col']]=='small') { ?> checked="checked" <?php } ?>/></center>
                         </div>
						 
						  <div class="submit_btn" style="float:left; margin-top:40px;margin-left:40px; ">
							  	<input type="submit" class="btn" name="submit" value="Modify Measurement" />
						  </div>
						</div>
				
				</form> 
				<?php } else {  ?>
				
                <legend><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></legend>
                <form action="showmeasurement.php" method="post" name="measurement" id="custom">
					<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
					<input type="hidden" name="col" value="<?php echo $_REQUEST['col'];?>" />
					<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></h1>
                              <?php echo stripslashes($measurements[$_REQUEST['row']]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									
									$("#slider").slider({
										range: "min",
										value: <?php echo $result[0][$_REQUEST['col']]?>,
										step: 10,
										min: 0,
										max: 500,
										slide: function( event, ui ) {
											$( "#length" ).val( ui.value );
										}
									});
									//$("#slider").slider("<?php echo $result[0][$_REQUEST['col']]?>");
									$("#length").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider").slider("value", parseInt(value));
										if(value==0) {
												var value = 0;
												//alert(value);
												$( "#length" ).val(0);
												console.log(value);
												$("#slider").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider"></div>
                              	<label><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></label>
                                <input type="text" class="validate[required,maxSize[4],custom[number]]" name="length" id="length" value="<?php echo $result[0][$_REQUEST['col']]?>"/>
                              </div>
                               
							    <div class="submit_btn" style="float:left; margin-top:40px; ">
							 		<input type="submit" class="btn" name="submit" value="Modify Measurement" />
						  		</div>
							  
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[$_REQUEST['row']]['youtubevideo']=='yes'){ 
								echo $measurements[$_REQUEST['row']]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[$_REQUEST['row']]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div> 
					</form>     
					<?php }?>              
              </fieldset>		
			<?php }?>
			<?php if($_REQUEST['type']=='blazer'){?>
			<div>&nbsp;</div>						
				<fieldset>
                <legend><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></legend>
                <form action="showmeasurement.php" method="post" name="measurement" id="custom">
					<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>" />
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
					<input type="hidden" name="col" value="<?php echo $_REQUEST['col'];?>" />
					<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></h1>
                              <?php echo stripslashes($measurements[$_REQUEST['row']]['description']);?>
                              <div class="add-measurement">
                              	<label><?php echo stripslashes($measurements[$_REQUEST['row']]['title']);?></label>
                                <input type="text" class="validate[required,maxSize[4],custom[number]]" name="value" value="<?php echo $result[0][$_REQUEST['col']]?>"/>
                              </div>
                              <div class="stepy-error"></div>
							  <input type="submit" class="btn" name="submit" value="Modify Measurement" />
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[$_REQUEST['row']]['youtubevideo']=='yes'){ 
								echo $measurements[$_REQUEST['row']]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[$_REQUEST['row']]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>  
					</form>                  
              </fieldset>		
			<?php }?>			
		</form>
	</div>
</div>
</body>
</html>