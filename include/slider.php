<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="js/jquery.tinycarousel.min.js"></script>
<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
		
		$(document).ready(function(){
			$('#slider1').tinycarousel();	
		});
		
		$(document).ready(function(){
			$('#slider2').tinycarousel();	
		});
</script>


<div class="slider-top">
	<div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider"> 
			<!-- Slider query -->
			<?php
				$slidersql = "SELECT * FROM `slidergallery`";
				$sliderresult=$obj_db->select($slidersql); ?>
				<!-- Slider for loop query -->
			<?php for($i=0;$i<count($sliderresult);$i++) { ?>
			<img src="admin/upload/slidergallery/thumbbig/<?php echo $sliderresult[$i]['image']; ?>" alt="<?php echo $sliderresult[$i]['title']; ?>" />
			<?php } ?>
		</div>
		<div class="slider-menu">
			<ul>
				<li><a href="#"><span>NEW</span></a></li>
				<li><a href="shirt.php"><span>SUITS</span></a></li>
				<li><a href="#"><span>FABRICS</span></a></li>
				<li><a href="#"><span>HOW WE DO</span></a></li>
				<li><a href="#"><span>WHY CUSTOM</span></a></li>
				<li><a href="#"><span>SERVICES</span></a></li>
			</ul>
		</div>
	</div>
</div>
