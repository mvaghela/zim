<?php
$productid=$_REQUEST['productid'];
$productsql = "SELECT * FROM `product` WHERE `productid`='".$productid."'"; 
$productresult = $obj_db->select($productsql);
$productname = $productid;

function deleteDir($dirname) {
   if (is_dir($dirname))
      $dir_handle = opendir($dirname);
   if (!$dir_handle)
      return false;
   while($file = readdir($dir_handle)) {
      if ($file != "." && $file != "..") {
         if (!is_dir($dirname."/".$file))
            unlink($dirname."/".$file);
         else
            deleteDir($dirname.'/'.$file);    
      }
   }
   closedir($dir_handle);
   rmdir($dirname);
   return true;
}



if(isset($_REQUEST['delall'])) {
	$productid=$_REQUEST['productid'];

	$del_sql="DELETE FROM pantcustomization WHERE `pantcustomizationid` = '".$_REQUEST['delall']."'"; 
    $del_cat=$obj_db->sql_query($del_sql);
	
	deleteDir('upload/Pant/'.$productname);

	header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=deleted" );
   die();
}

if(isset($_REQUEST['del']))
{
	$productid=$_REQUEST['productid'];
	$sql = "SELECT * FROm `pantcustomization` WHERE `pantcustomizationid`='".$_REQUEST['del']."'";
	$result_image = $obj_db->select($sql);
	
	switch($_REQUEST['field'])
	{
		
//	---------------------------------------------------------------///
		case 'waist_high_back_pocket_both_singlewelthook':
			$name = $result_image[0]['waist_high_back_pocket_both_singlewelthook'];
			$field_name = 'waist_high_back_pocket_both_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_high_back_pocket_both_doublewelthook':
			$name = $result_image[0]['waist_high_back_pocket_both_doublewelthook'];
			$field_name = 'waist_high_back_pocket_both_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_high_back_pocket_both_singleweltbutton':
			$name = $result_image[0]['waist_high_back_pocket_both_singleweltbutton'];
			$field_name = 'waist_high_back_pocket_both_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_high_back_pocket_both_doubleweltbutton':
			$name = $result_image[0]['waist_high_back_pocket_both_doubleweltbutton'];
			$field_name = 'waist_high_back_pocket_both_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
			
//	--------------------------------------------------------------------------------------------------------------------------------///


		case 'waist_medium_back_pocket_left_singlewelthook':
			$name = $result_image[0]['waist_medium_back_pocket_left_singlewelthook'];
			$field_name = 'waist_medium_back_pocket_left_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_left_doublewelthook':
			$name = $result_image[0]['waist_medium_back_pocket_left_doublewelthook'];
			$field_name = 'waist_medium_back_pocket_left_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_left_singleweltbutton':
			$name = $result_image[0]['waist_medium_back_pocket_left_singleweltbutton'];
			$field_name = 'waist_medium_back_pocket_left_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_left_doubleweltbutton':
			$name = $result_image[0]['waist_medium_back_pocket_left_doubleweltbutton'];
			$field_name = 'waist_medium_back_pocket_left_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
//	--------------------------------------------------------------------------------------------------------------------------------///

		case 'waist_medium_back_pocket_right_singlewelthook':
			$name = $result_image[0]['waist_medium_back_pocket_right_singlewelthook'];
			$field_name = 'waist_medium_back_pocket_right_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_right_doublewelthook':
			$name = $result_image[0]['waist_medium_back_pocket_right_doublewelthook'];
			$field_name = 'waist_medium_back_pocket_right_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_right_singleweltbutton':
			$name = $result_image[0]['waist_medium_back_pocket_right_singleweltbutton'];
			$field_name = 'waist_medium_back_pocket_right_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_right_doubleweltbutton':
			$name = $result_image[0]['waist_medium_back_pocket_right_doubleweltbutton'];
			$field_name = 'waist_medium_back_pocket_right_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
//	--------------------------------------------------------------------------------------------------------------------------------///


		case 'waist_medium_back_pocket_both_singlewelthook':
			$name = $result_image[0]['waist_medium_back_pocket_both_singlewelthook'];
			$field_name = 'waist_medium_back_pocket_both_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_both_doublewelthook':
			$name = $result_image[0]['waist_medium_back_pocket_both_doublewelthook'];
			$field_name = 'waist_medium_back_pocket_both_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_both_singleweltbutton':
			$name = $result_image[0]['waist_medium_back_pocket_both_singleweltbutton'];
			$field_name = 'waist_medium_back_pocket_both_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_back_pocket_both_doubleweltbutton':
			$name = $result_image[0]['waist_medium_back_pocket_both_doubleweltbutton'];
			$field_name = 'waist_medium_back_pocket_both_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
//	--------------------------------------------------------------------------------------------------------------------------------///

		case 'waist_loose_back_pocket_left_singlewelthook':
			$name = $result_image[0]['waist_loose_back_pocket_left_singlewelthook'];
			$field_name = 'waist_loose_back_pocket_left_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_left_doublewelthook':
			$name = $result_image[0]['waist_loose_back_pocket_left_doublewelthook'];
			$field_name = 'waist_loose_back_pocket_left_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_left_singleweltbutton':
			$name = $result_image[0]['waist_loose_back_pocket_left_singleweltbutton'];
			$field_name = 'waist_loose_back_pocket_left_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_left_doubleweltbutton':
			$name = $result_image[0]['waist_loose_back_pocket_left_doubleweltbutton'];
			$field_name = 'waist_loose_back_pocket_left_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
//	--------------------------------------------------------------------------------------------------------------------------------///

		case 'waist_loose_back_pocket_right_singlewelthook':
			$name = $result_image[0]['waist_loose_back_pocket_right_singlewelthook'];
			$field_name = 'waist_loose_back_pocket_right_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_right_doublewelthook':
			$name = $result_image[0]['waist_loose_back_pocket_right_doublewelthook'];
			$field_name = 'waist_loose_back_pocket_right_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_right_singleweltbutton':
			$name = $result_image[0]['waist_loose_back_pocket_right_singleweltbutton'];
			$field_name = 'waist_loose_back_pocket_right_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_right_doubleweltbutton':
			$name = $result_image[0]['waist_loose_back_pocket_right_doubleweltbutton'];
			$field_name = 'waist_loose_back_pocket_right_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
//	--------------------------------------------------------------------------------------------------------------------------------///

		case 'waist_loose_back_pocket_both_singlewelthook':
			$name = $result_image[0]['waist_loose_back_pocket_both_singlewelthook'];
			$field_name = 'waist_loose_back_pocket_both_singlewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_both_doublewelthook':
			$name = $result_image[0]['waist_loose_back_pocket_both_doublewelthook'];
			$field_name = 'waist_loose_back_pocket_both_doublewelthook';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_both_singleweltbutton':
			$name = $result_image[0]['waist_loose_back_pocket_both_singleweltbutton'];
			$field_name = 'waist_loose_back_pocket_both_singleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_loose_back_pocket_both_doubleweltbutton':
			$name = $result_image[0]['waist_loose_back_pocket_both_doubleweltbutton'];
			$field_name = 'waist_loose_back_pocket_both_doubleweltbutton';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;

//	--------------------------------------------------------------------------------------------------------------------------------///


		case 'waist_high_belt_back':
			$name = $result_image[0]['waist_high_belt_back'];
			$field_name = 'waist_high_belt_back';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_medium_belt_back':
			$name = $result_image[0]['waist_medium_belt_back'];
			$field_name = 'waist_medium_belt_back';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
		case 'waist_low_belt_back':
			$name = $result_image[0]['waist_low_belt_back'];
			$field_name = 'waist_low_belt_back';
			//Deleting main image
			$newname = "upload/Pant/".$productname."/". $name;
            unlink($newname);
			break;
			
//	--------------------------------------------------------------------------------------------------------------------------------///
			
//	---------------------------------------------------------------///



	}
	$updatesql = "UPDATE `pantcustomization` SET `".$field_name."`='' WHERE `pantcustomizationid`='".$_REQUEST['del']."'";
	$update=$obj_db->sql_query($updatesql); 
	header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
}

if(isset($_REQUEST['submit'])) {
	$productid=$_REQUEST['productid'];
	//echo $productname; die();
//	---------------------------------------------------------------///

    $extension = getExtension($_FILES['waist_high_back_pocket_both_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	if ($_FILES['waist_high_back_pocket_both_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{

			$folder = mkdir("upload/Pant/".$productname, 0777);
			$name = $productname.$uni . '.' . $extension;
			$target_path = "upload/Pant/".$productname."/";
			$target_path = $target_path . basename($name);
			//$target_path = "upload/Pant/" .$productname."/".basename($name);
   				if(move_uploaded_file($_FILES['waist_high_back_pocket_both_singlewelthook']['tmp_name'], $target_path)) { 
	                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
            
	$waist_high_back_pocket_both_singlewelthook_cond = "`waist_high_back_pocket_both_singlewelthook`='$name',";
	$waist_high_back_pocket_both_singlewelthook_inst_cond = "`waist_high_back_pocket_both_singlewelthook`,";
	$waist_high_back_pocket_both_singlewelthook_inst_cond2 = "'$name',";
	}
	
   
    $extension = getExtension($_FILES['waist_high_back_pocket_both_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_high_back_pocket_both_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_high_back_pocket_both_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_high_back_pocket_both_doublewelthook_cond = "`waist_high_back_pocket_both_doublewelthook`='$name',";
		$waist_high_back_pocket_both_doublewelthook_inst_cond = "`waist_high_back_pocket_both_doublewelthook`,";
		$waist_high_back_pocket_both_doublewelthook_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['waist_high_back_pocket_both_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_high_back_pocket_both_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_high_back_pocket_both_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_high_back_pocket_both_singleweltbutton_cond = "`waist_high_back_pocket_both_singleweltbutton`='$name',";
		$waist_high_back_pocket_both_singleweltbutton_inst_cond = "`waist_high_back_pocket_both_singleweltbutton`,";
		$waist_high_back_pocket_both_singleweltbutton_inst_cond2 = "'$name',";
    }
	

	$extension = getExtension($_FILES['waist_high_back_pocket_both_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_high_back_pocket_both_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_high_back_pocket_both_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_high_back_pocket_both_doubleweltbutton_cond = "`waist_high_back_pocket_both_doubleweltbutton`='$name',";
		$waist_high_back_pocket_both_doubleweltbutton_inst_cond = "`waist_high_back_pocket_both_doubleweltbutton`,";
		$waist_high_back_pocket_both_doubleweltbutton_inst_cond2 = "'$name',";
    }
	
//	--------------------------------------------------------------------------------------------------------------------------------///

	
	$extension = getExtension($_FILES['waist_medium_back_pocket_left_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_left_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_left_singlewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_left_singlewelthook_cond = "`waist_medium_back_pocket_left_singlewelthook`='$name',";
		$waist_medium_back_pocket_left_singlewelthook_inst_cond = "`waist_medium_back_pocket_left_singlewelthook`,";
		$waist_medium_back_pocket_left_singlewelthook_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_left_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_left_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_left_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_left_doublewelthook_cond = "`waist_medium_back_pocket_left_doublewelthook`='$name',";
		$waist_medium_back_pocket_left_doublewelthook_inst_cond = "`waist_medium_back_pocket_left_doublewelthook`,";
		$waist_medium_back_pocket_left_doublewelthook_inst_cond2 = "'$name',";
    }
	
	
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_left_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_left_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
			
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_left_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_left_singleweltbutton_cond = "`waist_medium_back_pocket_left_singleweltbutton`='$name',";
		$waist_medium_back_pocket_left_singleweltbutton_inst_cond = "`waist_medium_back_pocket_left_singleweltbutton`,";
		$waist_medium_back_pocket_left_singleweltbutton_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['waist_medium_back_pocket_left_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_left_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_left_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_left_doubleweltbutton_cond = "`waist_medium_back_pocket_left_doubleweltbutton`='$name',";
		$waist_medium_back_pocket_left_doubleweltbutton_inst_cond = "`waist_medium_back_pocket_left_doubleweltbutton`,";
		$waist_medium_back_pocket_left_doubleweltbutton_inst_cond2 = "'$name',";
    }
	
//	--------------------------------------------------------------------------------------------------------------------------------///

	
	$extension = getExtension($_FILES['waist_medium_back_pocket_right_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_right_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_right_singlewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_right_singlewelthook_cond = "`waist_medium_back_pocket_right_singlewelthook`='$name',";
		$waist_medium_back_pocket_right_singlewelthook_inst_cond = "`waist_medium_back_pocket_right_singlewelthook`,";
		$waist_medium_back_pocket_right_singlewelthook_inst_cond2 = "'$name',";


    }
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_right_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_right_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_right_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_right_doublewelthook_cond = "`waist_medium_back_pocket_right_doublewelthook`='$name',";
		$waist_medium_back_pocket_right_doublewelthook_inst_cond = "`waist_medium_back_pocket_right_doublewelthook`,";
		$waist_medium_back_pocket_right_doublewelthook_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_right_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_right_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_right_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }

		$waist_medium_back_pocket_right_singleweltbutton_cond = "`waist_medium_back_pocket_right_singleweltbutton`='$name',";
		$waist_medium_back_pocket_right_singleweltbutton_inst_cond = "`waist_medium_back_pocket_right_singleweltbutton`,";
		$waist_medium_back_pocket_right_singleweltbutton_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_right_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_right_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_right_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_right_doubleweltbutton_cond = "`waist_medium_back_pocket_right_doubleweltbutton`='$name',";
		$waist_medium_back_pocket_right_doubleweltbutton_inst_cond = "`waist_medium_back_pocket_right_doubleweltbutton`,";
		$waist_medium_back_pocket_right_doubleweltbutton_inst_cond2 = "'$name',";
    }
	
//	--------------------------------------------------------------------------------------------------------------------------------///

	
	$extension = getExtension($_FILES['waist_medium_back_pocket_both_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_both_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_both_singlewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_both_singlewelthook_cond = "`waist_medium_back_pocket_both_singlewelthook`='$name',";
		$waist_medium_back_pocket_both_singlewelthook_inst_cond = "`waist_medium_back_pocket_both_singlewelthook`,";
		$waist_medium_back_pocket_both_singlewelthook_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_both_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_both_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_both_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_both_doublewelthook_cond = "`waist_medium_back_pocket_both_doublewelthook`='$name',";
		$waist_medium_back_pocket_both_doublewelthook_inst_cond = "`waist_medium_back_pocket_both_doublewelthook`,";
		$waist_medium_back_pocket_both_doublewelthook_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_medium_back_pocket_both_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_both_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_both_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_both_singleweltbutton_cond = "`waist_medium_back_pocket_both_singleweltbutton`='$name',";
		$waist_medium_back_pocket_both_singleweltbutton_inst_cond = "`waist_medium_back_pocket_both_singleweltbutton`,";
		$waist_medium_back_pocket_both_singleweltbutton_inst_cond2 = "'$name',";
    }
	

	$extension = getExtension($_FILES['waist_medium_back_pocket_both_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_back_pocket_both_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_back_pocket_both_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_back_pocket_both_doubleweltbutton_cond = "`waist_medium_back_pocket_both_doubleweltbutton`='$name',";
		$waist_medium_back_pocket_both_doubleweltbutton_inst_cond = "`waist_medium_back_pocket_both_doubleweltbutton`,";
		$waist_medium_back_pocket_both_doubleweltbutton_inst_cond2 = "'$name',";
    }


//	--------------------------------------------------------------------------------------------------------------------------------///
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_left_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_left_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_left_singlewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_left_singlewelthook_cond = "`waist_loose_back_pocket_left_singlewelthook`='$name',";
		$waist_loose_back_pocket_left_singlewelthook_inst_cond = "`waist_loose_back_pocket_left_singlewelthook`,";
		$waist_loose_back_pocket_left_singlewelthook_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_left_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_left_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_left_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_left_doublewelthook_cond = "`waist_loose_back_pocket_left_doublewelthook`='$name',";
		$waist_loose_back_pocket_left_doublewelthook_inst_cond = "`waist_loose_back_pocket_left_doublewelthook`,";
		$waist_loose_back_pocket_left_doublewelthook_inst_cond2 = "'$name',";
    }


	$extension = getExtension($_FILES['waist_loose_back_pocket_left_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_left_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_left_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_left_singleweltbutton_cond = "`waist_loose_back_pocket_left_singleweltbutton`='$name',";
		$waist_loose_back_pocket_left_singleweltbutton_inst_cond = "`waist_loose_back_pocket_left_singleweltbutton`,";
		$waist_loose_back_pocket_left_singleweltbutton_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_left_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_left_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_left_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_left_doubleweltbutton_cond = "`waist_loose_back_pocket_left_doubleweltbutton`='$name',";
		$waist_loose_back_pocket_left_doubleweltbutton_inst_cond = "`waist_loose_back_pocket_left_doubleweltbutton`,";
		$waist_loose_back_pocket_left_doubleweltbutton_inst_cond2 = "'$name',";
    }
	
//	--------------------------------------------------------------------------------------------------------------------------------///


	$extension = getExtension($_FILES['waist_loose_back_pocket_right_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_right_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_right_singlewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_right_singlewelthook_cond = "`waist_loose_back_pocket_right_singlewelthook`='$name',";
		$waist_loose_back_pocket_right_singlewelthook_inst_cond = "`waist_loose_back_pocket_right_singlewelthook`,";
		$waist_loose_back_pocket_right_singlewelthook_inst_cond2 = "'$name',";
    }

	
	$extension = getExtension($_FILES['waist_loose_back_pocket_right_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_right_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_right_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_right_doublewelthook_cond = "`waist_loose_back_pocket_right_doublewelthook`='$name',";
		$waist_loose_back_pocket_right_doublewelthook_inst_cond = "`waist_loose_back_pocket_right_doublewelthook`,";
		$waist_loose_back_pocket_right_doublewelthook_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_right_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_right_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_right_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_right_singleweltbutton_cond = "`waist_loose_back_pocket_right_singleweltbutton`='$name',";
		$waist_loose_back_pocket_right_singleweltbutton_inst_cond = "`waist_loose_back_pocket_right_singleweltbutton`,";
		$waist_loose_back_pocket_right_singleweltbutton_inst_cond2 = "'$name',";
    }

	
	$extension = getExtension($_FILES['waist_loose_back_pocket_right_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_right_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_right_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_right_doubleweltbutton_cond = "`waist_loose_back_pocket_right_doubleweltbutton`='$name',";
		$waist_loose_back_pocket_right_doubleweltbutton_inst_cond = "`waist_loose_back_pocket_right_doubleweltbutton`,";
		$waist_loose_back_pocket_right_doubleweltbutton_inst_cond2 = "'$name',";
    }
	
//-------------------------------------------------------------------------------------------------------------------------------------//	

	
	$extension = getExtension($_FILES['waist_loose_back_pocket_both_singlewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_both_singlewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_both_singlewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_both_singlewelthook_cond = "`waist_loose_back_pocket_both_singlewelthook`='$name',";
		$waist_loose_back_pocket_both_singlewelthook_inst_cond = "`waist_loose_back_pocket_both_singlewelthook`,";
		$waist_loose_back_pocket_both_singlewelthook_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_both_doublewelthook']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_both_doublewelthook']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_both_doublewelthook']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_both_doublewelthook_cond = "`waist_loose_back_pocket_both_doublewelthook`='$name',";
		$waist_loose_back_pocket_both_doublewelthook_inst_cond = "`waist_loose_back_pocket_both_doublewelthook`,";
		$waist_loose_back_pocket_both_doublewelthook_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_both_singleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_both_singleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_both_singleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_both_singleweltbutton_cond = "`waist_loose_back_pocket_both_singleweltbutton`='$name',";
		$waist_loose_back_pocket_both_singleweltbutton_inst_cond = "`waist_loose_back_pocket_both_singleweltbutton`,";

		$waist_loose_back_pocket_both_singleweltbutton_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_loose_back_pocket_both_doubleweltbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_loose_back_pocket_both_doubleweltbutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_loose_back_pocket_both_doubleweltbutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_loose_back_pocket_both_doubleweltbutton_cond = "`waist_loose_back_pocket_both_doubleweltbutton`='$name',";
		$waist_loose_back_pocket_both_doubleweltbutton_inst_cond = "`waist_loose_back_pocket_both_doubleweltbutton`,";
		$waist_loose_back_pocket_both_doubleweltbutton_inst_cond2 = "'$name',";
    }
	
	
//-------------------------------------------------------------------------------------------------------------------------------------//	



	$extension = getExtension($_FILES['waist_high_belt_back']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_high_belt_back']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_high_belt_back']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_high_belt_back_cond = "`waist_high_belt_back`='$name',";
		$waist_high_belt_back_inst_cond = "`waist_high_belt_back`,";
		$waist_high_belt_back_inst_cond2 = "'$name',";
    }

	$extension = getExtension($_FILES['waist_medium_belt_back']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_medium_belt_back']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_medium_belt_back']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_medium_belt_back_cond = "`waist_medium_belt_back`='$name',";
		$waist_medium_belt_back_inst_cond = "`waist_medium_belt_back`,";
		$waist_medium_belt_back_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['waist_low_belt_back']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['waist_low_belt_back']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/Pant/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/Pant/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['waist_low_belt_back']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/Pant/".$productname."/". $name;
            } else {
                header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$waist_low_belt_back_cond = "`waist_low_belt_back`='$name',";
		$waist_low_belt_back_inst_cond = "`waist_low_belt_back`,";
		$waist_low_belt_back_inst_cond2 = "'$name',";
    }
	

//-------------------------------------------------------------------------------------------------------------------------------------//	


	
	if($productid==$_REQUEST['productid']) {
		
	$sql = "SELECT * FROM `pantcustomization` WHERE `productid`='".$_REQUEST['productid']."'";
	$result_image = $obj_db->select($sql);
	
	 if(($result_image))
	 {
		 $update_string = $waist_high_back_pocket_both_singlewelthook_cond."".$waist_high_back_pocket_both_doublewelthook_cond."".$waist_high_back_pocket_both_singleweltbutton_cond."".$waist_high_back_pocket_both_doubleweltbutton_cond."".$waist_medium_back_pocket_left_singlewelthook_cond."".$waist_medium_back_pocket_left_doublewelthook_cond."".$waist_medium_back_pocket_left_singleweltbutton_cond."".$waist_medium_back_pocket_left_doubleweltbutton_cond."".$waist_medium_back_pocket_right_singlewelthook_cond."".$waist_medium_back_pocket_right_doublewelthook_cond."".$waist_medium_back_pocket_right_singleweltbutton_cond."".$waist_medium_back_pocket_right_doubleweltbutton_cond."".$waist_medium_back_pocket_both_singlewelthook_cond."".$waist_medium_back_pocket_both_doublewelthook_cond."".$waist_medium_back_pocket_both_singleweltbutton_cond."".$waist_medium_back_pocket_both_doubleweltbutton_cond."".$waist_loose_back_pocket_left_singlewelthook_cond."".$waist_loose_back_pocket_left_doublewelthook_cond."".$waist_loose_back_pocket_left_singleweltbutton_cond."".$waist_loose_back_pocket_left_doubleweltbutton_cond."".$waist_loose_back_pocket_right_singlewelthook_cond."".$waist_loose_back_pocket_right_doublewelthook_cond."".$waist_loose_back_pocket_right_singleweltbutton_cond."".$waist_loose_back_pocket_right_doubleweltbutton_cond."".$waist_loose_back_pocket_both_singlewelthook_cond."".$waist_loose_back_pocket_both_doublewelthook_cond."".$waist_loose_back_pocket_both_singleweltbutton_cond."".$waist_loose_back_pocket_both_doubleweltbutton_cond."".$waist_high_belt_back_cond."".$waist_medium_belt_back_cond."".$waist_low_belt_back_cond;
		
			$update_string = substr($update_string,0,(strlen($update_string)-1));
		
	 	  	$sql_user="UPDATE pantcustomization SET ".$update_string."  
				WHERE `pantcustomizationid` = '".$result_image[0]['pantcustomizationid']."' LIMIT 1"; //die();
	 $update=$obj_db->sql_query($sql_user); 
	header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
   die();
	} else 
	  {
       $sql="INSERT INTO pantcustomization (`productid`,".$waist_high_back_pocket_both_singlewelthook_inst_cond."  ".$waist_high_back_pocket_both_doublewelthook_inst_cond."  ".$waist_high_back_pocket_both_singleweltbutton_inst_cond."  ".$waist_high_back_pocket_both_doubleweltbutton_inst_cond."  ".$waist_medium_back_pocket_left_singlewelthook_inst_cond."  ".$waist_medium_back_pocket_left_doublewelthook_inst_cond."  ".$waist_medium_back_pocket_left_singleweltbutton_inst_cond."  ".$waist_medium_back_pocket_left_doubleweltbutton_inst_cond."  ".$waist_medium_back_pocket_right_singlewelthook_inst_cond."  ".$waist_medium_back_pocket_right_doublewelthook_inst_cond."  ".$waist_medium_back_pocket_right_singleweltbutton_inst_cond."  ".$waist_medium_back_pocket_right_doubleweltbutton_inst_cond."  ".$waist_medium_back_pocket_both_singlewelthook_inst_cond."  ".$waist_medium_back_pocket_both_doublewelthook_inst_cond."  ".$waist_medium_back_pocket_both_singleweltbutton_inst_cond." ".$waist_medium_back_pocket_both_doubleweltbutton_inst_cond." ".$waist_loose_back_pocket_left_singlewelthook_inst_cond."  ".$waist_loose_back_pocket_left_doublewelthook_inst_cond."  ".$waist_loose_back_pocket_left_singleweltbutton_inst_cond."  ".$waist_loose_back_pocket_left_doubleweltbutton_inst_cond."  ".$waist_loose_back_pocket_right_singlewelthook_inst_cond."  ".$waist_loose_back_pocket_right_doublewelthook_inst_cond." ".$waist_loose_back_pocket_right_singleweltbutton_inst_cond." ".$waist_loose_back_pocket_right_doubleweltbutton_inst_cond."  ".$waist_loose_back_pocket_both_singlewelthook_inst_cond."  ".$waist_loose_back_pocket_both_doublewelthook_inst_cond."  ".$waist_loose_back_pocket_both_singleweltbutton_inst_cond."  ".$waist_loose_back_pocket_both_doubleweltbutton_inst_cond."  ".$waist_high_belt_back_inst_cond."  ".$waist_medium_belt_back_inst_cond."  ".$waist_low_belt_back_inst_cond."  `adate`) 
		VALUES ('$productid',".$waist_high_back_pocket_both_singlewelthook_inst_cond2."   ".$waist_high_back_pocket_both_doublewelthook_inst_cond2."  ".$waist_high_back_pocket_both_singleweltbutton_inst_cond2."   ".$waist_high_back_pocket_both_doubleweltbutton_inst_cond2."  ".$waist_medium_back_pocket_left_singlewelthook_inst_cond2."  ".$waist_medium_back_pocket_left_doublewelthook_inst_cond2."  ".$waist_medium_back_pocket_left_singleweltbutton_inst_cond2."  ".$waist_medium_back_pocket_left_doubleweltbutton_inst_cond2."  ".$waist_medium_back_pocket_right_singlewelthook_inst_cond2."  ".$waist_medium_back_pocket_right_doublewelthook_inst_cond2."  ".$waist_medium_back_pocket_right_singleweltbutton_inst_cond2."  ".$waist_medium_back_pocket_right_doubleweltbutton_inst_cond2."  ".$waist_medium_back_pocket_both_singlewelthook_inst_cond2."  ".$waist_medium_back_pocket_both_doublewelthook_inst_cond2." ".$waist_medium_back_pocket_both_singleweltbutton_inst_cond2." ".$waist_medium_back_pocket_both_doubleweltbutton_inst_cond2." ".$waist_loose_back_pocket_left_singlewelthook_inst_cond2." ".$waist_loose_back_pocket_left_doublewelthook_inst_cond2."  ".$waist_loose_back_pocket_left_singleweltbutton_inst_cond2."  ".$waist_loose_back_pocket_left_doubleweltbutton_inst_cond2."  ".$waist_loose_back_pocket_right_singlewelthook_inst_cond2."  ".$waist_loose_back_pocket_right_doublewelthook_inst_cond2." ".$waist_loose_back_pocket_right_singleweltbutton_inst_cond2." ".$waist_loose_back_pocket_right_doubleweltbutton_inst_cond2."  ".$waist_loose_back_pocket_both_singlewelthook_inst_cond2."  ".$waist_loose_back_pocket_both_doublewelthook_inst_cond2."  ".$waist_loose_back_pocket_both_singleweltbutton_inst_cond2."  ".$waist_loose_back_pocket_both_doubleweltbutton_inst_cond2."  ".$waist_high_belt_back_inst_cond2."  ".$waist_medium_belt_back_inst_cond2."  ".$waist_low_belt_back_inst_cond2."  NOW())";  //die();
		 $recordinserted=$obj_db->insert($sql); 
		 $lastid=mysql_insert_id();
		 header("location:pantcustomization.php?productid=".$_REQUEST['productid']."&msg=added" );
   		die();
	}  
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

function make_thumb($img_name, $filename, $new_w, $new_h) {
    //get image extension.
    $ext = getExtension($img_name);
    //creates the new image using the appropriate function from gd library
    if (!strcmp("jpg", $ext) || !strcmp("jpeg", $ext))
        $src_img = imagecreatefromjpeg($img_name);

    if (!strcmp("png", $ext))
        $src_img = imagecreatefrompng($img_name);

    if (!strcmp("gif", $ext))
        $src_img = imagecreatefromgif($img_name);

    //gets the dimmensions of the image
    $old_x = imageSX($src_img);
    $old_y = imageSY($src_img);

    // next we will calculate the new dimmensions  the thumbnail image
    // the next steps will be taken:
    // 	1. calculate the ratio by dividing the old dimmensions with the new ones
    //	2. if the ratio  the width is higher, the width will remain the one define in WIDTH variable
    //		and the height will be calculated so the image ratio will not change
    //	3. otherwise we will use the height ratio  the image
    // as a result, only one of the dimmensions will be from the fixed ones


    $ratio1 = $old_x / $new_w;
    $ratio2 = $old_y / $new_h;
    if ($ratio1 > $ratio2) {
        $thumb_w = $new_w;
        $thumb_h = $old_y / $ratio1;
    } else {
        $thumb_h = $new_h;
        $thumb_w = $old_x / $ratio2;
    }
    $thumb_w = $new_w;
    $thumb_h = $new_h;
    ;
    // we create a new image with the new dimmensions
    $dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);

    // resize the big image to the new created one
    imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

    // output the created image to the file. Now we will have the thumbnail into the file named by $filename
    if (!strcmp("png", $ext))
        imagepng($dst_img, $filename);
    elseif (!strcmp("gif", $ext))
        imagegif($dst_img, $filename);
    else
        imagejpeg($dst_img, $filename);

    //destroys source and destination images.
    imagedestroy($dst_img);
    imagedestroy($src_img);
}
?>