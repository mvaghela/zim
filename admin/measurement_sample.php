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
<?php
$select_measurement="SELECT * FROM `".$_REQUEST['type']."_measurements` WHERE `measurement_id`=".$_REQUEST['id']."";
$result=$obj_db->select($select_measurement);
?>
<?php include("include/header.php");?>
<div class="block">			
        <div class="block_head">
            <div class="bheadl"></div>
            <div class="bheadr"></div>	
            <h2><?php echo ucfirst($_REQUEST['type']);?> Measurements</h2>				
            <ul>
                <li>
                    <a href="order.php?id=<?php echo $_REQUEST['orderid'];?>">Back to Orders</a>
                </li>
            </ul>
        </div>
        <?php if($_REQUEST['type']=='shirt'){?>
        <div class="block_content">			
        	<table class="adminlist" cellpadding="3" width="100%">
              <tr>                
                <td class="gridheaderbg"><strong>Name</strong></td>
                <td class="gridheaderbg" width="250px"><strong>Size</strong></td>    
                <td class="gridheaderbg"></td> 
                <td class="gridheaderbg"><strong>Name</strong></td>
                <td class="gridheaderbg" width="250px"><strong>Size</strong></td>           
              </tr>
              <tr>
              	<td>Shirt Length :</td>                
                <td><?php echo $result[0]['shirt_length'];?></td>
              	<td></td>
              	<td>Shirt Shoulder :</td>              
                <td><?php echo $result[0]['shirt_shoulder'];?></td>
              </tr>
              <tr>
              	<td>Shirt Sleeve Length :</td>                
                <td><?php echo $result[0]['shirt_sleeve_length'];?></td>
                <td></td>
              	<td>Chest :</td>                
                <td><?php echo $result[0]['chest'];?></td>
              </tr>
              <tr>
              	<td>Stomach :</td>                
                <td><?php echo $result[0]['stomach'];?></td>
              	<td></td>
              	<td>Hip :</td>
                <td><?php echo $result[0]['hip'];?></td>
              </tr> 
              <tr>
              	<td>Shirt Neck :</td>
                <td><?php echo $result[0]['shirt_neck'];?></td>
              	<td></td>
              	<td>Shirt Knee :</td>
                <td><?php echo $result[0]['shirt_knee'];?></td>
              </tr> 
              <tr>
              	<td>Wrist :</td>
                <td><?php echo $result[0]['wrist'];?></td>
              </tr>
            </table>
        </div>
        <?php }?>
        <?php if($_REQUEST['type']=='pant'){?>
        <div class="block_content">			
        	<table class="adminlist" cellpadding="3" width="100%">
            	<tr>                
                    <td class="gridheaderbg"><strong>Name</strong></td>
                    <td class="gridheaderbg" width="250px"><strong>Size</strong></td>    
                    <td class="gridheaderbg"></td> 
                    <td class="gridheaderbg"><strong>Name</strong></td>
                    <td class="gridheaderbg" width="250px"><strong>Size</strong></td>           
                  </tr>
                  <tr>
                    <td>Waist Level :</td>                
                    <td><?php echo $result[0]['waist_level'];?></td>
                    <td></td>
                    <td>Pant Length :</td>              
                    <td><?php echo $result[0]['pant_length'];?></td>
                  </tr>
                  <tr>
                    <td>Pant Waist :</td>                
                    <td><?php echo $result[0]['pant_waist'];?></td>
                    <td></td>
                    <td>Pant Hip :</td>                
                    <td><?php echo $result[0]['pant_hip'];?></td>
                  </tr>
                  <tr>
                  	<td>Pant Bottom :</td>                
                    <td><?php echo $result[0]['pant_bottom'];?></td>
                  </tr>                  
            </table>
        </div>
        <?php }?>
        <?php if($_REQUEST['type']=='blazer'){?>
        <div class="block_content">			
        	<table class="adminlist" cellpadding="3" width="100%">
            	<tr>                
                    <td class="gridheaderbg"><strong>Name</strong></td>
                    <td class="gridheaderbg" width="250px"><strong>Size</strong></td>    
                    <td class="gridheaderbg"></td> 
                    <td class="gridheaderbg"><strong>Name</strong></td>
                    <td class="gridheaderbg" width="250px"><strong>Size</strong></td>           
                  </tr>
                  <tr>
                    <td>SUIT Length :</td>                
                    <td><?php echo $result[0]['suit_length'];?></td>
                    <td></td>
                    <td>SUIT Shoulder :</td>              
                    <td><?php echo $result[0]['suit_shoulder'];?></td>
                  </tr>
                  <tr>
                    <td>SUIT Sleeve Length :</td>                
                    <td><?php echo $result[0]['suit_sleeve_length'];?></td>
                    <!--<td></td>
                    <td>Pant Hip :</td>                
                    <td><?php echo $result[0]['pant_hip'];?></td>
                  </tr>
                  <tr>
                  	<td>Pant Bottom :</td>                
                    <td><?php echo $result[0]['pant_bottom'];?></td>-->
                  </tr>  
            </table>
        </div>
        <?php }?>
        <div class="bendl"></div>
        <div class="bendr"></div>
</div>
<?php include("include/footer.php");?>
</body>
</html>
