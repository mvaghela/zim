<?php include("system/config.inc.php"); 
$sql="SELECT * FROM  cms_pages where  id='1'";
$res=$obj_db->select($sql);
unset($_SESSION['redirecturlusedcustomize']);	
unset($_SESSION['redirecturlsavecust']);	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $res[0]['Title']; ?></title>
<meta name="description" content="<?php echo $res[0]['Description']; ?>">
<meta name="keywords" content="<?php echo $res[0]['Keywords']; ?>">
</head>
<body>
<?php include('include/header.php'); ?>
<?php //include('include/slider.php'); ?>
<?php include('include/slidertest.php'); ?>

<div class="wrapper">
	<div class="middle">
		<div class="middle-slider-title">
			<div class="title"> <span class="title-design-left"><img src="images/title-design.jpg" alt="title design" /></span>
				<h2>THIS WEEK'S <strong>BESTSELLERS</strong></h2>
				<span class="title-design-right"><img src="images/title-design.jpg" alt="title design" /></span></div>
		</div>
		<div class="slider" id="slider1"> 
			 <a class="buttons prev" href="#">left</a>
			<div class="viewport">
				<ul class="overview">
<?php
				$slidersql = "SELECT * FROM `product` where `bestseller` = 'yes';";
				$sliderresult=$obj_db->select($slidersql); ?>
				<!-- Slider for loop query -->
<?php for($i=0;$i<count($sliderresult);$i++) { ?>

					<li> <a class="fabric-price"  href="viewfabric.php?id=<?php echo $sliderresult[$i]['productid'];?>"> <span class="images">
						<img src="admin/upload/image/thumb/<?php echo $sliderresult[$i]['image']?>"  alt="<?php echo $sliderresult[$i]['productname']?>"/></span>
						<h3><?php echo $sliderresult[$i]['productname']?></h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
<?php } ?>
<!--					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
					<li> <a href="#"> <span class="images">
						<img src="images/50e42bfdc3653.jpg"  alt="images"/></span>
						<h3>LOREM IPSUM DOLOR</h3>
						</a>
						<span class="slider-111"><img src="images/slider-111.png"  alt="images"/></span> 
						</li>
-->				</ul>
			</div>
			<a class="buttons next" href="#">right</a> 
		</div>
		<div class="text-div">
			<div class="text-title">
				<div class="title-iocn"><img src="images/ABOUT-US.png"  alt="ABOUT US"/></div>
<?php 
$sqlaboutus="SELECT * FROM cms_pages WHERE  `id`='2' "; 
$pagessqlaboutus=$obj_db->select($sqlaboutus); ?>

				<h3><?php echo $pagessqlaboutus[0]['Title'];?></h3>
			</div>
			<br />
			<?php echo $pagessqlaboutus[0]['content'];?>
			
		</div>
		<div class="text-div">
			<div class="text-title">
				<div class="title-iocn"><img src="images/WHATS-NEW.png"  alt="WHATS NEW"/></div>
<?php 
$sqlnew="SELECT * FROM cms_pages WHERE  `id`='3' "; 
$pagessqlnew=$obj_db->select($sqlnew); ?>

				<h3><?php echo $pagessqlnew[0]['Title'];?></h3>
			</div>
			<?php echo $pagessqlnew[0]['content'];?>
		</div>
		<div class="bottom-fabric">
			<?php include('include/innerslider.php'); ?>
<!--			<div class="bottom-fabric-title">
				<h3>LOREM IPSUM DOLOR</h3>
			</div>
			<div class="fabric-images"><img src="images/fabric.jpg"  alt="Fabric"/></div>
			<div class="show-this"><a href="#">SHOW THIS</a></div>
-->		
		
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>
