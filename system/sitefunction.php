<?php
//get category name based on cat_id
function GetCatgoryName($id,$obj_db){
	 $sql="SELECT `category_name` FROM `category` WHERE `category_id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['category_name'];
}

function GetParentName($id,$obj_db){
	 $sql="SELECT PageHeader,uniqname FROM `cms_pages` WHERE `id`='$id'";
	$result=$obj_db->select($sql); 
	if($result[0]['uniqname']=='about-us') {
		$go="<a href='page-page-about us.htm'>".$result[0]['PageHeader']."</a>";
	} else if($result[0]['uniqname']=='capabilities') {
		$go="<a href='page-page-capabilitie.htm'>".$result[0]['PageHeader']."</a>";
	} else if($result[0]['uniqname']=='technologies') {
		$go="<a href='page-page-technologie.htm'>".$result[0]['PageHeader']."</a>";
	}
	return $go;
}

function GetStateName($id,$obj_db){
	 $sql="SELECT `county_name` FROM `county` WHERE `county_id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['county_name'];
}

function GetcityName($id,$obj_db){
	 $sql="SELECT `city_name` FROM `city` WHERE `city_id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['city_name'];
}

function blogcategory($id,$obj_db){
	$sql="SELECT * FROM `sitedata` WHERE `status`='Active'";
	$result=$obj_db->select($sql); 
	return $result;
}

function totalblog($obj_db){
	$sql="SELECT count(id) as total FROM `blog` WHERE `status`='Active'";
	$result=$obj_db->select($sql); 
	return $result[0]['total'];
}

function blogcategorybyid($id,$obj_db){
	$sql="SELECT `value` FROM `sitedata` WHERE `data_id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['value'];
}

function blogidbyname($id,$obj_db){
	$sql="SELECT `data_id` FROM `sitedata` WHERE LOWER(value)='".strtolower($id)."'";
	$result=$obj_db->select($sql); 
	return $result[0]['data_id'];
}


function Getcommentcount($id,$obj_db){
	 $sql="SELECT count(commentid) AS total FROM `comment` WHERE `blogid`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['total'];
}
function Getalbumname($id,$obj_db){
	 $sql="SELECT `albumname` FROM `album` WHERE `id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['albumname'];
}
?>

