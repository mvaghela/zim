<?php
//get category name based on cat_id
function GetCatgoryName($id,$obj_db){
	 $sql="SELECT `category_name` FROM `category` WHERE `category_id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['category_name'];
}
//get category name based on cat_id
function Getquecount($id,$obj_db){
	 $sql="SELECT count(questionid) AS count FROM `question` WHERE `triviaid`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['count'];
}

//get category name based on cat_id
function Getrescount($id,$obj_db){
	$sql="SELECT count(resultid) AS count FROM `result` WHERE `triviaid`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['count'];
}

//get category name based on cat_id
function Getwritername($id,$obj_db){
	$sql="SELECT `writername` FROM `writer` WHERE `id`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['writername'];
}

//get category name based on cat_id
function Getanscount($id,$obj_db){
	$sql="SELECT count(answerid) AS count FROM `answer` WHERE `questionid`='$id'";
	$result=$obj_db->select($sql); 
	return $result[0]['count'];
}
function Getusername($id,$obj_db){
	 $sql="SELECT `username` FROM `user` WHERE `id`='$id'";
  	 $result=$obj_db->select($sql); 
	return $result[0]['username'];
}
?>

