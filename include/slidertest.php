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
  <script type="text/javascript">
   $(document).ready(function(){
    $(".hide_menu").click(function(){
     
     if($(this).children(".subnav").is(":visible")){  
      $(this).find("span").show();    
      $(this).children(".subnav").fadeOut(300,function(){
       $(this).parent().animate({ "height" : "28px" },500,function(){
        $(this).css({
         "background":'none',         
        });
       });
      });       
     }
     else{
      if($(this).siblings().children(".subnav").is(":visible")){
       $(this).siblings().find("span").show();
       $(this).siblings().children(".subnav").hide();       
       $(this).siblings().animate({
        height:"28px" 
       },500,function(){
        $(this).css({"background":"none"}); 
       });
      }      
      
      $(this).css({
       "background":'url("images/slider-menu-hover-li2.png")',
       "background-repeat":"repeat-x"
      });
      $(this).find("span").hide();
      $(this).animate({
       height:"180px"
      },500,function(){
       $(this).children(".subnav").fadeIn(300);
      });
     }     
    });
   });
  </script>
  <div class="slider-menu">
   <ul>
    <li class="hide_menu">
     <a href="#"><span>SHIRTS</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">SHIRTS</a>
      </div>
      <div class="subnav_images">
		   <?php
				$sliderimagesql = "SELECT * FROM `product` where producttypeid = 3 and indexslider = 'yes'";
    			$sliderimageresult=$obj_db->select($sliderimagesql); ?>
			<?php for($i=0;$i<count($sliderimageresult);$i++) { ?>
			      <a href="shirt.php"  style="background:none; margin-left:auto;"> <img src="admin/upload/image/thumb/<?php echo $sliderimageresult[$i]['image']; ?>" /></a>
			<?php } ?>	   
      </div>
     </div>
    </li>
	<li class="hide_menu">
     <a href="#"><span>PANTS</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">PANTS</a>
      </div>
      <div class="subnav_images">
			<?php
				$sliderimagesql = "SELECT * FROM `product` where producttypeid = 5 and indexslider = 'yes'";
    			$sliderimageresult=$obj_db->select($sliderimagesql); ?>
			<?php for($i=0;$i<count($sliderimageresult);$i++) { ?>
			      <a href="pants.php"  style="background:none; margin-left:auto;"> <img src="admin/upload/image/thumb/<?php echo $sliderimageresult[$i]['image']; ?>" /></a>
			<?php } ?>      
		</div>
     </div>
    </li>
	
<!--    <li class="hide_menu">
     <a href="#"><span>SUITS</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">SUITS</a>
      </div>
      <div class="subnav_images">
			<?//php
				$sliderimagesql = "SELECT * FROM `product` where producttypeid = 6 and indexslider = 'yes'";
    			$sliderimageresult=$obj_db->select($sliderimagesql); ?>
			<?//php for($i=0;$i<count($sliderimageresult);$i++) { ?>
			      <a href="suit.php"  style="background:none; margin-left:auto;"> <img src="admin/upload/image/thumb/<?//php echo $sliderimageresult[$i]['image']; ?>" /></a>
			</ul>/?php } ?>
      </div>
     </div>
    </li>-->
	
    <li class="hide_menu">
     <a href="#"><span>FABRICS</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">FABRICS</a>
      </div>
      <div class="subnav_images">
			<?php
				$sliderimagesql = "SELECT * FROM `product` where indexslider = 'yes' GROUP BY `producttypeid` LIMIT 0,3";
    			$sliderimageresult=$obj_db->select($sliderimagesql); ?>
			<?php for($i=0;$i<count($sliderimageresult);$i++) { ?>
			      <a href="fabric.php"  style="background:none; margin-left:auto;"> <img src="admin/upload/image/thumb/<?php echo $sliderimageresult[$i]['image']; ?>" /></a>
			<?php } ?>      
		</div>
     </div>
    </li>
    
	<!--
	<li class="hide_menu">
     <a href="#"><span>HOW WE DO</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">HOW WE DO</a>
      </div>
      <div class="subnav_images">
       <img src="images/50e42bfdc3653.jpg" />
       <img src="images/50e42bfdc3653.jpg" />
       <img src="images/50e42bfdc3653.jpg" />
      </div>
     </div>
    </li>
    <li class="hide_menu">
     <a href="#"><span>WHY CUSTOM</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">WHY CUSTOM</a>
      </div>
      <div class="subnav_images">
       <img src="images/50e42bfdc3653.jpg" />
       <img src="images/50e42bfdc3653.jpg" />
       <img src="images/50e42bfdc3653.jpg" />
      </div>
     </div>
    </li>
    <li class="hide_menu">
     <a href="#"><span>SERVICES</span></a>
     <div class="subnav" style="display:none;">
      <div class="expand_title">
       <a href="#" class="slider_link">SERVICES</a>
      </div>
      <div class="subnav_images">
       <img src="images/50e42bfdc3653.jpg" />
       <img src="images/50e42bfdc3653.jpg" />
       <img src="images/50e42bfdc3653.jpg" />
      </div>
     </div> 
    </li>
   -->
   </ul>
  </div>
 </div>
</div>