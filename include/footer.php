<?php
$sqladmin="SELECT * FROM `admin` "; 
$resultadmin=$obj_db->select($sqladmin);

$sql="SELECT * FROM cms_pages WHERE  `id`='4' "; 
$pages=$obj_db->select($sql);

$select_thought="SELECT * FROM `thoughts`";
$thought_res=$obj_db->select($select_thought);
include("function/footer.php");
?>
<link rel="stylesheet" href="css/basic-jquery-slider.css">
<script src="js/basic-jquery-slider.js"></script> 
<script>
  $(document).ready(function() {		
	$("#banner").bjqs({	
	'width':251,
	'height':160,
	'showMarkers' : false,
	'showControls' : false,
	'centerMarkers' : false,
	automatic: true,
	'useCaptions' : false,
	'keyboardNav' : false,
	nextText: '<img src="css/arrow.png">',
prevText: '<img src="css/arrow2.png">'
	});
	
  });
</script>
<div class="footer">
	<div class="wrapper">
		<div class="contact-with-us">
			<div class="footer-title"> <img src="images/CONTACT-WITH-US.png" alt="CONTACT WITH US" />
				<h2>CONTACT WITH US</h2>
				<ul>
					<li><?php echo $resultadmin[0]['address'];?></li>
<!--					<li>Lorem ipsum dolor sit amet<br />
						33 NEW city 2222 new tower<br />
						xyz road 4da90h</li>-->
					<li>TEL:<?php echo $resultadmin[0]['varphoneno'];?></li>
					<li class="last">EMAIL: <a href="mailto:<?php echo $resultadmin[0]['varemailid'];?>"><?php echo $resultadmin[0]['varemailid'];?></a></li>
				</ul>
			</div>
		</div>
		<div class="care-and-advice">
			<div class="footer-title"> <img src="images/CARE-AND-ADVICE.png" alt="CARE AND ADVICE" />
				<h2><?php echo $pages[0]['Title'];?></h2>
			</div>
			<div class="double-comma-left"><img src="images/double-comma-up.png"  alt="comma"/></div>
                <div id="banner" class="thought"> 
                  <!-- start Basic Jquery Slider -->
                  <ul class="bjqs">
                  	<?php for($i=0;$i<count($thought_res);$i++){?>
                    <li> 
                      <p><?php echo stripslashes(substr($thought_res[$i]['thought_text'],0,220));?></p>
                    </li>
                    <?php }?>                    
                  </ul>
              <!-- end Basic jQuery Slider --> 
            	</div>			
			<div class="double-comma-right"><img src="images/double-comma-down.png"  alt="comma"/> </div>
		</div>
		<div class="twitter">
			<div class="footer-title"> <img src="images/TWITTER.png" alt="TWITTER" />
				<h2>TWITTER</h2>
			</div>
			<ul>
				<li> <a href="#">Lorem ipsum dolor sit amet 
					consectetuer adipiscing elit
					Maecenas porttitor.</a> <a href="#">1 hour ago</a> </li>
				<li> <a href="#">Lorem ipsum dolor sit amet 
					consectetuer adipiscing elit
					Maecenas porttitor.</a> <a href="#">1 hour ago</a> </li>
			</ul>
		</div>
		<div class="footer-bottom">
			<div class="social-div">
				<ul>
					<li>
						<h3>CONNECT WITH US</h3>
					</li>
					<li><a href="<?php echo $resultadmin[0]['facebooklink'];?>" title="facebook"><img src="images/facebook.png"  alt="facebbok"/></a></li>
					<li><a href="<?php echo $resultadmin[0]['twitterlink'];?>" title="twitter"><img src="images/twitter-1.png"  alt="twitter"/></a></li>
					<li><a href="mailto:<?php echo $resultadmin[0]['varemailid'];?>"><img src="images/main.png"  alt="main"/></a></li>
					<li><a href="<?php echo $resultadmin[0]['varemailid'];?>" title="Google Plus"><img src="images/google-plus.png"  alt="Google Plus"/></a></li>
				</ul>
			</div>
            <script language="javascript">
					jQuery(document).ready(function(){
						jQuery("#email_form").validationEngine({promptPosition : "topLeft"});
					});
			</script>
			<div class="news-letters">
				<ul>
					<li>
						<h3>CONNECT WITH US</h3>
					</li>
					<li>
						<form action="" method="post" id="email_form">
                        	<input type="hidden" name="uri" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
							<input class="input-text validate[required,maxSize[250],custom[email]]" type="text" name="your_email" id="your_email" placeholder="YOUR EMAIL" value=""/>
							<input class="button" type="submit" name="submit" value="GO"/>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
