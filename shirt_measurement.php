<?php include("system/config.inc.php"); 
$select_measurement="SELECT * FROM `measurements`";
$measurements=$obj_db->select($select_measurement);
include("function/shirt_measurement.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | Shirt Measurement</title>
</head>
<body>
<?php include('include/header.php'); ?>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>

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
			<div class="breadcrumb1">
				<div class="breadcrumb">
					<div class="bread">
						Customization
						<span class="arrow_box"></span>
					</div>				
					<div class="bread active_bread">
						measurement
						<span class="arrow_box active_bread"></span>
					</div>
					<div class="bread">
						Shipping
						<span class="arrow_box"></span>
					</div>
					<div class="bread">
						Review Order
						<span class="arrow_box"></span>
					</div>

					<div class="bread">
						Payment
						<span class="arrow_box"></span>
					</div>
				</div>
			</div>
            <link type="text/css" rel="stylesheet" href="css/jquery.stepy.css" />
            <div id="content">
            <form id="custom">
			  <fieldset title="Body Shape">
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[17]['image1'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_1']);?></p>
                        	<center><input type="radio" name="body_shape_shirt" value="high" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[17]['image2'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_2']);?></p>
                        	<center><input type="radio" name="body_shape_shirt" value="medium" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[17]['image3'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_3']);?></p>
							<center><input type="radio" name="body_shape_shirt" value="low" /></center>
                         </div>	
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[17]['image4'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_4']);?></p>
                        	<center><input type="radio" name="body_shape_shirt" value="slim" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[17]['image5'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_5']);?></p>
                        	<center><input type="radio" name="body_shape_shirt" value="normal" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[17]['image6'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_6']);?></p>
							<center><input type="radio" name="body_shape_shirt" value="loose" /></center>
                         </div>	
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[17]['image7'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_7']);?></p>
                        	<center><input type="radio" name="body_shape_shirt" value="big" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[17]['image8'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_8']);?></p>
                        	<center><input type="radio" name="body_shape_shirt" value="med" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[17]['image9'];?>" alt="<?php echo stripslashes($measurements[17]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[17]['image_desc_9']);?></p>
							<center><input type="radio" name="body_shape_shirt" value="small" /></center>
                         </div>
                    </div>
					<div class="stepy-error"></div>
              </fieldset>
			  <fieldset title="Fit">
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[18]['image1'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_1']);?></p>
                        	<center><input type="radio" name="shirt_fit" value="high" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[18]['image2'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_2']);?></p>
                        	<center><input type="radio" name="shirt_fit" value="medium" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[18]['image3'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_3']);?></p>
							<center><input type="radio" name="shirt_fit" value="low" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[18]['image4'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_4']);?></p>
                        	<center><input type="radio" name="shirt_fit" value="slim" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[18]['image5'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_5']);?></p>
                        	<center><input type="radio" name="shirt_fit" value="normal" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[18]['image6'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_6']);?></p>
							<center><input type="radio" name="shirt_fit" value="loose" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[18]['image7'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_7']);?></p>
                        	<center><input type="radio" name="shirt_fit" value="big" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[18]['image8'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_8']);?></p>
                        	<center><input type="radio" name="shirt_fit" value="med" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[18]['image9'];?>" alt="<?php echo stripslashes($measurements[18]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[18]['image_desc_9']);?></p>
							<center><input type="radio" name="shirt_fit" value="small" /></center>
                         </div>
                    </div>
					<div class="stepy-error"></div>
              </fieldset>
    			<fieldset title="Length">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[1]['title']);?></h1>
                              <?php echo stripslashes($measurements[1]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#length" ).val( ui.value );
										}
									});
							
									$("#length").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#length" ).val(10);
												console.log(value);
												$("#slider").slider("value", parseInt(value));
										}
									});
									
									
									/*$('#length').keypress(function(event) {
										if (event.keyCode == 46) {
											event.preventDefault();
										}
									});*/
								});
							</script>
							  <div class="add-measurement">
							  	<div id="slider"></div>
                              	<label>Shirt Length </label>
                                   <input type="text" id="length"  name="shirtlength"/>
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[1]['youtubevideo']=='yes'){ 
								echo $measurements[1]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({										
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[1]['video'];?>",										
                                        image: "preview.jpg",
										width: "553px",
										height: "311px"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[1]['image1'];?>" alt="<?php echo stripslashes($measurements[1]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[1]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[1]['image2'];?>" alt="<?php echo stripslashes($measurements[1]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[1]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[1]['image3'];?>" alt="<?php echo stripslashes($measurements[1]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[1]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Shoulder">
               		<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[2]['title']);?></h1>
                              <?php echo stripslashes($measurements[2]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider11").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#sholder" ).val( ui.value );
										}
									});
							
									$("#sholder").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider11").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#sholder" ).val(10);
												console.log(value);
												$("#slider11").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider11"></div>
                              	<label>Shirt Shoulder</label>
                                   <input type="text" id="sholder" name="shirtshoulder" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[2]['youtubevideo']=='yes'){ 
								echo $measurements[2]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[2]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[2]['image1'];?>" alt="<?php echo stripslashes($measurements[2]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[2]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[2]['image2'];?>" alt="<?php echo stripslashes($measurements[2]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[2]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[2]['image3'];?>" alt="<?php echo stripslashes($measurements[2]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[2]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Sleeve">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[3]['title']);?></h1>
                              <?php echo stripslashes($measurements[3]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider2").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#sleeve" ).val( ui.value );
										}
									});
							
									$("#sleeve").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider2").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#sleeve" ).val(10);
												console.log(value);
												$("#slider2").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider2"></div>
                              	<label>Shirt Sleeve length</label>
                                   <input type="text" id="sleeve" name="shirtsleevelength" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[3]['youtubevideo']=='yes'){ 
								echo $measurements[3]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[3]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[3]['image1'];?>" alt="<?php echo stripslashes($measurements[3]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[3]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[3]['image2'];?>" alt="<?php echo stripslashes($measurements[3]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[3]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[3]['image3'];?>" alt="<?php echo stripslashes($measurements[3]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[3]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Chest">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[4]['title']);?></h1>
                              <?php echo stripslashes($measurements[4]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider3").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#chest" ).val( ui.value );
										}
									});
							
									$("#chest").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider3").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#chest" ).val(10);
												console.log(value);
												$("#slider3").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider3"></div>
                              	<label>Chest</label>
                                   <input type="text" id="chest" name="chest" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[4]['youtubevideo']=='yes'){ 
								echo $measurements[4]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[4]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[4]['image1'];?>" alt="<?php echo stripslashes($measurements[4]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[4]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[4]['image2'];?>" alt="<?php echo stripslashes($measurements[4]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[4]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[4]['image3'];?>" alt="<?php echo stripslashes($measurements[4]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[4]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
	            <fieldset title="Stomach">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[5]['title']);?></h1>
                              <?php echo stripslashes($measurements[5]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider4").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#stomch" ).val( ui.value );
										}
									});
							
									$("#stomch").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider4").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#stomch" ).val(10);
												console.log(value);
												$("#slider4").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider4"></div>
                              	<label>Stomach</label>
                                   <input type="text" id="stomch" name="stomach" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[5]['youtubevideo']=='yes'){ 
								echo $measurements[5]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[5]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[5]['image1'];?>" alt="<?php echo stripslashes($measurements[5]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[5]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[5]['image2'];?>" alt="<?php echo stripslashes($measurements[5]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[5]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[5]['image3'];?>" alt="<?php echo stripslashes($measurements[5]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[5]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Hip">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[6]['title']);?></h1>
                              <?php echo stripslashes($measurements[6]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider5").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#hip" ).val( ui.value );
										}
									});
							
									$("#hip").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider5").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#hip" ).val(10);
												console.log(value);
												$("#slider5").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider5"></div>
                              	<label>Hip</label>
                                   <input type="text" id="hip" name="hip" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[6]['youtubevideo']=='yes'){ 
								echo $measurements[6]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[6]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[6]['image1'];?>" alt="<?php echo stripslashes($measurements[6]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[6]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[6]['image2'];?>" alt="<?php echo stripslashes($measurements[6]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[6]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[6]['image3'];?>" alt="<?php echo stripslashes($measurements[6]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[6]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Neck">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[7]['title']);?></h1>
                              <?php echo stripslashes($measurements[7]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider6").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#neck" ).val( ui.value );
										}
									});
							
									$("#neck").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider6").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#neck" ).val(10);
												console.log(value);
												$("#slider6").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider6"></div>
                              	<label>Shirt Neck</label>
                                   <input type="text" id="neck" name="shirtneck" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[7]['youtubevideo']=='yes'){ 
								echo $measurements[7]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[7]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[7]['image1'];?>" alt="<?php echo stripslashes($measurements[7]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[7]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[7]['image2'];?>" alt="<?php echo stripslashes($measurements[7]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[7]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[7]['image3'];?>" alt="<?php echo stripslashes($measurements[7]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[7]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Knee">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[8]['title']);?></h1>
                              <?php echo stripslashes($measurements[8]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider7").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#knee" ).val( ui.value );
										}
									});
							
									$("#knee").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider7").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#knee" ).val(10);
												console.log(value);
												$("#slider7").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider7"></div>
                              	<label>Shirt Knee</label>
                                   <input type="text" id="knee" name="shirtknee" />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[8]['youtubevideo']=='yes'){ 
								echo $measurements[8]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[8]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[8]['image1'];?>" alt="<?php echo stripslashes($measurements[8]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[8]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[8]['image2'];?>" alt="<?php echo stripslashes($measurements[8]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[8]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[8]['image3'];?>" alt="<?php echo stripslashes($measurements[8]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[8]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
                <fieldset title="Wrist">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[9]['title']);?></h1>
                              <?php echo stripslashes($measurements[9]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider8").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#wrist" ).val( ui.value );
										}
									});
							
									$("#wrist").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider8").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#wrist" ).val(10);
												console.log(value);
												$("#slider8").slider("value", parseInt(value));
										}
									});
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider8"></div>
                              	<label>Wrist</label>
                                   <input type="text" id="wrist" name="wrist" />
                              </div>
                              <div class="add-measurement">
                              	<table>
                                	<tr><td><label>Measurement Name</label></td></tr>
                                	<tr><td><input type="text" name="measurement" style="width:200px"/></td></tr>
                                </table>                                   
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video margin_left">
                         	<?php if($measurements[9]['youtubevideo']=='yes'){ 
								echo $measurements[9]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[9]['video'];?>",
										'width': '553',
										'height': '311',
                                        image: "preview.jpg"
                                    });
                                </script>
                            <?php }?>
                         </div>
                    </div>
                    
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[9]['image1'];?>" alt="<?php echo stripslashes($measurements[9]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[9]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[9]['image2'];?>" alt="<?php echo stripslashes($measurements[9]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[9]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[9]['image3'];?>" alt="<?php echo stripslashes($measurements[9]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[9]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
	    	<input type="submit" class="finish btn" name="submit" value="Finish!" />
  </form>
          </div>
             <script type="text/javascript">
			$(function() {


				$('#custom').stepy({
					backLabel:	'<span class="pre">&laquo; </span>  PREVIOUS',
					block:		true,
					errorImage:	true,
					nextLabel:	'NEXT  <span class="next">&raquo;</span>',
					description: false,
					titleClick:	true,
					validate:	true
				});
				// Optionaly
				$('#custom').validate({
					errorPlacement: function(error, element) {
						$('.stepy-error').html(error);
					}, rules: {
						'body_shape_shirt': 'required',
						'shirt_fit': 'required',
						'shirtlength':	'required',
						'shirtshoulder':'required',
						'shirtsleevelength':'required',
						'chest':'required',
						'stomach':'required',
						'hip':'required',
						'shirtneck':'required',
						'shirtknee':'required',
						'wrist':'required',
						'measurement':'required',					
						
					}, messages: {
						'body_shape_shirt':{required: 'Please select body shape'},
						'shirt_fit':{required: 'Please select shirt fit type'},
						'shirtlength':{ required:  'Shirt length  field is required!' },
						'shirtshoulder':{ required:  'Shirt Shoulder field is required!' },
						'shirtsleevelength':{ required:  'Shirt Sleeve Length field is required!' },
						'chest':{ required:  'Chest field is required!' },
						'stomach':{ required:  'Stomach field is required!' },
						'hip':{ required:  'Hip field is requerid!' },
						'shirtneck':{ required:  'Shirt Neck field is required!' },
						'shirtknee':{ required:  'Shirt Knee field is required!' },
						'wrist':{ required:  'Wrist field is required!' },
						'measurement':{ required:  'Please enter your measurement name. i.e John shirt measurement!' },
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
