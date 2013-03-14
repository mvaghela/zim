<?php
if(!isset($_SESSION['adsadmin'])) {
	header("location:login.php");
	die();
}


if(isset($_REQUEST['del'])) {
	

   $del_sql="DELETE FROM `monogramfont` WHERE `id` = '".$_REQUEST['del']."'"; //die();
   $del_cat=$obj_db->sql_query($del_sql);
    
	$filename = "upload/font/".$_REQUEST['font']; //die();
	unlink($filename);

   header("location:font.php?msg=deleted&page=".$_REQUEST['page']); 
   die();
     
}
$cname=$_POST['cname'];
$urltitle=$_POST['uname'];
$page=$_POST['page'];

$extension = getExtension($_FILES['font']['name']);
$extension = strtolower($extension);
$uni = uniqid();
if ($_FILES['font']['name'] != '') {
	if ($extension == 'ttf' )
	{
		
		$name = $uni . '.' . $extension;
		$target_path = "upload/font/";
		$target_path = $target_path . basename($name);
		if (move_uploaded_file($_FILES['font']['tmp_name'], $target_path)) {
			//Find old pic
			$newname = "upload/font/" . $name;
			//replace eith thumb
		} else {
			header("location:font.php?msg=2");
			die();
		}
	} else {
		header("location:font.php?msg=1");
		die();
	}
		$cond=",`font`='$name'";
		
		$icont1="`font`,";
		$icont2="'$name',";
    }

if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='Submit') {
  $v_id=$_REQUEST['optionid'];

					                  
						if($v_id=="addnew") {
							echo $sql_insert="INSERT INTO `monogramfont` (`name`,".$icont1."`date`)
							 VALUES ('$cname',".$icont2." NOW())"; //die();
						   $insert_faq=$obj_db->insert($sql_insert);
						   header("location:font.php?msg=added"); 

						   die();
						} else {
							 $sql_faq="UPDATE `monogramfont` SET `name` = '".$_REQUEST['cname']."' ".$cond." WHERE `id` = ".$_REQUEST['optionid']."";  //die();
							$update_faq=$obj_db->sql_query($sql_faq);
					 		header("location:font.php?msg=updated&page=$page"); 

						   die();
						}

	
}
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

?>