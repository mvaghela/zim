<?php
if($_GET['del']!='') {
	
	$delsql="DELETE FROM  cms_pages WHERE `parent`='".$_GET['del']."'";
	$delres=$obj_db->sql_query($delsql);
	
	$delsql="DELETE FROM  cms_pages WHERE `id`='".$_GET['del']."'";
	$delres=$obj_db->sql_query($delsql);
	header("location:cms_pages.php");
	//header("location:cms_pages.php?acn=".$_GET['acn']);
    die();
} 

if(isset($_REQUEST['submit'])){
	 $id=$_POST['id'];
	 //$acn=$_POST['acn'];
	
	$pagetitle=addslashes($_REQUEST['pagetitle']);
	$id=addslashes($_REQUEST['id']);
	$Keywords=addslashes($_REQUEST['Keywords']);
	$Description=addslashes($_REQUEST['Description']);
	$shortdescription=addslashes($_REQUEST['shortdescription']);
	
	$urltitle=strtolower($_REQUEST['uniqname']);
	$urltitle=addslashes($urltitle);
	
	$newtitle=preg_replace('/[^a-z0-9]/i',' ', $urltitle);
	$uniqname=str_replace(" ","-",$newtitle);
	//$uniqname=addslashes($_REQUEST['uniqname']);
	
	$PageHeader=addslashes($_REQUEST['PageHeader']);
	$SmallPageHeader=addslashes($_REQUEST['SmallPageHeader']);
	$status=$_REQUEST['status'];
	$editor1=$_REQUEST['editor1'];
	
	$leftmenu=$_REQUEST['leftmenu'];
	//$shortdescription=$_REQUEST['shortdescription'];
	
	$parrent=$_REQUEST['parrent'];
	if($parrent!='') {
		$acn=$parrent;
		$level="2";
	} else {
		$acn=check_input($_REQUEST['acn']);
		$level="1";
	}
	


   
	if($id=='addnew'){
		  $sql="INSERT INTO `cms_pages` (`level`, `parent`, `uniqname`, `Title`, `Keywords`, `Description`,`shortdescription`, `PageHeader`,`SmallPageHeader`, `last_modified`, `content`, `leftmenu`,`status`)
		  VALUES ( '$level', $acn,'$uniqname', '$pagetitle', '$Keywords', '$Description','$shortdescription', '$PageHeader', '$SmallPageHeader', NOW(), '$editor1', '$leftmenu','Active')"; 
		  $updaterecord=$obj_db->insert($sql); 
		  header("location:cms_pages.php?acn=".$_REQUEST['acn']."");
		  //header("location:course.php?msg=added&lang_id=".$_POST['lang_id']);
	die();
		 
	} else {	
		$sqlup="UPDATE `cms_pages` SET `uniqname` = '$uniqname',`Title` = '$pagetitle', `Keywords` = '$Keywords', `Description` = '$Description',`shortdescription`='$shortdescription',
	 `PageHeader` = '$PageHeader',`SmallPageHeader`='$SmallPageHeader', `last_modified` = NOW(), `leftmenu` ='$leftmenu',`content` ='$editor1' WHERE `id` = '$id'";
		$updaterecord=$obj_db->sql_query($sqlup);
		 header("location:cms_pages.php");
		//header("location:cms_pages.php?id=$id&acn=".$_REQUEST['acn']."");
	die();
	}
	

}

?>