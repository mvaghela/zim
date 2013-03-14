<?php
include("system/config.inc.php");
include("system/paging.php");
if(!isset($_SESSION['adminid'])) {
	header("location:login.php");
	die();
} 
if($_REQUEST['optionid']){
echo $sql="SELECT * FROM `productoption` WHERE `productid`='".$_SESSION['iniinsertid']."' AND `optiontypeid`='".$_REQUEST['optionid']."'";
$oprtiontypechk=$obj_db->select($sql);

if(count($oprtiontypechk)==0){
echo $sql="INSERT INTO `productoption` (`productid`, `optiontypeid`) VALUES ('".$_SESSION['iniinsertid']."', '".$_REQUEST['optionid']."')";
$result=$obj_db->insert($sql);
}
echo $sql="SELECT * FROM `productoption`
		INNER JOIN `option`
		ON `option`.`optionid`=`productoption`.`optiontypeid`
		 WHERE `productoption`.`productid`='".$_SESSION['iniinsertid']."'";
		$oprtiontype=$obj_db->select($sql);
		//print_r($oprtiontype);
		?>
        <table style="margin-left:5px;">
        <?php for($i=0;$i<count($oprtiontype);$i++) { ?>
        <tr><td><?php echo $oprtiontype[$i]['optionname']; ?></td><td><div OnClick="return confirm('Are you sure want delete this?');" class="close" id="<?php echo $oprtiontype[$i]['productoptionid']; ?>"><img src="images/delete.png" /></div></td></tr>
        <?php } ?>
        </table>
<?php } 


//delete
if($_REQUEST['deletid']){
$sql="DELETE FROM `productoption` WHERE `producttooption`.`productoptionid`='".$_REQUEST['deletid']."'";
$result=$obj_db->sql_query($sql);

echo $sql="SELECT * FROM `productoption`
		INNER JOIN `option`
		ON `option`.`optionid`=`productoption`.`optiontypeid`
		 WHERE `productoption`.`productid`='".$_SESSION['iniinsertid']."'";
		$oprtiontype=$obj_db->select($sql);
		//print_r($oprtiontype);
		?>
        <table style="margin-left:5px;">
        <?php for($i=0;$i<count($oprtiontype);$i++) { ?>
        <tr><td><?php echo $oprtiontype[$i]['optionname']; ?></td><td><div OnClick="return confirm('Are you sure want delete this?');" class="close" id="<?php echo $oprtiontype[$i]['productoptionid']; ?>"><img src="images/delete.png" /></div></td></tr>
        <?php } ?>
        </table>
<?php } ?>
<script type="text/javascript">
   
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
});
</script>
