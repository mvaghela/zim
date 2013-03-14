<a href="makeshiroldt.php?acn=front" >front</a>
<a href="makeshiroldt.php?acn=back" >back</a>
<?php if($_REQUEST['acn']=='back') { ?>

<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="2" src="images/pants/Slim-Fit/Slim-Fit/main-back-imag-no-cuff.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	
	
	<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
	<img id="1" src="images/pants/Slim-Fit/Back Pocket/Both/Both.png" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="3" src="images/pants/649_650.png" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
	
	

</div>
<?php } else {?>
<div id="fabric_design_details_middle_picture_view1" class=""> 
	<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="2" src="images/pants/Slim-Fit/Slim-Fit/main-front-imag-no-cuff.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	<img id="0" src="images/pants/Slim-Fit/inside/inside.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
	
	<!----------------front pocket -----------------> 
	<img id="0" src="images/pants/Slim-Fit/Front pocket/Round pocket.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="3" src="images/pants/Slim-Fit/Belt Style/Cut belt-buttoned.png" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
	
	<!--//-----------------------------------------------pleats---------------------------------------------//--> 
	<img id="3" src="images/pants/Slim-Fit/Pleats/Single Reversed Pleat.png" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">

</div>
<?php }?>
