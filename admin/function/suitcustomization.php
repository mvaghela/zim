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

	$del_sql="DELETE FROM suitcustomization WHERE `suitcustomizationid` = '".$_REQUEST['delall']."'"; 
    $del_cat=$obj_db->sql_query($del_sql);
	
	deleteDir('upload/suit/'.$productname);

	header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=deleted" );
   die();
}

if(isset($_REQUEST['del']))
{
	$productid=$_REQUEST['productid'];
	$sql = "SELECT * FROm `suitcustomization` WHERE `suitcustomizationid`='".$_REQUEST['del']."'";
	$result_image = $obj_db->select($sql);
	
	switch($_REQUEST['field'])
	{
		
		case 'two_piece':
			$name = $result_image[0]['two_piece'];
			$field_name = 'two_piece';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'three_piece':
			$name = $result_image[0]['three_piece'];
			$field_name = 'three_piece';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;

//	---------------------------------------------------------------///
		case 'type_peak_lapel':
			$name = $result_image[0]['type_peak_lapel'];
			$field_name = 'type_peak_lapel';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'type_notch_lapel':
			$name = $result_image[0]['type_notch_lapel'];
			$field_name = 'type_notch_lapel';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'type_slim_notch_lapel':
			$name = $result_image[0]['type_slim_notch_lapel'];
			$field_name = 'type_slim_notch_lapel';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'type_shawl_lapel':
			$name = $result_image[0]['type_shawl_lapel'];
			$field_name = 'type_shawl_lapel';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'type_mao_lapel':
			$name = $result_image[0]['type_mao_lapel'];
			$field_name = 'type_mao_lapel';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///

			
		case 'vents_one':
			$name = $result_image[0]['vents_one'];
			$field_name = 'vents_one';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vents_two':
			$name = $result_image[0]['vents_two'];
			$field_name = 'vents_two';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vents_none':
			$name = $result_image[0]['vents_none'];
			$field_name = 'vents_none';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;

//	---------------------------------------------------------------///
		
		case 'button_one':
			$name = $result_image[0]['button_one'];
			$field_name = 'button_one';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'button_two':
			$name = $result_image[0]['button_two'];
			$field_name = 'button_two';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'button_three':
			$name = $result_image[0]['button_three'];
			$field_name = 'button_three';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'button_double_breasted':
			$name = $result_image[0]['button_double_breasted'];
			$field_name = 'button_double_breasted';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
			
			
//	---------------------------------------------------------------///

			
		case 'pocket_straight_flap':
			$name = $result_image[0]['pocket_straight_flap'];
			$field_name = 'pocket_straight_flap';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'pocket_slanted_flap':
			$name = $result_image[0]['pocket_slanted_flap'];
			$field_name = 'pocket_slanted_flap';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'pocket_piped_flap':
			$name = $result_image[0]['pocket_piped_flap'];
			$field_name = 'pocket_piped_flap';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'pocket_patch_flap':
			$name = $result_image[0]['pocket_patch_flap'];
			$field_name = 'pocket_patch_flap';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
			
			
//	---------------------------------------------------------------///



		case 'breast_pocket_yes':
			$name = $result_image[0]['breast_pocket_yes'];
			$field_name = 'breast_pocket_yes';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'breast_pocket_no':
			$name = $result_image[0]['breast_pocket_no'];
			$field_name = 'breast_pocket_no';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;

		case 'ticket_pocket_yes':
			$name = $result_image[0]['ticket_pocket_yes'];
			$field_name = 'ticket_pocket_yes';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'ticket_pocket_no':
			$name = $result_image[0]['ticket_pocket_no'];
			$field_name = 'ticket_pocket_no';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
			
			
//	---------------------------------------------------------------///


		case 'sleeve_buttons_working':
			$name = $result_image[0]['sleeve_buttons_working'];
			$field_name = 'sleeve_buttons_working';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'sleeve_buttons_overlapping':
			$name = $result_image[0]['sleeve_buttons_overlapping'];
			$field_name = 'sleeve_buttons_overlapping';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///
	
		
		case 'lapel_buttonhole_yes':
			$name = $result_image[0]['lapel_buttonhole_yes'];
			$field_name = 'lapel_buttonhole_yes';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'lapel_buttonhole_no':
			$name = $result_image[0]['lapel_buttonhole_no'];
			$field_name = 'lapel_buttonhole_no';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///
	
		
		case 'inner_linings':
			$name = $result_image[0]['inner_linings'];
			$field_name = 'inner_linings';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///
	
		
		case 'vests_button_three':
			$name = $result_image[0]['vests_button_three'];
			$field_name = 'vests_button_three';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_button_four':
			$name = $result_image[0]['vests_button_four'];
			$field_name = 'vests_button_four';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_button_five':
			$name = $result_image[0]['vests_button_five'];
			$field_name = 'vests_button_five';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_button_six':
			$name = $result_image[0]['vests_button_six'];
			$field_name = 'vests_button_six';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_button_seven':
			$name = $result_image[0]['vests_button_seven'];
			$field_name = 'vests_button_seven';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
			
			
//	---------------------------------------------------------------///


		case 'vests_back_interlining':
			$name = $result_image[0]['vests_back_interlining'];
			$field_name = 'vests_back_interlining';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_back_normal':
			$name = $result_image[0]['vests_back_normal'];
			$field_name = 'vests_back_normal';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
			
			
//	---------------------------------------------------------------///

			
		case 'vests_pocket_straight':
			$name = $result_image[0]['vests_pocket_straight'];
			$field_name = 'vests_pocket_straight';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_pocket_slanted':
			$name = $result_image[0]['vests_pocket_slanted'];
			$field_name = 'vests_pocket_slanted';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_pocket_piped':
			$name = $result_image[0]['vests_pocket_piped'];
			$field_name = 'vests_pocket_piped';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///


		case 'vests_breast_pocket_yes':
			$name = $result_image[0]['vests_breast_pocket_yes'];
			$field_name = 'vests_breast_pocket_yes';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'vests_breast_pocket_no':
			$name = $result_image[0]['vests_breast_pocket_no'];
			$field_name = 'vests_breast_pocket_no';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;

//	---------------------------------------------------------------///
		
		
		case 'back_sidepleats':
			$name = $result_image[0]['back_sidepleats'];
			$field_name = 'back_sidepleats';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'back_boxpleats':
			$name = $result_image[0]['back_boxpleats'];
			$field_name = 'back_boxpleats';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
		case 'back_nopleats':
			$name = $result_image[0]['back_nopleats'];
			$field_name = 'back_nopleats';
			//Deleting main image
			$newname = "upload/suit/".$productname."/". $name;
            unlink($newname);
			break;
	}
	$updatesql = "UPDATE `suitcustomization` SET `".$field_name."`='' WHERE `suitcustomizationid`='".$_REQUEST['del']."'";
	$update=$obj_db->sql_query($updatesql); 
	header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
}

if(isset($_REQUEST['submit'])) {
	$productid=$_REQUEST['productid'];
	
	$extension = getExtension($_FILES['two_piece']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['two_piece']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['two_piece']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$two_piece_cond = "`two_piece`='$name',";
		$two_piece_inst_cond = "`two_piece`,";
		$two_piece_inst_cond2 = "'$name',";
    }

	$extension = getExtension($_FILES['three_piece']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['three_piece']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['three_piece']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$three_piece_cond = "`three_piece`='$name',";
		$three_piece_inst_cond = "`three_piece`,";
		$three_piece_inst_cond2 = "'$name',";
    }

	//echo $productname; die();
//	---------------------------------------------------------------///

    $extension = getExtension($_FILES['type_peak_lapel']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	if ($_FILES['type_peak_lapel']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{

			$folder = mkdir("upload/suit/".$productname, 0777);
			$name = $productname.$uni . '.' . $extension;
			$target_path = "upload/suit/".$productname."/";
			$target_path = $target_path . basename($name);
			//$target_path = "upload/suit/" .$productname."/".basename($name);
   				if(move_uploaded_file($_FILES['type_peak_lapel']['tmp_name'], $target_path)) { 
	                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
            
	$type_peak_lapel_cond = "`type_peak_lapel`='$name',";
	$type_peak_lapel_inst_cond = "`type_peak_lapel`,";
	$type_peak_lapel_inst_cond2 = "'$name',";
	}
	
   
    $extension = getExtension($_FILES['type_notch_lapel']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['type_notch_lapel']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['type_notch_lapel']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$type_notch_lapel_cond = "`type_notch_lapel`='$name',";
		$type_notch_lapel_inst_cond = "`type_notch_lapel`,";
		$type_notch_lapel_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['type_slim_notch_lapel']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['type_slim_notch_lapel']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['type_slim_notch_lapel']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$type_slim_notch_lapel_cond = "`type_slim_notch_lapel`='$name',";
		$type_slim_notch_lapel_inst_cond = "`type_slim_notch_lapel`,";
		$type_slim_notch_lapel_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['type_shawl_lapel']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['type_shawl_lapel']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['type_shawl_lapel']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$type_shawl_lapel_cond = "`type_shawl_lapel`='$name',";
		$type_shawl_lapel_inst_cond = "`type_shawl_lapel`,";
		$type_shawl_lapel_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['type_mao_lapel']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['type_mao_lapel']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['type_mao_lapel']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$type_mao_lapel_cond = "`type_mao_lapel`='$name',";
		$type_mao_lapel_inst_cond = "`type_mao_lapel`,";
		$type_mao_lapel_inst_cond2 = "'$name',";
    }
	
	

//	---------------------------------------------------------------///
	
	
	$extension = getExtension($_FILES['vents_one']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vents_one']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vents_one']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vents_one_cond = "`vents_one`='$name',";
		$vents_one_inst_cond = "`vents_one`,";
		$vents_one_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['vents_two']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vents_two']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vents_two']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vents_two_cond = "`vents_two`='$name',";
		$vents_two_inst_cond = "`vents_two`,";
		$vents_two_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['vents_none']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vents_none']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vents_none']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vents_none_cond = "`vents_none`='$name',";
		$vents_none_inst_cond = "`vents_none`,";
		$vents_none_inst_cond2 = "'$name',";
    }
	

//	---------------------------------------------------------------///	
	
	$extension = getExtension($_FILES['button_one']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['button_one']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
			
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['button_one']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$button_one_cond = "`button_one`='$name',";
		$button_one_inst_cond = "`button_one`,";
		$button_one_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['button_two']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['button_two']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['button_two']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$button_two_cond = "`button_two`='$name',";
		$button_two_inst_cond = "`button_two`,";
		$button_two_inst_cond2 = "'$name',";
    }
	
	
	
	$extension = getExtension($_FILES['button_three']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['button_three']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['button_three']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$button_three_cond = "`button_three`='$name',";
		$button_three_inst_cond = "`button_three`,";
		$button_three_inst_cond2 = "'$name',";


    }
	
	
	
	$extension = getExtension($_FILES['button_double_breasted']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['button_double_breasted']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['button_double_breasted']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$button_double_breasted_cond = "`button_double_breasted`='$name',";
		$button_double_breasted_inst_cond = "`button_double_breasted`,";
		$button_double_breasted_inst_cond2 = "'$name',";
    }
	
//	---------------------------------------------------------------///


	
	$extension = getExtension($_FILES['pocket_straight_flap']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_straight_flap']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_straight_flap']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_straight_flap_cond = "`pocket_straight_flap`='$name',";
		$pocket_straight_flap_inst_cond = "`pocket_straight_flap`,";
		$pocket_straight_flap_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['pocket_slanted_flap']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_slanted_flap']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_slanted_flap']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_slanted_flap_cond = "`pocket_slanted_flap`='$name',";
		$pocket_slanted_flap_inst_cond = "`pocket_slanted_flap`,";
		$pocket_slanted_flap_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['pocket_piped_flap']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_piped_flap']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
           $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_piped_flap']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_piped_flap_cond = "`pocket_piped_flap`='$name',";
		$pocket_piped_flap_inst_cond = "`pocket_piped_flap`,";
		$pocket_piped_flap_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['pocket_patch_flap']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_patch_flap']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
			
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_patch_flap']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_patch_flap_cond = "`pocket_patch_flap`='$name',";
		$pocket_patch_flap_inst_cond = "`pocket_patch_flap`,";
		$pocket_patch_flap_inst_cond2 = "'$name',";
    }
	

//	---------------------------------------------------------------///
	

	
	$extension = getExtension($_FILES['breast_pocket_yes']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['breast_pocket_yes']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['breast_pocket_yes']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$breast_pocket_yes_cond = "`breast_pocket_yes`='$name',";
		$breast_pocket_yes_inst_cond = "`breast_pocket_yes`,";
		$breast_pocket_yes_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['breast_pocket_no']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['breast_pocket_no']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['breast_pocket_no']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$breast_pocket_no_cond = "`breast_pocket_no`='$name',";
		$breast_pocket_no_inst_cond = "`breast_pocket_no`,";
		$breast_pocket_no_inst_cond2 = "'$name',";
    }


//	---------------------------------------------------------------///

	
	$extension = getExtension($_FILES['ticket_pocket_yes']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['ticket_pocket_yes']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);

            if (move_uploaded_file($_FILES['ticket_pocket_yes']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$ticket_pocket_yes_cond = "`ticket_pocket_yes`='$name',";
		$ticket_pocket_yes_inst_cond = "`ticket_pocket_yes`,";
		$ticket_pocket_yes_inst_cond2 = "'$name',";
    }

	
	$extension = getExtension($_FILES['ticket_pocket_no']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['ticket_pocket_no']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);

            if (move_uploaded_file($_FILES['ticket_pocket_no']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$ticket_pocket_no_cond = "`ticket_pocket_no`='$name',";
		$ticket_pocket_no_inst_cond = "`ticket_pocket_no`,";
		$ticket_pocket_no_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['sleeve_buttons_working']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['sleeve_buttons_working']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['sleeve_buttons_working']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$sleeve_buttons_working_cond = "`sleeve_buttons_working`='$name',";
		$sleeve_buttons_working_inst_cond = "`sleeve_buttons_working`,";
		$sleeve_buttons_working_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['sleeve_buttons_overlapping']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['sleeve_buttons_overlapping']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['sleeve_buttons_overlapping']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$sleeve_buttons_overlapping_cond = "`sleeve_buttons_overlapping`='$name',";
		$sleeve_buttons_overlapping_inst_cond = "`sleeve_buttons_overlapping`,";
		$sleeve_buttons_overlapping_inst_cond2 = "'$name',";
    }
	
	

	
//	-------------------------------------------------------------------------------------------------------------------------///
	$extension = getExtension($_FILES['lapel_buttonhole_yes']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['lapel_buttonhole_yes']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['lapel_buttonhole_yes']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$lapel_buttonhole_yes_cond = "`lapel_buttonhole_yes`='$name',";
		$lapel_buttonhole_yes_inst_cond = "`lapel_buttonhole_yes`,";
		$lapel_buttonhole_yes_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['lapel_buttonhole_no']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['lapel_buttonhole_no']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['lapel_buttonhole_no']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }

		$lapel_buttonhole_no_cond = "`lapel_buttonhole_no`='$name',";
		$lapel_buttonhole_no_inst_cond = "`lapel_buttonhole_no`,";
		$lapel_buttonhole_no_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['inner_linings']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['inner_linings']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['inner_linings']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$inner_linings_cond = "`inner_linings`='$name',";
		$inner_linings_inst_cond = "`inner_linings`,";
		$inner_linings_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['vests_button_three']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_button_three']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_button_three']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_button_three_cond = "`vests_button_three`='$name',";
		$vests_button_three_inst_cond = "`vests_button_three`,";
		$vests_button_three_inst_cond2 = "'$name',";
    }
	

	$extension = getExtension($_FILES['vests_button_four']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_button_four']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_button_four']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_button_four_cond = "`vests_button_four`='$name',";
		$vests_button_four_inst_cond = "`vests_button_four`,";
		$vests_button_four_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['vests_button_five']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_button_five']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_button_five']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_button_five_cond = "`vests_button_five`='$name',";
		$vests_button_five_inst_cond = "`vests_button_five`,";
		$vests_button_five_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['vests_button_six']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_button_six']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_button_six']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_button_six_cond = "`vests_button_six`='$name',";
		$vests_button_six_inst_cond = "`vests_button_six`,";
		$vests_button_six_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['vests_button_seven']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_button_seven']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_button_seven']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_button_seven_cond = "`vests_button_seven`='$name',";
		$vests_button_seven_inst_cond = "`vests_button_seven`,";
		$vests_button_seven_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['vests_back_interlining']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_back_interlining']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_back_interlining']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_back_interlining_cond = "`vests_back_interlining`='$name',";
		$vests_back_interlining_inst_cond = "`vests_back_interlining`,";
		$vests_back_interlining_inst_cond2 = "'$name',";
    }
	

	
//-------------------------------------------------------------------------------------------------------------------------------------//	
	$extension = getExtension($_FILES['vests_back_normal']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_back_normal']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_back_normal']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_back_normal_cond = "`vests_back_normal`='$name',";
		$vests_back_normal_inst_cond = "`vests_back_normal`,";
		$vests_back_normal_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['vests_pocket_straight']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_pocket_straight']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_pocket_straight']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_pocket_straight_cond = "`vests_pocket_straight`='$name',";
		$vests_pocket_straight_inst_cond = "`vests_pocket_straight`,";
		$vests_pocket_straight_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['vests_pocket_slanted']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_pocket_slanted']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_pocket_slanted']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_pocket_slanted_cond = "`vests_pocket_slanted`='$name',";
		$vests_pocket_slanted_inst_cond = "`vests_pocket_slanted`,";
		$vests_pocket_slanted_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['vests_pocket_piped']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_pocket_piped']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_pocket_piped']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_pocket_piped_cond = "`vests_pocket_piped`='$name',";
		$vests_pocket_piped_inst_cond = "`vests_pocket_piped`,";
		$vests_pocket_piped_inst_cond2 = "'$name',";
    }
	
//-------------------------------------------------------------------------------------------------------------------------------------//	

	$extension = getExtension($_FILES['vests_breast_pocket_yes']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_breast_pocket_yes']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_breast_pocket_yes']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_breast_pocket_yes_cond = "`vests_breast_pocket_yes`='$name',";
		$vests_breast_pocket_yes_inst_cond = "`vests_breast_pocket_yes`,";
		$vests_breast_pocket_yes_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['vests_breast_pocket_no']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['vests_breast_pocket_no']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['vests_breast_pocket_no']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$vests_breast_pocket_no_cond = "`vests_breast_pocket_no`='$name',";
		$vests_breast_pocket_no_inst_cond = "`vests_breast_pocket_no`,";
		$vests_breast_pocket_no_inst_cond2 = "'$name',";
    }
	

	

	
	
	
	$extension = getExtension($_FILES['front_noplacket']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_noplacket']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['front_noplacket']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$front_noplacket_cond = "`front_noplacket`='$name',";
		$front_noplacket_inst_cond = "`front_noplacket`,";
		$front_noplacket_inst_cond2 = "'$name',";
    }

	
//-------------------------------------------------------------------------------------------------------------------------------------//	

	
	$extension = getExtension($_FILES['back_sidepleats']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['back_sidepleats']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['back_sidepleats']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$back_sidepleats_cond = "`back_sidepleats`='$name',";
		$back_sidepleats_inst_cond = "`back_sidepleats`,";
		$back_sidepleats_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['back_boxpleats']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['back_boxpleats']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['back_boxpleats']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$back_boxpleats_cond = "`back_boxpleats`='$name',";
		$back_boxpleats_inst_cond = "`back_boxpleats`,";
		$back_boxpleats_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['back_nopleats']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['back_nopleats']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/suit/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/suit/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['back_nopleats']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/suit/".$productname."/". $name;
            } else {
                header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$back_nopleats_cond = "`back_nopleats`='$name',";
		$back_nopleats_inst_cond = "`back_nopleats`,";
		$back_nopleats_inst_cond2 = "'$name',";
    }
	
	
	if($productid==$_REQUEST['productid']) {
		
	$sql = "SELECT * FROM `suitcustomization` WHERE `productid`='".$_REQUEST['productid']."'";
	$result_image = $obj_db->select($sql);
	
	 if(($result_image))
	 {
		 $update_string = $two_piece_cond."".$three_piece_cond."".$type_peak_lapel_cond."".$type_notch_lapel_cond."".$type_slim_notch_lapel_cond."".$type_shawl_lapel_cond."".$type_mao_lapel_cond."".$vents_one_cond."".$vents_two_cond."".$vents_none_cond."".$button_one_cond."".$button_two_cond."".$button_three_cond."".$button_double_breasted_cond."".$pocket_straight_flap_cond."".$pocket_slanted_flap_cond."".$pocket_piped_flap_cond."".$pocket_patch_flap_cond."".$breast_pocket_yes_cond."".$breast_pocket_no_cond."".$ticket_pocket_yes_cond."".$ticket_pocket_no_cond."".$sleeve_buttons_working_cond."".$sleeve_buttons_overlapping_cond."".$lapel_buttonhole_yes_cond."".$lapel_buttonhole_no_cond."".$inner_linings_cond."".$vests_button_three_cond."".$vests_button_four_cond."".$vests_button_five_cond."".$vests_button_six_cond."".$vests_button_seven_cond."".$vests_back_interlining_cond."".$vests_back_normal_cond."".$vests_pocket_straight_cond."".$vests_pocket_slanted_cond."".$vests_pocket_piped_cond."".$vests_breast_pocket_yes_cond."".$vests_breast_pocket_no_cond."".$front_noplacket_cond."".$back_sidepleats_cond."".$back_boxpleats_cond."".$back_nopleats_cond;
		
			$update_string = substr($update_string,0,(strlen($update_string)-1));
		
	 	  	$sql_user="UPDATE suitcustomization SET ".$update_string."  
				WHERE `suitcustomizationid` = '".$result_image[0]['suitcustomizationid']."' LIMIT 1"; //die();
	 $update=$obj_db->sql_query($sql_user); 
	header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
   die();
	} else 
	  {
       $sql="INSERT INTO suitcustomization (`productid`, ".$two_piece_inst_cond."  ".$three_piece_inst_cond." ".$type_peak_lapel_inst_cond."  ".$type_notch_lapel_inst_cond."  ".$type_slim_notch_lapel_inst_cond."  ".$type_shawl_lapel_inst_cond."  ".$type_mao_lapel_inst_cond."  ".$vents_one_inst_cond."  ".$vents_two_inst_cond."  ".$vents_none_inst_cond."  ".$button_one_inst_cond."  ".$button_two_inst_cond."  ".$button_three_inst_cond."  ".$button_double_breasted_inst_cond."  ".$pocket_straight_flap_inst_cond."   ".$pocket_slanted_flap_inst_cond."  ".$pocket_piped_flap_inst_cond." ".$pocket_patch_flap_inst_cond."  ".$breast_pocket_yes_inst_cond."  ".$breast_pocket_no_inst_cond."  ".$ticket_pocket_yes_inst_cond."  ".$ticket_pocket_no_inst_cond."  ".$sleeve_buttons_working_inst_cond."  ".$sleeve_buttons_overlapping_inst_cond."  ".$lapel_buttonhole_yes_inst_cond."  ".$lapel_buttonhole_no_inst_cond."  ".$inner_linings_inst_cond."  ".$vests_button_three_inst_cond."  ".$vests_button_four_inst_cond."  ".$vests_button_five_inst_cond."  ".$vests_button_six_inst_cond."  ".$vests_button_seven_inst_cond."  ".$vests_back_interlining_inst_cond."  ".$vests_back_normal_inst_cond."  ".$vests_pocket_straight_inst_cond." ".$vests_pocket_slanted_inst_cond." ".$vests_pocket_piped_inst_cond."  ".$vests_breast_pocket_yes_inst_cond."  ".$vests_breast_pocket_no_inst_cond."  ".$front_noplacket_inst_cond."  ".$back_sidepleats_inst_cond." ".$back_boxpleats_inst_cond." ".$back_nopleats_inst_cond." `adate`) 
		VALUES ('$productid',".$two_piece_inst_cond2."  ".$three_piece_inst_cond2."  ".$type_peak_lapel_inst_cond2."   ".$type_notch_lapel_inst_cond2."  ".$type_slim_notch_lapel_inst_cond2."   ".$type_shawl_lapel_inst_cond2."  ".$type_mao_lapel_inst_cond2."  ".$vents_one_inst_cond2."  ".$vents_two_inst_cond2."  ".$vents_none_inst_cond2."  ".$button_one_inst_cond2."  ".$button_two_inst_cond2."  ".$button_three_inst_cond2."   ".$button_double_breasted_inst_cond2."   ".$pocket_straight_flap_inst_cond2."   ".$pocket_slanted_flap_inst_cond2."  ".$pocket_piped_flap_inst_cond2."  ".$pocket_patch_flap_inst_cond2."  ".$breast_pocket_yes_inst_cond2."  ".$breast_pocket_no_inst_cond2."  ".$ticket_pocket_yes_inst_cond2."  ".$ticket_pocket_no_inst_cond2." " .$sleeve_buttons_working_inst_cond2."  ".$sleeve_buttons_overlapping_inst_cond2."  ".$lapel_buttonhole_yes_inst_cond2."  ".$lapel_buttonhole_no_inst_cond2."  ".$inner_linings_inst_cond2."  ".$vests_button_three_inst_cond2."  ".$vests_button_four_inst_cond2." ".$vests_button_five_inst_cond2."  ".$vests_button_six_inst_cond2."  ".$vests_button_seven_inst_cond2."  ".$vests_back_interlining_inst_cond2."  ".$vests_back_normal_inst_cond2." ".$vests_pocket_straight_inst_cond2." ".$vests_pocket_slanted_inst_cond2." ".$vests_pocket_piped_inst_cond2." ".$vests_breast_pocket_yes_inst_cond2."  ".$vests_breast_pocket_no_inst_cond2."  ".$front_noplacket_inst_cond2."  ".$back_sidepleats_inst_cond2." ".$back_boxpleats_inst_cond2." ".$back_nopleats_inst_cond2."  NOW())";  //die();
		 $recordinserted=$obj_db->insert($sql); 
		 $lastid=mysql_insert_id();
		 header("location:suitcustomization.php?productid=".$_REQUEST['productid']."&msg=added" );
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