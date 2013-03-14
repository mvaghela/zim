<?php include("system/config.inc.php"); 
$select_measurement="SELECT * FROM `measurements`";
$measurements=$obj_db->select($select_measurement);
include("function/blazer_measurement.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Blazer Measurement</title>
</head>
<body>
<?php include('include/header.php'); ?>
<script type="text/javascript" src="js/jquery.stepy.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fabric-name").fancybox();
	});
	$(document).ready(function() {
		$(".fabric-image-hover").fancybox();
	});
	$(document).ready(function() {
		$(".fabric-price").fancybox();
	});
</script>
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<div class="inner-title">
				<ul>
					<li><a href="#">All</a></li>
                         <li><a href="#">Measurement</a></li>
					<li class="last"><a href="#">Blazer </a></li>
				</ul>
			</div>
               <link type="text/css" rel="stylesheet" href="css/jquery.stepy.css" />
              <div id="content">
            <form id="custom">
    			<fieldset title="Step 1">
                <legend>SUIT Length</legend>
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[0]['title']);?></h1>
                              <?php echo stripslashes($measurements[0]['description']);?>
                              <div class="add-measurement">
                              	<label>SUIT Length </label>
                                   <input type="text"  name="suitlength"/>
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[0]['youtubevideo']=='yes'){ 
								echo $measurements[0]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({										
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[0]['video'];?>",										
                                        image: "preview.jpg",
										width: "553px",
										height: "311px"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[0]['image1'];?>" alt="<?php echo stripslashes($measurements[0]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[0]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[0]['image2'];?>" alt="<?php echo stripslashes($measurements[0]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[0]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[0]['image3'];?>" alt="<?php echo stripslashes($measurements[0]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[0]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
               <fieldset title="Step 2">
                <legend>SUIT Shoulder</legend>
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[10]['title']);?></h1>
                              <?php echo stripslashes($measurements[10]['description']);?>
                              <div class="add-measurement">
                              	<label>SUIT Shoulder</label>
                                   <input type="text" name="suitshoulder" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[10]['youtubevideo']=='yes'){ 
								echo $measurements[10]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[10]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[10]['image1'];?>" alt="<?php echo stripslashes($measurements[10]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[10]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[10]['image2'];?>" alt="<?php echo stripslashes($measurements[10]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[10]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[10]['image3'];?>" alt="<?php echo stripslashes($measurements[10]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[10]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
               <fieldset title="Step 3">
                <legend>SUIT Sleeve length</legend>
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[11]['title']);?></h1>
                              <?php echo stripslashes($measurements[11]['description']);?>
                              <div class="add-measurement">
                              	<label>Shirt Sleeve length</label>
                                   <input type="text" name="suitsleevelength" />
                              </div>
                               <div class="add-measurement">
                              	<table>
                                	<tr><td><label>Measurement Name</label></td></tr>
                                	<tr><td><input type="text" name="measurement" style="width:200px"/></td></tr>
                                </table>                                   
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[11]['youtubevideo']=='yes'){ 
								echo $measurements[11]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[11]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[11]['image1'];?>" alt="<?php echo stripslashes($measurements[11]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[11]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[11]['image2'];?>" alt="<?php echo stripslashes($measurements[11]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[11]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[11]['image3'];?>" alt="<?php echo stripslashes($measurements[11]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[11]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>               
	    	<input type="submit" class="finish" name="submit" value="Finish!" />
  </form>
          </div>
             <script type="text/javascript">
			$(function() {


				$('#custom').stepy({
					backLabel:	'<span class="pre">&laquo; </span>  PREVIOUS',
					block:		true,
					errorImage:	true,
					nextLabel:	'NEXT  <span class="next">&raquo;</span>',
					description:    false,
					titleClick:	true,
					validate:	true
				});
				// Optionaly
				$('#custom').validate({
					errorPlacement: function(error, element) {
						$('.stepy-error').html(error);
					}, rules: {
						'suitlength':	'required',
						'suitshoulder':'required',
						'suitsleevelength':'required',						
						'measurement':'required',						
					}, messages: {
						'suitlength':{ required:  'SUIT length  field is required!' },
						'suitshoulder':{ required:  'SUIT Shoulder field is required!' },
						'suitsleevelength':{ required:  'SUIT Sleeve Length field is required!' },
						'measurement':{ required:  'Please enter your measurement name. i.e John SUIT measurement!' },
					}
				});

				$('#callback').stepy({
					back: function(index) {
						alert('Going to step ' + index + '...');
					}, next: function(index) {
						if ((Math.random() * 10) < 5) {
							alert('Invalid random value!');
							return false;
						}

						alert('Going to step ' + index + '...');
					}, select: function(index) {
						alert('Current step ' + index + '.');
					}, finish: function(index) {
						alert('Finishing on step ' + index + '...');
					}, titleClick: true
				});

				$('#target').stepy({
					description:	false,
					legend:			false,
					titleClick:		true,
					titleTarget:	'#title-target'
				});

			});
		</script>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
 $(".button-next").click(function() {
   $("html, body").animate({ scrollTop: 0 }, "slow");
   return false;
 });
  $(".button-back").click(function() {
   $("html, body").animate({ scrollTop: 0 }, "slow");
   return false;
 });
});
</script>
</body>
</html>
