<?php include("system/config.inc.php");
include("function/pages.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zymba | <?php echo $page_res[0]['Title'];?></title>
<base href="<?php echo $path;?>" />

</head>
<body>
<?php include('include/header.php'); ?>
<?php
$sql = "select * from `cms_pages` where `leftmenu` = 'yes' and `level` = '1' and `uniqname` = '".$_REQUEST['uniqname']."'";
$pages=$obj_db->select($sql); ?>

<div class="topbg">
	<div class="wrapper">
		
			<div class="inner-title">
				<ul>
					<?php if($pages[0]['Title']!=$page_res[0]['Title']) {?>
						<li class="last"><a><?php echo $pages[0]['Title']; ?></a></li>
					<?php } ?>	
						<li class="last"><a><?php echo $page_res[0]['Title']; ?></a></li>
						
				</ul>
			</div>
		
	</div>
</div>		
		


<div class="wrapper">

<?php if($pages){?>
			<div class="filter-left-fabric" >
				<ul id="accordion">
					<?php for($i=0;$i<count($pages);$i++) { ?>
					<li class="active"><?php echo $pages[$i]['PageHeader']; ?></li>
						<?php
							$innersql = "select * from `cms_pages` where `parent`='".$pages[$i]['id'] ."' and level = 2";
							$innerpages=$obj_db->select($innersql); ?>
							<ul class="innerul">
							<?php for($j=0;$j<count($innerpages);$j++) { ?>	
									<li><a href="page/<?php echo $innerpages[$j]['uniqname']?>.html"><?php echo $innerpages[$j]['PageHeader']; ?></a></li>
							<?php } ?>						
							</ul>
					<?php } ?>
					<!--<li>Sports</li>
					<ul>
						<li><a href="#">Golf</a></li>
						<li><a href="#">Cricket</a></li>
						<li><a href="#">Football</a></li>
					</ul>
					<li>Technology</li>
					<ul>
						<li><a href="#">iPhone</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
					</ul>
					<li>Latest</li>
					<ul>
						<li><a href="#">Obama</a></li>
						<li><a href="#">Iran Election</a></li>
						<li><a href="#">Health Care</a></li>
					</ul>-->
				</ul>
				
			</div>
<?php } ?>
			
			<div class="filter-right-fabric">
				<?php echo stripslashes($page_res[0]['content']);?>
			</div>
		
</div>

<?php include('include/footer.php'); ?>

</body>

<SCRIPT>
$("#accordion > li").click(function(){
	
	//$(this).addClass("active");
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
		$(this).addClass("active");
		
	} else {
		$(this).removeClass("active");
	}
	
	$(this).next().slideToggle(300);
	//$(this).addclass("active");
	
});

/*$('#accordion > ul').slideUp(300);
$(this).addClass("active");

$('#accordion > li').first().slideUp(300);
$(this).addClass("active");*/




//$('li').first()//$('#accordion > ul:eq(0)').show();

</SCRIPT>
</html>