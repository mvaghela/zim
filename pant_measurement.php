<?php include("system/config.inc.php"); 
$select_measurement="SELECT * FROM `measurements`";
$measurements=$obj_db->select($select_measurement);
include("function/pant_measurement.php");
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
			<!--<div class="inner-title">
				<ul>
					<li><a href="#">All</a></li>
                         <li><a href="#">Measurement</a></li>
					<li class="last"><a href="#">Shirt </a></li>
				</ul>
			</div>-->
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
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[19]['image1'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_1']);?></p>
                        	<center><input type="radio" name="body_shape_pant" value="high" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[19]['image2'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_2']);?></p>
                        	<center><input type="radio" name="body_shape_pant" value="medium" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[19]['image3'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_3']);?></p>
							<center><input type="radio" name="body_shape_pant" value="low" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[19]['image4'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_4']);?></p>
                        	<center><input type="radio" name="body_shape_pant" value="slim" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[19]['image5'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_5']);?></p>
                        	<center><input type="radio" name="body_shape_pant" value="normal" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[19]['image6'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_6']);?></p>
							<center><input type="radio" name="body_shape_pant" value="loose" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[19]['image7'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_7']);?></p>
                        	<center><input type="radio" name="body_shape_pant" value="big" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[19]['image8'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_8']);?></p>
                        	<center><input type="radio" name="body_shape_pant" value="med" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[19]['image9'];?>" alt="<?php echo stripslashes($measurements[19]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[19]['image_desc_9']);?></p>
							<center><input type="radio" name="body_shape_pant" value="small" /></center>
                         </div>
                    </div>
					<div class="stepy-error"></div>
              </fieldset>
			  <fieldset title="Fit">
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[20]['image1'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_1']);?></p>
                        	<center><input type="radio" name="pant_fit" value="high" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[20]['image2'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_2']);?></p>
                        	<center><input type="radio" name="pant_fit" value="medium" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[20]['image3'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_3']);?></p>
							<center><input type="radio" name="pant_fit" value="low" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[20]['image4'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_4']);?></p>
                        	<center><input type="radio" name="pant_fit" value="slim" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[20]['image5'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_5']);?></p>
                        	<center><input type="radio" name="pant_fit" value="normal" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[20]['image6'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_6']);?></p>
							<center><input type="radio" name="pant_fit" value="loose" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[20]['image7'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_7']);?></p>
                        	<center><input type="radio" name="pant_fit" value="big" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[20]['image8'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_8']);?></p>
                        	<center><input type="radio" name="pant_fit" value="med" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[20]['image9'];?>" alt="<?php echo stripslashes($measurements[20]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[20]['image_desc_9']);?></p>
							<center><input type="radio" name="pant_fit" value="small" /></center>
                         </div>
                    </div>
					<div class="stepy-error"></div>
              </fieldset>
			  <fieldset title="Waist">
                    <div class="measurement-image-div">
                    	<div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[21]['image1'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_1']);?></p>
                        	<center><input type="radio" name="pant_waist_image" value="high" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[21]['image2'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_2']);?></p>
                        	<center><input type="radio" name="pant_waist_image" value="medium" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[21]['image3'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_3']);?></p>
							<center><input type="radio" name="pant_waist_image" value="low" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image4/<?php echo $measurements[21]['image4'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_4']);?></p>
                        	<center><input type="radio" name="pant_waist_image" value="slim" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image5/<?php echo $measurements[21]['image5'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_5']);?></p>
                        	<center><input type="radio" name="pant_waist_image" value="normal" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image6/<?php echo $measurements[21]['image6'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_6']);?></p>
							<center><input type="radio" name="pant_waist_image" value="loose" /></center>
                         </div>
						 <div class="measurement-image margin_left">
                          <img src="admin/upload/measurement/image7/<?php echo $measurements[21]['image7'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_7']);?></p>
                        	<center><input type="radio" name="pant_waist_image" value="big" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image8/<?php echo $measurements[21]['image8'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_8']);?></p>
                        	<center><input type="radio" name="pant_waist_image" value="med" /></center>
						 </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image9/<?php echo $measurements[21]['image9'];?>" alt="<?php echo stripslashes($measurements[21]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[21]['image_desc_9']);?></p>
							<center><input type="radio" name="pant_waist_image" value="small" /></center>
                         </div>
                    </div>
					<div class="stepy-error"></div>
              </fieldset>
    			<fieldset title="Waist Level">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[12]['title']);?></h1>
                              <?php echo stripslashes($measurements[12]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#waistlevel" ).val( ui.value );
										}
									});
							
									$("#waistlevel").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#waistlevel" ).val(10);
												console.log(value);
												$("#slider").slider("value", parseInt(value));
										}
									});
									
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider"></div>
                              	<label>Waist Level</label>
                                   <input type="text"  name="waistlevel" id="waistlevel"/>
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[12]['youtubevideo']=='yes'){ 
								echo $measurements[12]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({										
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[12]['video'];?>",										
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
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[12]['image1'];?>" alt="<?php echo stripslashes($measurements[12]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[12]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[12]['image2'];?>" alt="<?php echo stripslashes($measurements[12]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[12]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[12]['image3'];?>" alt="<?php echo stripslashes($measurements[12]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[12]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
               <fieldset title="Length">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[13]['title']);?></h1>
                              <?php echo stripslashes($measurements[13]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider11").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#pantlength" ).val( ui.value );
										}
									});
							
									$("#pantlength").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider11").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#pantlength" ).val(10);
												console.log(value);
												$("#slider11").slider("value", parseInt(value));
										}
									});
									
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider11"></div>
                              	<label>Pant Length</label>
                                   <input type="text" name="pantlength" id="pantlength"/>
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[13]['youtubevideo']=='yes'){ 
								echo $measurements[13]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[13]['video'];?>",
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
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[13]['image1'];?>" alt="<?php echo stripslashes($measurements[13]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[13]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[13]['image2'];?>" alt="<?php echo stripslashes($measurements[13]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[13]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[13]['image3'];?>" alt="<?php echo stripslashes($measurements[13]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[13]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
               <fieldset title="Pant Waist">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[14]['title']);?></h1>
                              <?php echo stripslashes($measurements[14]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider2").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#pantwaist" ).val( ui.value );
										}
									});
							
									$("#pantwaist").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider2").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#pantwaist" ).val(70);
												console.log(value);
												$("#slider2").slider("value", parseInt(value));
										}
									});
									
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider2"></div>
                              	<label>Pant Waist</label>
                                   <input type="text" name="pantwaist" id="pantwaist"  />
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[14]['youtubevideo']=='yes'){ 
								echo $measurements[14]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[14]['video'];?>",
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
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[14]['image1'];?>" alt="<?php echo stripslashes($measurements[14]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[14]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[14]['image2'];?>" alt="<?php echo stripslashes($measurements[14]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[14]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[14]['image3'];?>" alt="<?php echo stripslashes($measurements[14]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[14]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
               <fieldset title="Hip">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[15]['title']);?></h1>
                              <?php echo stripslashes($measurements[15]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider3").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#panthip" ).val( ui.value );
										}
									});
							
									$("#panthip").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider3").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#panthip" ).val(10);
												console.log(value);
												$("#slider3").slider("value", parseInt(value));
										}
									});
									
								});
							</script>
                              <div class="add-measurement">
							  	<div id="slider3"></div>
                              	<label>Pant Hip</label>
                                   <input type="text" name="panthip" id="panthip"/>
                              </div>
                              <div class="stepy-error"></div>
                         </div>
                         <div class="measurement-video">
                         	<?php if($measurements[15]['youtubevideo']=='yes'){ 
								echo $measurements[15]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[15]['video'];?>",
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
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[15]['image1'];?>" alt="<?php echo stripslashes($measurements[15]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[15]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[15]['image2'];?>" alt="<?php echo stripslashes($measurements[15]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[15]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[15]['image3'];?>" alt="<?php echo stripslashes($measurements[15]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[15]['image_desc_3']);?></p>
                         </div>
                    </div>
              </fieldset>
	          <fieldset title="Bottom">
                	<div class="measurement-mian-div">
                    	<div class="measurement-text">
                         	<h1><?php echo stripslashes($measurements[16]['title']);?></h1>
                              <?php echo stripslashes($measurements[16]['description']);?>
							  <script type="text/javascript">

                              	$(document).ready(function() {
									$("#slider4").slider({
										range: "min",
										value: 1,
										step: 0.25,
										min: 10,
										max: 70,
										slide: function( event, ui ) {
											$( "#pantbottom" ).val( ui.value );
										}
									});
							
									$("#pantbottom").change(function () {
										var value = $(this).attr("value");
										//alert(value);
										console.log(value);
										$("#slider4").slider("value", parseInt(value));
										if(value==0) {
												var value = 10;
												//alert(value);
												$( "#pantbottom" ).val(10);
												console.log(value);
												$("#slider4").slider("value", parseInt(value));
										}
									});
									
								});
							</script>
                              <div class="add-measurement">
							  <div id="slider4"></div>
                              	<label>Pant Bottom</label>
                                   <input type="text" name="pantbottom"  id="pantbottom"/>
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
                         	<?php if($measurements[16]['youtubevideo']=='yes'){ 
								echo $measurements[16]['video_link'];
							} else {?>
                            <div id="mediaplayer">JW Player goes here</div>								
								<script type="text/javascript" src="js/jwplayer.js"></script>
                                <script type="text/javascript">
                                    jwplayer("mediaplayer").setup({
                                        flashplayer: "js/player.swf",
                                        file: "admin/upload/measurement/video/<?php echo $measurements[16]['video'];?>",
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
                          <img src="admin/upload/measurement/image1/<?php echo $measurements[16]['image1'];?>" alt="<?php echo stripslashes($measurements[16]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[16]['image_desc_1']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image2/<?php echo $measurements[16]['image2'];?>" alt="<?php echo stripslashes($measurements[16]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[16]['image_desc_2']);?></p>
                         </div>
                         <div class="measurement-image">
                          <img src="admin/upload/measurement/image3/<?php echo $measurements[16]['image3'];?>" alt="<?php echo stripslashes($measurements[16]['title']);?>" />
                         	<p><?php echo stripslashes($measurements[16]['image_desc_3']);?></p>
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
					description:    false,
					titleClick:	true,
					validate:	true
				});
				// Optionaly
				$('#custom').validate({
					errorPlacement: function(error, element) {
						$('.stepy-error').html(error);
					}, rules: {
						'body_shape_pant': 'required',
						'pant_fit': 'required',
						'pant_waist_image': 'required',
						'waistlevel': 'required',
						'pantlength':'required',
						'pantwaist':'required',
						'panthip':'required',
						'pantbottom':'required',
						'measurement':'required',					
						
					}, messages: {
						'body_shape_pant':{required: 'Please select body shape'},
						'pant_fit':{required: 'Please select pant fit type'},
						'pant_waist_image':{required: 'Please select pant waist type'},
						'waistlevel':{ required:  'Waist Level field is required!' },
						'pantlength':{ required:  'Pant Length field is required!' },
						'pantwaist':{ required:  'Pant Waist Length field is required!' },
						'panthip':{ required:  'Pant Hip field is required!' },
						'pantbottom':{ required:  'Pant Bottom field is required!' },
						'measurement':{ required:  'Please enter your measurement name. i.e John pant measurement!' },
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
