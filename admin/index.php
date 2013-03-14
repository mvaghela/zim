<?php
include("system/config.inc.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
header("location:setting.php");
die();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

</head>
<body>

    <?php include("include/header.php");?>
     <tr>
      <td valign="top" class="content_titlebg"><h1>Deshbord </h1></td>
      </tr>
              <tr>
                <td class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="20" align="left">&nbsp;
                      
                      </td>
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
                                <tr>
                                  <td class="girdtitlebg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><h2>Deshbord</h2></td>
                                        
                                      </tr>
                                    </table></td>
                                </tr>
                                <tr>
                                  <td class="grid_content">
                                  <link rel="stylesheet" type="text/css" href="css/zoomer.css" media="screen" />
                                 <ul class="thumb">
				<li>
                <a href="content.php?acn=event"><img src="upload/deskbord/Calendar-icon2.png" alt="Add/Edit/Delete Event" /></a></li>
                <li><a href="course.php"><img src="upload/deskbord/My-Videos-icon.png" alt="Add/Edit/Delete video" /></a></li>
                <li><a href="images.php?acn=images"><img src="upload/deskbord/My-Pictures-icon.png" alt="Add/Edit/Delete Images" /></a></li>
                <li><a href="guestlist.php"><img src="upload/deskbord/Actions-view-list-details-icon.png" alt="Add/Edit/Delete Guest list" /></a></li>
                <li><a href="tablereser.php"><img src="upload/deskbord/Table-SZ-icon.png" alt="Add/Edit/Delete Table Resrvations" /></a></li>
                <li><a href="bechalarparty.php"><img src="upload/deskbord/New-Year-Party-icon.png" alt="Add/Edit/Delete Bachelorette Parties" /></a></li>
                <li><a href="images.php?acn=scroll"><img src="upload/deskbord/File-Picture-icon.png" alt="Add/Edit/Delete Scroller" /></a></li>
                <li><a href="images.php?acn=attend"><img src="upload/deskbord/Adobe-Image-Ready-icon.png" alt="Add/Edit/Delete Attending" /></a></li>
                <li><a href="content.php?acn=ourfrd"><img src="upload/deskbord/friend-feed-icon.png" alt="Add/Edit/Delete Our Friend" /></a></li>
                <li><a href="contactus.php"><img src="upload/deskbord/contact-icon.png" alt="Add/Edit/Delete Contact" /></a></li>
               
               
				
               
			</ul>
            <script type="text/javascript" src="js/zoomer.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
 	$('ul.thumb li').Zoomer({speedView:200,speedRemove:400,altAnim:true,speedTitle:400,debug:false});
});
</script>	
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
               <?php include("include/footer.php");?>
           
</body>
</html>
