<?php
include("system/config.inc.php");
include("function/option.php");
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
<title><?php echo ucfirst($_REQUEST['type']);?> Measurement | <?php echo $sitename; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
<?php include("include/header.php");?>
<div class="block">			
        <div class="block_head">
            <div class="bheadl"></div>
            <div class="bheadr"></div>	
            <h2>Customized Image</h2>				
            <ul>
                <li>
                    <a href="order.php?id=<?php echo $_REQUEST['orderid'];?>">Back to Orders</a>
                </li>
            </ul>
        </div>
        <?php if($_REQUEST['type']=='shirt'){?>
        <?php
			//------chk the images for customization------------//
			$sql = "SELECT * FROM `saveshirtcustomize` WHERE `productid` = ".$_GET['productid']." AND `saveshirtcustomizeid` = ".$_GET['id']." ";
			$result=$obj_db->select($sql);
			
			$fittype= explode('-',$result[0]['fit']);			
			$fitimage = $fittype[1];
			$fit_type= explode('_',$fittype[0]);			
						
			$sleevetype= explode('-',$result[0]['style']);
			$sleevetypeimage = $sleevetype[1];
			$sleeve_type= explode('_',$sleevetype[0]);
			
			
			$collartype= explode('-',$result[0]['collar']);
			$collarimage = $collartype[1];
			$collar_type= explode('_',$collartype[0]);
						
			$cufftype= explode('-',$result[0]['cuff']);
			$cuffimage = $cufftype[1];
			$cuff_type= explode('_',$cufftype[0]);
						
			$pockettype= explode('-',$result[0]['pocket']);
			$pocketimage = $pockettype[1];
			$pocket_type= explode('_',$pockettype[0]);
			
			$fronttype= explode('-',$result[0]['front']);
			$frontimage = $fronttype[1];
			$front_type= explode('_',$fronttype[0]);
		?>
        <div class="block_content" style="height:555px;">
        	<div style="float:left;">
            	<table>
                	<tr>
                    	<th class="gridheaderbg">Name</th>
                        <th class="gridheaderbg" width="200">Type</th>
                    </tr>
					
					<tr>
                    	<td>Contrast Collar : </td>
                        <td><?php echo $result[0]['contrastfabriccollar'];?></td>
                    </tr>
					
					 <tr>
                    	<td>Contrast Cuff : </td>
                        <td><?php echo $result[0]['contrastfabriccuff'];?></td>
                    </tr>
                    <tr>
                    	<td>Contrast Placket : </td>
                        <td><?php echo $result[0]['contrastfabricplacket'];?></td>
                    </tr>
					
                    <tr>
                    	<td>Fit Type : </td>
                        <td><?php echo $fit_type[1];?></td>
                    </tr>
                    <tr>
                    	<td>Sleeve Style : </td>
                        <td><?php echo $sleeve_type[1];?></td>
                    </tr>
                    <tr>
                    	<td>Collar Style : </td>
                        <td><?php echo $collar_type[1];?></td>
                    </tr>
					<?php if($sleeve_type[1]!='half'){?>
                    <tr>
                    	<td>Cuff Type : </td>
                        <td><?php echo $cuff_type[1];?></td>
                    </tr>
					<?php } ?>
                    <tr>
                    	<td>Pocket Type : </td>
                        <td><?php echo $pocket_type[1];?></td>
                    </tr>
                    <tr>
                    	<td>Front : </td>
                        <td><?php echo $front_type[1];?></td>
                    </tr>
                   <!-- <tr>
                    	<td>Back : </td>
                        <td><?php //echo $fittype[0];?></td>
                    </tr>-->        
					<?php if($result[0]['monogramoption']!=''){?>               
					 <tr>
                    	<td>Monogram Option : </td>
                        <td><?php echo $result[0]['monogramoption'];?></td>
                    </tr>
                    <tr>
                    	<td>Monogram Colour : </td>
                        <td><?php echo $result[0]['monogramcolour'];?></td>
                    </tr>
					
					 <tr>
                    	<td>Monogram Font : </td>
                        <td><?php echo $result[0]['monogramfont'];?></td>
                    </tr>
                    <tr>
                    	<td>Monogram Text : </td>
                        <td><?php echo $result[0]['monogramtext'];?></td>
                    </tr>
					<?php } ?>           
                </table>
            </div>
        	<div style="text-align:center; position:relative;margin-left:280px;float:left;">			
        	<!----------------fit ----------------->
            <img id="0" src="upload/shirt/<?php echo $_GET['productid'];?>/<?php echo $fitimage; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
            
            <!----------------Style---------------->
            <img id="2" src="upload/shirt/<?php echo $_GET['productid'];?>/<?php echo $sleevetypeimage; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 2;">
            
            <!----------------pocket---------------->
            <img id="3" src="upload/shirt/<?php echo $_GET['productid'];?>/<?php echo $pocketimage ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 3;">            
            
            <!----------------Blank---------------->
            <img id="20" src="../images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 20;">
            <img id="19" src="../images/shirts/rounded_files/shirtimage/blank.gif" name="undefined" title="undefined" style="position: absolute; display: block; z-index: 19;">
            <img id="18" src="../images/shirts/rounded_files/shirtimage/blank.gif" name="sewn in" title="sewn in" style="position: absolute; display: block; z-index: 18;">
            <img id="4" src="../images/shirts/rounded_files/shirtimage/blank.gif" name="noloops" title="noloops" style="position: absolute; display: block; z-index: 4;">
            
            <?php if($result[0]['contrastfabriccuff']=='yes')
					{
						$product = $result[0]['contrastfabric']; 
					} else {
						$product = $_GET['productid'];	
					}
					?>
			
            <!----------------Cuff---------------->
            <img id="5" src="upload/shirt/<?php echo $product;?>/<?php echo $cuffimage; ?>" name="1buttonangle" title="Peace Maker" style="position: absolute; display: block; z-index: 5;">            
            
				<?php if($result[0]['contrastfabricplacket']=='yes')
						{
							$product = $result[0]['contrastfabric']; 
						} else {
							$product = $_GET['productid'];	
						}
					?>

            <!----------------front placket---------------->
            <img id="11" src="upload/shirt/<?php echo $product;?>/<?php echo $frontimage; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 11;">
            
				<?php if($result[0]['contrastfabriccollar']=='yes')
						{
							$product = $result[0]['contrastfabric']; 
						} else {
							$product = $_GET['productid'];	
						}
					?>

            <!----------------collar---------------->
            <img id="14" src="upload/shirt/<?php echo $product;?>/<?php echo $collarimage ?>" name="classic" title="Peace Maker" style="position: absolute; display: block; z-index: 14;">
        	</div>
        </div>
        <?php }?>
        <?php if($_REQUEST['type']=='pant'){?>
        <?php
			//------chk the images for customization------------//
			$sql = "SELECT * FROM `savepantcustomize` WHERE `productid` = ".$_GET['productid']." AND `savepantcustomizeid` = ".$_GET['id']." ";
			$result=$obj_db->select($sql);
			
			$fittype = explode('-',$result[0]['fit']);			
			$fitimage = $fittype[1];
			$fit_type= explode('_',$fittype[0]);
			
			$styletype = explode('-',$result[0]['style']);
			$styleimage = $styletype[1];
			$style_type= explode('_',$styletype[0]);
			
			
			$waisttype = explode('-',$result[0]['waist']);
			$waistimage = $waisttype[1];
			$waist_type= explode('_',$waisttype[0]);
			
			
			$frontpocket = explode('-',$result[0]['front_pocket']);
			$frontpocketimage = $frontpocket[1];
			$front_pocket= explode('_',$frontpocket[0]);
			
			
			$pleatstype = explode('-',$result[0]['pleats']);
			$pleatsimage = $pleatstype[1];
			$pleat_stype= explode('_',$pleatstype[0]);
			
			
			$back_pockettype = explode('-',$result[0]['back_pocket']);
			$backpocketimage = $back_pockettype[1];
			$back_pocket_type= explode('_',$back_pockettype[0]);
			
			
			$back_pocket_styletype = explode('-',$result[0]['back_pocket_style']);
			$back_pocket_styleimage = $back_pocket_styletype[1];
			$back_pocket_style_type= explode('_',$back_pocket_styletype[0]);
			
			
			$flytype = explode('-',$result[0]['fly']);
			$flyimage = $flytype[1];
			$fly_type= explode('_',$flytype[0]);
			
			
			$belt_style = explode('-',$result[0]['belt_style']);
			$belt_styleimage = $belt_style[1];
			$belt_style_type= explode('_',$belt_style[0]);

			
		?>
        <div class="block_content" style="height:555px;">		
        	<div style="float:left;">
            <table>
                <tr>
                    <th class="gridheaderbg">Name</th>
                    <th class="gridheaderbg" width="200">Type</th>
                </tr>
                <tr>
                    <td>Fit Type : </td>
                    <td><?php echo $fit_type[1];?></td>
                </tr>
                <tr>
                    <td>Style : </td>
                    <td><?php echo $style_type[2];?></td>
                </tr>
                <tr>
                    <td>Waist Style : </td>
                    <td><?php echo $waist_type[1];?></td>
                </tr>
                <tr>
                    <td>Front Pocket : </td>
                    <td><?php echo $front_pocket[2];?></td>
                </tr>
                <tr>
                    <td>Pleat Style : </td>
                    <td><?php echo $pleat_stype[1];?></td>
                </tr>
                <tr>
                    <td>Back Pocket : </td>
                    <td><?php echo $back_pocket_type[4];?></td>
                </tr>
                <tr>
                    <td>Back Pocket Style: </td>
                    <td><?php echo $back_pocket_style_type[5];?></td>
                </tr>
                <tr>
                    <td>Fly Style: </td>
                    <td><?php echo $fly_type[1];?></td>
                </tr>
                <tr>
                    <td>Belt Style: </td>
                    <td><?php if($belt_style_type[5]=='buttoned'){
								echo $belt_style_type[3]." ".$belt_style_type[4]." ".$belt_style_type[5]; 
							} else {
								echo $belt_style_type[3]." ".$belt_style_type[4];
							}?>
					</td>
                </tr>
                                   
            </table>
            </div>
            <div style="text-align:center; position:relative;margin-left:50px;float:left;">			
                <!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
                <img id="0" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $fitimage; ?>" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
                <img id="1" src="../images/pants/Slim-Fit/inside/inside.png" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 0;">
                
                <!----------------front pocket -----------------> 
                <img id="2" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $frontpocketimage; ?>" name="tail" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
                
                <!--//-----------------------------------------------back pocket---------------------------------------------//--> 
                <img id="3" src="../images/pants/641s_656.png" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
                <!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
                <img id="4" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $belt_styleimage; ?>" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;"> 
                
                <!--//-----------------------------------------------pleats---------------------------------------------//--> 
                <img id="5" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $pleatsimage; ?>" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">
        	</div>
			<div style="text-align:center; position:relative;margin-left:350px;float:left;">
				<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
				<img id="2" src="../images/pants/Slim-Fit/Slim-Fit/main-back-imag-no-cuff.png" name="long" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
				
				
				<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
				<img id="1" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $backpocketimage; ?>" name="standard" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
				
				<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
				<img id="3" src="../images/pants/649_650.png" name="angle" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">
				
				
				<!--//-----------------------------------------------main paint image n inside---------------------------------------------//--> 
	<img id="2" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $backpocketimage; ?>" name="back main image" title="Peace Maker" style="position: absolute; display: block; z-index: 8;"> 
	
	
	<!--//-----------------------------------------------back pocket---------------------------------------------//--> 
	<img id="1" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $backpocketimage; ?>" name="back pocket" title="Peace Maker" style="position: absolute; display: block; z-index: 9;"> 
	
	<!--//-----------------------------------------------Belt loops---------------------------------------------//--> 
	<img id="3" src="upload/Pant/<?php echo $_GET['productid'];?>/<?php echo $backpocketimage; ?>" name="back belt" title="Peace Maker" style="position: absolute; display: block; z-index: 10;">
	
	
			</div>
        </div>
        <?php }?>
        <?php if($_REQUEST['type']=='blazer'){?>
        <div class="block_content">			
        	<table>
            
            </table>
        </div>
        <?php }?>
        <div class="bendl"></div>
        <div class="bendr"></div>
</div>
<?php include("include/footer.php");?>
</body>
</html>
