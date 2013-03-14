<?php
include("system/config.inc.php");
//include("function/option.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Monogram | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
<?php include("include/header.php"); ?>

<div class="block">
			
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
							<h2>Manage Monogram</h2>
				</div>
				
				<div class="block_content">
					
                                  <table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
                                    
                                        <tr>
                                          <td class="gridheaderbg" width="30"> # </td>
                                          <td class="gridheaderbg"> <strong>Option Name</strong></td>
										  <td class="gridheaderbg" width="250px"> <strong>Add Option Type</strong></td>
                                        </tr>
										
                                        <tr class="row0">
                                          <td class="nrlbg"> 1 </td>
                                          <td class="nrlbg" nowrap="nowrap"><a href="monogramoption.php">Monogram Option</a></td>
                                          <td class="nrlbg" nowrap="nowrap"><a href="monogramoption.php">Add Option Type</a></td>
                                        </tr>
										
										<tr class="row0">
                                          <td class="nrlbg"> 2 </td>
                                          <td class="nrlbg" nowrap="nowrap"><a href="colour.php">Colour</a></td>
                                          <td class="nrlbg" nowrap="nowrap"><a href="colour.php">Add Colour Type</a></td>
                                        </tr>
										
										<tr class="row0">
                                          <td class="nrlbg"> 3 </td>
                                          <td class="nrlbg" nowrap="nowrap"><a href="font.php">Font</a></td>
                                          <td class="nrlbg" nowrap="nowrap"><a href="font.php">Add Font Type</a></td>
                                        </tr>
                                         


                                    </table>
                                    
				</div>		<!-- .block_content ends -->
			                <div class="bendl"></div>
                <div class="bendr"></div>
            </div>
              <?php include("include/footer.php");?>
</body>
</html>
