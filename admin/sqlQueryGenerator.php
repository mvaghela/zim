<?php
include("system/config.inc.php");

$tablename = $_REQUEST['table'];

echo "<pre>";

$sql = "SHOW COLUMNS FROM $tablename;";
$result = $obj_db->select($sql);

$variables = "";
$select = "SELECT * FROM `$tablename`";
$insert = "INSERT INTO `$tablename` ";
$update = "UPDATE `$tablename` SET ";
$delete = "DELETE FROM `$tablename`";

$insert1 = "( ";
$insert2 = "<br/>VALUES ( ";
$update1 = "";
$update2 = "";

for($i=0 ; $i<count($result) ;$i++ )
{
	$variables .= "<br/>$".$result[$i]['Field']." = \$_REQUEST['".$result[$i]['Field']."'];";
	if($i==0)
	{
		$select .= " WHERE `".$result[$i]['Field']."`='';";
		$update2 .= "<br/>WHERE `".$result[$i]['Field']."`='';";
		$delete .= " WHERE `".$result[$i]['Field']."`='';";
	}
	else
	{
		$insert1 .= "`".$result[$i]['Field']."`, ";
		$insert2 .= "$".$result[$i]['Field'].", ";
		$update1 .= "<br/>&nbsp;&nbsp;&nbsp;&nbsp;`".$result[$i]['Field']."`=$".$result[$i]['Field'].", ";
	}
	
}
$insert1 = substr($insert1,0,strlen($insert1)-2);
$insert2 = substr($insert2,0,strlen($insert2)-2);
$update1 = substr($update1,0,strlen($update1)-2);

$insert1 .= ") ";
$insert2 .= ");";

echo $variables;
echo "<br/><br/><br/>";
echo $select;
echo "<br/><br/><br/>";
echo $insert = $insert.$insert1.$insert2;
echo "<br/><br/><br/>";
echo $update = $update.$update1.$update2;
echo "<br/><br/><br/>";
echo $delete;


/* Video Upload Code */
$imageColumnNames = explode(",",$_REQUEST['imageupload']);

for($i=0;$i<count($imageColumnNames);$i++)
{
echo '<br/><br/>if(!empty($_FILES["'.$imageColumnNames[$i].'"]["name"]))
{
	$imagename = $_FILES[\''.$imageColumnNames[$i].'\']["name"];
	
	/* Upload Main Selfhosted Video */
	$extension = fileExtension($imagename);
	$uni = uniqid(\'\');
	$imagename = $uni.".".$extension;
	if( $extension == \'jpg\' || $extension == \'png\' )
	{
		if(!empty($_SESSION[\'eid\']))
		{
			$sql = "SELECT * FROM `'.$tablename.'` WHERE imageid=\'".$_SESSION[\'eid\']."\'";
			$result_tiles = $obj_db->select($sql);
			if(!empty($result_tiles[0][\''.$imageColumnNames[$i].'\']))
			{
				unlink("upload/sliderImages/".$result_tiles[0][\''.$imageColumnNames[$i].'\']);
			}
		}
		move_uploaded_file($_FILES["'.$imageColumnNames[$i].'"]["tmp_name"],"upload/sliderImages/".$imagename);
	}
	$'.$imageColumnNames[$i].'_cond = "`'.$imageColumnNames[$i].'`=\'$imagename\',";
	$'.$imageColumnNames[$i].'_inst_cond = "`'.$imageColumnNames[$i].'`,";
	$'.$imageColumnNames[$i].'_inst_cond2 = "\'$imagename\',";
}
else
{
	$'.$imageColumnNames[$i].'_cond = "";
	$'.$imageColumnNames[$i].'_inst_cond = "";
	$'.$imageColumnNames[$i].'_inst_cond2 = "";
}';
}



?>