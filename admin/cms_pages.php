<?php
include("system/config.inc.php");
include("function/cmspages.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS pages </title>
<link href="images/favicon.ico"  rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
<?php include("include/header.php");?>
    <?php if(isset($_REQUEST['id'])) { 
$sql="SELECT * FROM cms_pages WHERE `id`='".$_REQUEST['id']."'";
$result=$obj_db->select($sql);
				  ?>
    <div class="block">
      <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2><?php echo $result[0]['PageHeader']; ?></h2>
        <ul>
          <li><a href="cms_pages.php">Back to Listing</a></li>
        </ul>
      </div>
      <!-- .block_head ends -->
      
      <div class="block_content">
        <form method="post" action="cms_pages.php" enctype="multipart/form-data">
		<table cellpadding="5" width="100%" cellspacing="5">
        <tr>
        <td width="25%"><span class="cmspagetitle" >Page title (SEO) </span>  </td> <td width="3%"> : </td> <td>
        
        <input type="text" class="text small" value="<?php echo $result[0]['Title']; ?>" name="pagetitle" />
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
		
         <input type="hidden" name="parrent" value="<?php echo $_REQUEST['parrent']; ?>" />
          <input type="hidden" name="acn" value="<?php echo $_REQUEST['acn']; ?>" />
        </td>
        </tr>
        
         <tr>
        <td> <span class="cmspagetitle" > Page Keyword (SEO) </span>  </td><td> : </td><td><input type="text" class="text small" style="width:630px;" value="<?php echo $result[0]['Keywords']; ?>" name="Keywords" /></td>
        </tr>
        <?php if($result[0]['uniqname']!='about us' && $result[0]['uniqname']!='capabilitie' && $result[0]['uniqname']!='technologie') { ?>
        <tr>
        <td> <span class="cmspagetitle" > Calling name </span> (This name is display in browser) </td><td> : </td><td> <input type="text" class="text small"  value="<?php echo $result[0]['uniqname']; ?>" name="uniqname" /></td>
        </tr>
        <?php } ?>
         <tr>
        <td><span class="cmspagetitle" >Page Description (SEO)   </span>  </td><td> : </td><td><input type="text" style="width:630px;" class="text small" value="<?php echo $result[0]['Description']; ?>" name="Description" /></td>
        </tr>
         <tr>
        <td><span class="cmspagetitle" >Page Header   </span> </td><td width="5"> : </td><td><input type="text"  class="text small" value="<?php echo $result[0]['PageHeader']; ?>" name="PageHeader" /></td>
        </tr>
        
         <tr>
        <td><span class="cmspagetitle" >Small Page Header</span> </td><td width="5"> : </td><td><input type="text" style="width:630px;"  class="text small" value="<?php echo $result[0]['SmallPageHeader']; ?>" name="SmallPageHeader" /></td>
        </tr>
        
         <tr>
        <td><span class="cmspagetitle" >Small Page Description</span> </td><td width="5"> : </td><td><input type="text" style="width:630px;"  class="text small" value="<?php echo $result[0]['shortdescription']; ?>" name="shortdescription" /></td>
        </tr>

		<tr>
							<td>Show On Left Menu</td>
							<td>:</td>
							<td>Yes :
								<input type="radio"  <?php if($result[0]['leftmenu']=="yes") { ?>  checked="checked" <?php } ?>  name="leftmenu" class="nobg" value="yes" />
								&nbsp;&nbsp; No :
								<input type="radio" <?php if($result[0]['leftmenu']=="no") { ?>  checked="checked" <?php } ?> name="leftmenu" class="nobg"  value="no" />
								&nbsp;&nbsp; 
							</td>
						</tr>
        <tr>
		
		
        <tr>
        <td colspan="3">
       <span class="cmspagetitle" > Content  : </span> <br />
        <textarea id="editor1" style="white-space: normal;" name="editor1"><?php echo trim($result[0]['content']); ?></textarea>
			<script type="text/javascript">
			//<![CDATA[

				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.

				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.
				CKEDITOR.replace( 'editor1',
                {
					filebrowserBrowseUrl :'ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserImageBrowseUrl : 'ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserFlashBrowseUrl :'ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});

			//]]>
			</script></td>
        </tr>
		<tr>
							<td>Status</td>
							<td>:</td>
							<td>Show :
								<input type="radio"  checked="checked"  name="status" class="nobg" value="Show" />
								&nbsp;&nbsp; Hide :
								<input type="radio" <?php if($result[0]['status']=="Hide") { ?>  checked="checked" <?php } ?> name="status" class="nobg"  value="Hide" />
								&nbsp;&nbsp; 
							</td>
						</tr>
        <tr>
        <td colspan="2">
        <input type="submit" class="submit long" name="submit" value="Update Page Content" />
        </td>
        </tr>
        </table>
			
		
			
	
	</form>
      </div>
      <!-- .block_content ends -->
      
      <div class="bendl"></div>
      <div class="bendr"></div>
    </div>
    <?php } else {  ?>
    <div class="block">
      <div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        <h2>Manage Pages</h2>
      </div>
      <!-- .block_head ends -->
      
      <div class="block_content">
        <table style="width:70%;">
          <?php 
		 
		 
		    $sql2="SELECT * FROM cms_pages WHERE  `level`='1' "; 
		   $pages=$obj_db->select($sql2);
		   for($i=0;$i<count($pages);$i++) { ?>
          <tr>
            <td><?php if($pages[$i]['id']!='1' && $pages[$i]['id']!='2' && $pages[$i]['id']!='3' && $pages[$i]['id']!='4' && $pages[$i]['id']!='5' && $pages[$i]['id']!='6' && $pages[$i]['id']!='7' && $pages[$i]['id']!='8' && $pages[$i]['id']!='9' && $pages[$i]['id']!='16' && $pages[$i]['id']!='10' && $pages[$i]['id']!='11' && $pages[$i]['id']!='12' && $pages[$i]['id']!='13' && $pages[$i]['id']!='14' && $pages[$i]['id']!='15'){ ?>
            <a href="cms_pages.php?acn=<?php echo $_REQUEST['acn']; ?>&del=<?php echo $pages[$i]['id'] ?>" OnClick="return confirm('Are you sure want delete this Record?');" style="padding-right:10px;"><img src="images/delete.png" align="absmiddle" /></a>
           <?php } ?>
            <a href="cms_pages.php?id=<?php echo $pages[$i]['id'] ?>"><img src="images/edit.png" align="absmiddle"  title="Edit page" /></a>
            &nbsp;  
            <a href="cms_pages.php?id=<?php echo $pages[$i]['id'] ?>"><?php echo $pages[$i]['PageHeader']; ?>
           
            </a> <div style="float:right;">
            <a class="along" href="cms_pages.php?acn=<?php echo $_REQUEST['acn']; ?>&id=addnew&parrent=<?php echo $pages[$i]['id']; ?>">
            Add New Page</a></div>
              <?php  $sql3="SELECT * FROM cms_pages WHERE `parent`='".$pages[$i]['id'] ."'";
		   				$pagessecondlevel=$obj_db->select($sql3); 
						if(count($pagessecondlevel)>0) { ?>
              <table class="cmspagetbl">
                <?php         for($j=0;$j<count($pagessecondlevel);$j++) { ?>
                <tr>
                  <td width="10"><a href="cms_pages.php?del=<?php echo $pagessecondlevel[$j]['id'] ?>" OnClick="return confirm('Are you sure want delete this Record?');" style="padding-right:10px;"><img src="images/delete.png" align="absmiddle" /></a></td>
                   <td width="10"><a href="cms_pages.php?acn=<?php echo $_REQUEST['acn']; ?>&id=<?php echo $pagessecondlevel[$j]['id'] ?>"><img src="images/edit.png" title="Edit page" /></a></td>
                   <td><a href="cms_pages.php?acn=<?php echo $_REQUEST['acn']; ?>&id=<?php echo $pagessecondlevel[$j]['id'] ?>"><?php echo ucfirst($pagessecondlevel[$j]['PageHeader']); ?></a></td>
                </tr>
                <?php } ?>
              </table>
              <?php }	?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <!-- .block_content ends -->
      
      <div class="bendl"></div>
      <div class="bendr"></div>
    </div>
    <?php } ?>
    <?php include("include/footer.php");?>
</body>
</html>