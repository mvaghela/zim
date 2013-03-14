<link rel="stylesheet" href="css/basic-jquery-slider.css">

<div class="my-cart-banner">
	<div id="product-inner" class="product-inner all-product_inner_left">
		<ul class="bjqs">
			<?php
				$slidersql = "SELECT * FROM `product` ";
				$sliderresult=$obj_db->select($slidersql); ?>
				<!-- Slider for loop query -->
			<?php for($i=0;$i<count($sliderresult);$i++) { ?>

			<li>
				<div class="bottom-fabric-title"> <h3><?php echo $sliderresult[$i]['productname']?></h3> </div>
				<div class="fabric-images"> <a class="fabric-price"  href="viewfabric.php?id=<?php echo $sliderresult[$i]['productid'];?>"><img src="admin/upload/image/sliderthumb/<?php echo $sliderresult[$i]['image']?>" alt="<?php echo $sliderresult[$i]['productname']?>" /></a> </div>
				<div class="show-this"><a class="fabric-price"  href="viewfabric.php?id=<?php echo $sliderresult[$i]['productid'];?>">SHOW THIS</a></div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<script src="js/basic-jquery-slider.js"></script> 

<!--  Attach the plug-in to the slider parent element and adjust the settings as required --> 
<script>
      $(document).ready(function() {
       	//alert('hi');
		$("#product-inner").bjqs({
  		'width' : 305,
		'height' : 215,
		'showMarkers' : false,
		'showControls' : false,
		'centerMarkers' : false,
		automatic: true,
		'useCaptions' : false,
    	'keyboardNav' : false,
		nextText: '<img src="css/arrow.png">',
		prevText: '<img src="css/arrow2.png">'
		});
        //alert('hfsfi');
      });
</script> 
