<?php
include("system/config.inc.php");

if(isset($_REQUEST['chk']))
	{
		$pid=$_REQUEST['pid'];
		$chk=$_REQUEST['chk'];
		
		for($i=0;$i<count($chk);$i++){
		
		$sql_opt="SELECT * FROM `productoption` where productid='".$_REQUEST['pid']."' AND optiontypeid = '".$chk[$i]."'  ";
		$user_opt=$obj_db->select($sql_opt);
		
		if(count($user_opt)==0){
			$sql_ins="INSERT INTO `productoption` (`productid`, `optiontypeid`,`date`) VALUES ('".$_REQUEST['pid']."', '".$chk[$i]."',NOW())"; 
			$res_ins=$obj_db->sql_query($sql_ins);
			}
		}
	}
?>
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript">
        $(function() {
            $('#form_ajax_chkbox').bind('submit', function(){
                $.ajax({
                    type: 'post',
                    url: "addoption.php",
                    data: "chk=true&"+$("#form_ajax_chkbox").serialize(),
                    success: function(data) {
						//alert(data);
                        alert("Updated Successfully");
                    }
                });
                return false;
            });
        });
    </script>
<style>
#fancybox-content {
	border:7px solid #024E89 !important;
	background:#FFF;
	padding:30px;
}
#fancybox-outer {
	-moz-border-radius:5px;
	float:left;
	width:auto !important;
}
</style>

<form method="post" name="form_ajax_chkbox" id="form_ajax_chkbox" action="" >
	<?php
				  $sql_optiontype="SELECT * FROM `option` WHERE status='active'";
				  $res_optiontype=$obj_db->select($sql_optiontype);
				  for($h=0;$h<count($res_optiontype);$h++) {
					  ?>
	<?php echo $res_optiontype[$h]['optionname']."<br>"; ?>
	<?php
				$sql_option="SELECT * FROM `optiontype` WHERE status='active' and optionid='".$res_optiontype[$h]['optionid']."'";
				$res_option=$obj_db->select($sql_option);
										 
				$sql_opt="SELECT * FROM `productoption` where productid='".$_REQUEST['pid']."'";
				$user_opt=$obj_db->select($sql_opt);
									  
					  for($i=0;$i<count($res_option);$i++) {
						  echo "<table><tr><td style ='padding:5px'>";
						  echo "<input type='checkbox'";
							  for($d=0;$d<count($user_opt);$d++) {
								  if($user_opt[$d]['optiontypeid']==$res_option[$i]['optiontypeid']){ echo "checked='checked'";}
							  }
						  echo "name='chk[]' value='";
						  echo $res_option[$i]['optiontypeid']."'";
						  echo "style='margin-left:20px; float:left;'></td>";
						  echo "<td>".$res_option[$i]['optiontypename']."</td></tr></table>";
					  }
				  }
?>
	<input type="hidden" name="pid" value="<?php echo $_REQUEST['pid'];?>">
	<input type="submit" name="submit" class="btn" value="save">
</form>
