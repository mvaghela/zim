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
<div class="wrapper">
	<div class="middle">
		<div class="inner-page-left-fabric">
			<div class="inner-title">
				<ul>
					<li class="last"><a><?php echo $page_res[0]['Title']; ?></a></li>
				</ul>
			</div>
			
			<div class="filter-fabric">
				<?php echo stripslashes($page_res[0]['content']);?>
			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>
</body>
</html>