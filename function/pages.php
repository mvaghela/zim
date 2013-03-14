<?php
//Select cms_page
$select_page="SELECT * FROM `cms_pages` WHERE `uniqname`='".$_REQUEST['uniqname']."'";
$page_res=$obj_db->select($select_page);
?>