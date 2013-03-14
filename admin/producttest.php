<?php
include("system/config.inc.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
include("function/product.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Product | <?php echo $sitename; ?></title>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="jscolor/jscolor.js"></script>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
		
<script src="js/jquery.colorbox-min.js"></script>

</head>
<body>
<?php include("include/header.php");?>
<!--<script type="text/javascript">
   
$(document).ready(function() {
$('.close').click(function() {
 //alert("hi");
 var eleid = $(this).attr("id");
 var dataString =  'deletid=' + eleid;
 //alert(dataString);
$.ajax({
        type: "POST",
        url: "insertoption.php",
        data: dataString,
        cache: false,
        success: function(html){
   //alert(html);
            $(".displayoption").html(html);
   //$("#"+eleid).css("width","127px");
   
        }
       });
    return false;
 });



$('.categorycall').change(function() {
 //alert("hi");
 var eleid = $(this).val();
 var dataString =  'optionid=' + eleid;
 alert(dataString);
$.ajax({
        type: "POST",
        url: "insertoption.php",
        data: dataString,
        cache: false,
        success: function(html){
   //alert(html);
            $(".displayoption").html(html);
   //$("#"+eleid).css("width","127px");
   
        }
       });
    return false;
 });
});
</script>-->
<?php /*if($_REQUEST['id']!=''){
	$_SESSION['iniinsertid']=$_REQUEST['id'];
} 
if($_REQUEST['id']!=''){
	$_SESSION['iniinsertid']=uniqid();
}*/ ?>
<?php if(isset($_REQUEST['id'])) { 
				  $user_sql="SELECT product.* FROM product WHERE `productid`='".$_REQUEST['id']."' "; 
				  $user_res=$obj_db->select($user_sql);
?>
				 <div class="block">
				<div class="block_head">
					<div class="bheadl"></div>
					<div class="bheadr"></div>
					
					<h2>Add/Edit Product</h2>
					<ul>
					 <li><a href="product.php">Back to listing</a></li>
					</ul>
				</div>		
				<div class="block_content">
				
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"  />
					<table style="margin:25px;" cellpadding="5">
						<tr>
							<td>Product Name</td>
							<td>:</td>
							<td>
								<input class="text small" type="text" name="productname" value="<?php echo ($user_res[0]['productname']) ?>" />							</td>
						</tr>

						<tr>
							<td>UNIQ Name(This name is display in browser)</td>
							<td>:</td>
							<td>
								<input class="text small"  type="text" name="uname" value="<?php echo $user_res[0]['uniqname'] ?>" />
							</td>
						</tr>
						
						<tr>
						<td>SEO Title</td>
						<td>:</td>
						<td>
							<input type="text" class="text" name="seotitle" id="seotitle" value="<?php echo stripslashes($user_res[0]['seotitle']); ?>" />
						</td>
					</tr>
					<tr>
						<td>SEO Keywords</td>
						<td>:</td>
						<td>
							<input type="text" class="text" name="seokeywords" id="seokeywords" value="<?php echo stripslashes($user_res[0]['seokeyword']); ?>" />
						</td>
					</tr>
					<tr>
						<td>SEO Description</td>
						<td>:</td>
						<td>
							<input type="text" class="text" name="seodescription" id="seodescription" value="<?php echo stripslashes($user_res[0]['seodescription']); ?>" />
						</td>
					</tr>

						<tr>
							<td>Image</td>
							<td>:</td>
							<td>
								<input type="file" name="image" value="" />
							</td>
						</tr>
						
						<tr>
							<td>Price</td>
							<td>:</td>
							<td>
								RS.<input class="text small" type="text" name="price" value="<?php echo ($user_res[0]['price']) ?>" />								
							</td>
						</tr>
<?php 
	$category_sql="select * from `option`";
	$category=$obj_db->select($category_sql);
?>		
						<tr>
	<td valign="top">
    	Add Fabric Option
    </td>
    <td valign="top">:</td>
    <td>
    	
                <select style="float:left; width:250px;" name="option" class="styled categorycall">
                    <option>----SELECT Fabric OPTION----</option>
                    <?php for($i=0;$i<count($category);$i++) { ?>
                    <option value="<?php echo $category[$i]['optionid']?>"><?php echo $category[$i]['optionname']?></option>
                    <?php } ?>
                </select>
				 <!--<div class="displayoption">
        
         <?php
        
		echo $sql="SELECT * FROM `productoption`
				INNER JOIN `option`
				ON `option`.`optionid`=`productoption`.`optiontypeid`
				WHERE `productoption`.`productid`='".$_SESSION['iniinsertid']."'";
		$oprtiontype=$obj_db->select($sql);
		
		?>
        <table style="margin-left:5px;">
        <?php for($i=0;$i<count($oprtiontype);$i++) { ?>
        <tr><td><?php echo $oprtiontype[$i]['optionname']; ?></td><td><div OnClick="return confirm('Are you sure want delete this?');" class="close" id="<?php echo $oprtiontype[$i]['productoptionid']; ?>"><img src="images/delete.png" /></div></td></tr>
        <?php } ?>
        </table>
        </div>-->
		</td>
</tr>
						<!--<tr>
						<td>Fabric Option</td>
						<td>:</td>
						<td>
								<?php 
							$category_sql="select * from `option`";
							$category=$obj_db->select($category_sql);
								?>
								<select name="category"  id="category" class="styled " >
									<option value="">---- Select Category----</option>
									<?php 
					  for($i=0;$i<count($category);$i++) { 
					  ?>
									<option  <?php if($user_res[0]['optionid']==$category[$i]['optionid']) { ?> selected="selected" <?php } ?> value="<?php echo $category[$i]['optionid']; ?>"><?php echo $category[$i]['optionname']; ?></option>
									<?php } ?>
								</select>
						</td>
					</tr>-->
					 <?php if($_REQUEST['id']!='addnew') {?>
                                        <tr>
                                          <td valign="top">Option</td>
                                          <td valign="top">:</td>
                                          <td>
                                          	<a class="ajax cboxElement" href="addoption.php?pid=<?php echo $user_res[0]['productid'] ?>">Add Options</a>
                                          	<a style="color:#f00; margin-left:20px;"  href="product.php?rid=<?php echo $user_res[0]['productid'] ?>">Remove Options</a>
                                            <br />
                                            
                                          </td>
                                        </tr>
                                        <?php } ?>

						<tr>
							<td>Short Discription</td>
							<td>:</td>
							<td>
								<textarea style="height:50px;" name="shortdiscription"><?php echo stripslashes($user_res[0]['shortdiscription']); ?></textarea>
							</td>
						</tr>
						<tr>
							<td>Discription</td>
							<td>:</td>
							<td>
								<textarea id="discription" name="discription"><?php echo stripslashes($user_res[0]['discription']); ?></textarea>
								<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'discription',
                {
					filebrowserBrowseUrl :'ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserImageBrowseUrl : 'ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserFlashBrowseUrl :'ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '<?php echo $editerlink;?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});

			//]]>
			</script> 
							</td>
						</tr>
						
						<tr>
							<td>Status</td>
							<td>:</td>
							<td>Active :
								<input type="radio"  checked="checked"  name="status" class="nobg" value="active" />
								&nbsp;&nbsp; Inactive :
								<input type="radio" <?php if($user_res[0]['status']=="inactive") { ?>  checked="checked" <?php } ?> name="status" class="nobg"  value="inactive" />
							</td>
						</tr>
						
					</table>
					<hr />
					<input type="submit" name="submit" class="submit long" value="Add/Edit Product" />
					</td>
					<div style="clear:both;">&nbsp;</div>
				</form>
				
			</div>
			
			<div class="bendl"></div>
			<div class="bendr"></div>
		</div>
		<?php } else { 
				    $current = Removemsg(selfURL());
					$currenturl = site_Encryption($current);
					$recordperpage = 10;
					if (isset($_REQUEST['page'])) {
							$page = $_REQUEST['page'];
							$s1 = $page * $recordperpage - $recordperpage;
							$s2 = $recordperpage;
					} else {
							$s1 = 0;
							$s2 = $recordperpage;
					}		
					
					$sqlcpont="SELECT count(product.productid) AS `countno` FROM `product` "; 
					$count = $obj_db->select($sqlcpont);
					
					$sql="SELECT product.* 	FROM `product`
							ORDER BY `productid` DESC LIMIT $s1,$s2"; 
				  	$result=$obj_db->select($sql);
					
				  ?>
				<div class="block">
			<div class="block_head">
				<div class="bheadl"></div>
				<div class="bheadr"></div>
				<h2>Manage Product</h2>
				<ul>
					<li><a href="product.php?id=addnew">Add Record</a></li>
				</ul>
			</div>
			<!-- .block_head ends -->
			
			<div class="block_content">

<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
    $(document).ready(function() {
      

        $("a[rel=example_group]").fancybox({
             'transitionIn'  : 'elastic',
			'transitionOut'  : 'elastic',
            
        });

      
    });
</script>          

				<?php if($_REQUEST['msg']=="added") {
						echo '<div class="message success" style="display: block;"><p>Record Added Successfully.</p></div>';
					}
						if($_REQUEST['msg']=="updated") {
							echo '<div class="message success" style="display: block;"><p> Record Updated Successfully. </p></div>';
						}
						if($_REQUEST['msg']=="deleted") {
							echo '<div class="message errormsg" style="display: block;"><p>Record Deleted Successfully. </p></div>';
						}
						 
			?>
			
			<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="totalrow" value="<?php echo $count[0][0]; ?>" />
			    <input type="hidden" name="page" value="<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>" />
				<table class="adminlist" cellpadding="3" cellspacing="1" width="100%">
					<tr>
						<td class="gridheaderbg"> # </td>
						<td class="gridheaderbg"><strong>Image</strong></td>
						<td class="gridheaderbg"><strong>Product Name</strong></td>
						<td class="gridheaderbg"><strong>Price</strong></td>
						<td class="gridheaderbg"><strong>Add Option</strong></td>
						<th class="gridheaderbg" width="10%">Display By</th>
						<td class="gridheaderbg" nowrap="nowrap"><strong>Status</strong></td>
						<td class="gridheaderbg"> <strong>#</strong> </td>
					</tr>
					<?php for($i=0;$i<count($result); $i++) { 
									   
									  ?>
					 <script>
											$(document).ready(function(){
												$("a[rel='viewimahe<?php echo $i; ?>']").colorbox({slideshow:true});
											});
										</script>
					<tr class="row0">
						<td class="nrlbg<?php echo ($i & 1); ?>" >
							<?php  if(isset($_REQUEST['page'])){ echo  ($recordperpage*($_REQUEST['page']-1))+$i+1; } else { echo $i+1; } ?>
						</td>
						
						<td class="nrlbg<?php echo ($i & 1); ?>" >
						<a rel="example_group" href="upload/image/<?php echo $result[$i]['image']; ?>" title="<?php echo $result[$i]['productname']; ?>">
						<img src="upload/image/medthumb/<?php echo $result[$i]['image']; ?>" /></a></td>
						<td class="nrlbg<?php echo ($i & 1); ?>" ><?php echo $result[$i]['productname']; ?></td>
						<td class="nrlbg<?php echo ($i & 1); ?>" >RS.<?php echo $result[$i]['price']; ?></td>
						<td class="nrlbg<?php echo ($i & 1); ?>" ><a href="product.php?id=<?php echo $result[$i]['productid']; ?>&proid=<?php echo $result[$i]['productid']; ?>">Add Option</a></td>
						<td style="text-align:center;">
							<input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $result[$i]['productid'] ?>" />
					        <input type="text" class="text-displayorder-box" name="product<?php echo $i; ?>" value="<?php echo $result[$i]['dispalyorder']; ?>" />
						</td>
						
						<td class="nrlbg<?php echo ($i & 1); ?>"><a href="product.php?change=<?php echo $result[$i]['productid'].$condition; ?>&status=<?php echo $result[$i]['status']; ?>&page=<?php if(isset( $_REQUEST['page'])){ echo $_REQUEST['page']; } else { echo 1; }?>"><?php echo ucfirst($result[$i]['status']); ?></a></td>
						
						
						
						<td class="nrlbg<?php echo ($i & 1); ?>" style="white-space:nowrap;"><a href="product.php?id=<?php echo $result[$i]['productid']; ?>"><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="product.php?del=<?php echo $result[$i]['productid'] ?>" OnClick="return confirm('Are you sure want to delete this Record?');"><img src="images/cross.png" /></a></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="4"></td>
						<td align="center">
							<input class="submit" type="submit" name="changedo" value="OK" />
 						</td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="7">
							<div class="pagination right" style="padding-top: 10px;">
								<?php doPages($recordperpage, Removepage($current) . checkurlconnectergiven(Removepage($current)), "", $count[0]['countno']); ?>
							</div>
						</td>
					</tr>
				</table>
			</form>
			</div>
			<div class="bendl"></div>
			<div class="bendr"></div>
		</div>
		<?php } ?>
        <?php include("include/footer.php");?>
</body>
</html>
