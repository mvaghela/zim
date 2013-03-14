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

	$del_sql="DELETE FROM shirtcustomization WHERE `shirtcustomizationid` = '".$_REQUEST['delall']."'"; 
    $del_cat=$obj_db->sql_query($del_sql);
	
	deleteDir('upload/shirt/'.$productname);

	header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=deleted" );
   die();
}

if(isset($_REQUEST['del']))
{
	$productid=$_REQUEST['productid'];
	$sql = "SELECT * FROm `shirtcustomization` WHERE `shirtcustomizationid`='".$_REQUEST['del']."'";
	$result_image = $obj_db->select($sql);
	
	switch($_REQUEST['field'])
	{
		
//	---------------------------------------------------------------///
		case 'fit_slimfit':
			$name = $result_image[0]['fit_slimfit'];
			$field_name = 'fit_slimfit';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'fit_normalfit':
			$name = $result_image[0]['fit_normalfit'];
			$field_name = 'fit_normalfit';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'fit_loosefit':
			$name = $result_image[0]['fit_loosefit'];
			$field_name = 'fit_loosefit';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;

		
//	---------------------------------------------------------------///
		
		case 'style_full_fit_slimfit_sleeve':
			$name = $result_image[0]['style_full_fit_slimfit_sleeve'];
			$field_name = 'style_full_fit_slimfit_sleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'style_half_fit_slimfit_sleeve':
			$name = $result_image[0]['style_half_fit_slimfit_sleeve'];
			$field_name = 'style_half_fit_slimfit_sleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'style_full_fit_normalfit_sleeve':
			$name = $result_image[0]['style_full_fit_normalfit_sleeve'];
			$field_name = 'style_full_fit_normalfit_sleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'style_half_fit_normalfit_sleeve':
			$name = $result_image[0]['style_half_fit_normalfit_sleeve'];
			$field_name = 'style_half_fit_normalfit_sleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'style_full_fit_loosefit_sleeve':
			$name = $result_image[0]['style_full_fit_loosefit_sleeve'];
			$field_name = 'style_full_fit_loosefit_sleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'style_half_fit_loosefit_sleeve':
			$name = $result_image[0]['style_half_fit_loosefit_sleeve'];
			$field_name = 'style_half_fit_loosefit_sleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;

//	---------------------------------------------------------------///
		
		case 'collar_straight':
			$name = $result_image[0]['collar_straight'];
			$field_name = 'collar_straight';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_classic':
			$name = $result_image[0]['collar_classic'];
			$field_name = 'collar_classic';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_spread':
			$name = $result_image[0]['collar_spread'];
			$field_name = 'collar_spread';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_cutaway':
			$name = $result_image[0]['collar_cutaway'];
			$field_name = 'collar_cutaway';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_fullcutaway':
			$name = $result_image[0]['collar_fullcutaway'];
			$field_name = 'collar_fullcutaway';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_englishcutaway':
			$name = $result_image[0]['collar_englishcutaway'];
			$field_name = 'collar_englishcutaway';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_curvedcutaway':
			$name = $result_image[0]['collar_curvedcutaway'];
			$field_name = 'collar_curvedcutaway';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_cutawaybutton':
			$name = $result_image[0]['collar_cutawaybutton'];
			$field_name = 'collar_cutawaybutton';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_bandedcollar':
			$name = $result_image[0]['collar_bandedcollar'];
			$field_name = 'collar_bandedcollar';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_wingup':
			$name = $result_image[0]['collar_wingup'];
			$field_name = 'collar_wingup';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_buttondown':
			$name = $result_image[0]['collar_buttondown'];
			$field_name = 'collar_buttondown';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'collar_rounded':
			$name = $result_image[0]['collar_rounded'];
			$field_name = 'collar_rounded';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///
	
		
		case 'cuff_singlebuttonmiter':
			$name = $result_image[0]['cuff_singlebuttonmiter'];
			$field_name = 'cuff_singlebuttonmiter';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_doublebuttonmiter':
			$name = $result_image[0]['cuff_doublebuttonmiter'];
			$field_name = 'cuff_doublebuttonmiter';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_frenchbuttonmiter':
			$name = $result_image[0]['cuff_frenchbuttonmiter'];
			$field_name = 'cuff_frenchbuttonmiter';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_singlebuttonround':
			$name = $result_image[0]['cuff_singlebuttonround'];
			$field_name = 'cuff_singlebuttonround';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_doublebuttonround':
			$name = $result_image[0]['cuff_doublebuttonround'];
			$field_name = 'cuff_doublebuttonround';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_frenchbuttonround':
			$name = $result_image[0]['cuff_frenchbuttonround'];
			$field_name = 'cuff_frenchbuttonround';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_singlebuttonsquare':
			$name = $result_image[0]['cuff_singlebuttonsquare'];
			$field_name = 'cuff_singlebuttonsquare';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_doublebuttonsquare':
			$name = $result_image[0]['cuff_doublebuttonsquare'];
			$field_name = 'cuff_doublebuttonsquare';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'cuff_frenchbuttonsquare':
			$name = $result_image[0]['cuff_frenchbuttonsquare'];
			$field_name = 'cuff_frenchbuttonsquare';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
			
//	---------------------------------------------------------------///
			
		case 'pocket_miter':
			$name = $result_image[0]['pocket_miter'];
			$field_name = 'pocket_miter';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'pocket_round':
			$name = $result_image[0]['pocket_round'];
			$field_name = 'pocket_round';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'pocket_square':
			$name = $result_image[0]['pocket_square'];
			$field_name = 'pocket_square';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'pocket_vshape':
			$name = $result_image[0]['pocket_vshape'];
			$field_name = 'pocket_vshape';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;


//	---------------------------------------------------------------///

		case 'front_placket':
			$name = $result_image[0]['front_placket'];
			$field_name = 'front_placket';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'front_covered':
			$name = $result_image[0]['front_covered'];
			$field_name = 'front_covered';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'front_noplacket':
			$name = $result_image[0]['front_noplacket'];
			$field_name = 'front_noplacket';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;

//	---------------------------------------------------------------///
		
		
		case 'back_sidepleats':
			$name = $result_image[0]['back_sidepleats'];
			$field_name = 'back_sidepleats';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'back_boxpleats':
			$name = $result_image[0]['back_boxpleats'];
			$field_name = 'back_boxpleats';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'back_nopleats':
			$name = $result_image[0]['back_nopleats'];
			$field_name = 'back_nopleats';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
	}
	$updatesql = "UPDATE `shirtcustomization` SET `".$field_name."`='' WHERE `shirtcustomizationid`='".$_REQUEST['del']."'";
	$update=$obj_db->sql_query($updatesql); 
	header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
}

if(isset($_REQUEST['submit'])) {
	$productid=$_REQUEST['productid'];
	//echo $productname; die();
//	---------------------------------------------------------------///

    $extension = getExtension($_FILES['fit_slimfit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	if ($_FILES['fit_slimfit']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{

			$folder = mkdir("upload/shirt/".$productname, 0777);
			$name = $productname.$uni . '.' . $extension;
			$target_path = "upload/shirt/".$productname."/";
			$target_path = $target_path . basename($name);
			//$target_path = "upload/shirt/" .$productname."/".basename($name);
   				if(move_uploaded_file($_FILES['fit_slimfit']['tmp_name'], $target_path)) { 
	                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
            
	$fit_slimfit_cond = "`fit_slimfit`='$name',";
	$fit_slimfit_inst_cond = "`fit_slimfit`,";
	$fit_slimfit_inst_cond2 = "'$name',";
	}
	
   
    $extension = getExtension($_FILES['fit_normalfit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['fit_normalfit']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['fit_normalfit']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$fit_normalfit_cond = "`fit_normalfit`='$name',";
		$fit_normalfit_inst_cond = "`fit_normalfit`,";
		$fit_normalfit_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['fit_loosefit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['fit_loosefit']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['fit_loosefit']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$fit_loosefit_cond = "`fit_loosefit`='$name',";
		$fit_loosefit_inst_cond = "`fit_loosefit`,";
		$fit_loosefit_inst_cond2 = "'$name',";
    }
	
//	---------------------------------------------------------------///
	$extension = getExtension($_FILES['style_full_fit_slimfit_sleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_full_fit_slimfit_sleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_full_fit_slimfit_sleeve']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$style_full_fit_slimfit_sleeve_cond = "`style_full_fit_slimfit_sleeve`='$name',";
		$style_full_fit_slimfit_sleeve_inst_cond = "`style_full_fit_slimfit_sleeve`,";
		$style_full_fit_slimfit_sleeve_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['style_half_fit_slimfit_sleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_half_fit_slimfit_sleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_half_fit_slimfit_sleeve']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$style_half_fit_slimfit_sleeve_cond = "`style_half_fit_slimfit_sleeve`='$name',";
		$style_half_fit_slimfit_sleeve_inst_cond = "`style_half_fit_slimfit_sleeve`,";
		$style_half_fit_slimfit_sleeve_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['style_full_fit_normalfit_sleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_full_fit_normalfit_sleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_full_fit_normalfit_sleeve']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$style_full_fit_normalfit_sleeve_cond = "`style_full_fit_normalfit_sleeve`='$name',";
		$style_full_fit_normalfit_sleeve_inst_cond = "`style_full_fit_normalfit_sleeve`,";
		$style_full_fit_normalfit_sleeve_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['style_half_fit_normalfit_sleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_half_fit_normalfit_sleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_half_fit_normalfit_sleeve']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$style_half_fit_normalfit_sleeve_cond = "`style_half_fit_normalfit_sleeve`='$name',";
		$style_half_fit_normalfit_sleeve_inst_cond = "`style_half_fit_normalfit_sleeve`,";
		$style_half_fit_normalfit_sleeve_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['style_full_fit_loosefit_sleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_full_fit_loosefit_sleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_full_fit_loosefit_sleeve']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$style_full_fit_loosefit_sleeve_cond = "`style_full_fit_loosefit_sleeve`='$name',";
		$style_full_fit_loosefit_sleeve_inst_cond = "`style_full_fit_loosefit_sleeve`,";
		$style_full_fit_loosefit_sleeve_inst_cond2 = "'$name',";
    }
	
	
	$extension = getExtension($_FILES['style_half_fit_loosefit_sleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_half_fit_loosefit_sleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_half_fit_loosefit_sleeve']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$style_half_fit_loosefit_sleeve_cond = "`style_half_fit_loosefit_sleeve`='$name',";
		$style_half_fit_loosefit_sleeve_inst_cond = "`style_half_fit_loosefit_sleeve`,";
		$style_half_fit_loosefit_sleeve_inst_cond2 = "'$name',";
    }
	

//	---------------------------------------------------------------///	
	
	$extension = getExtension($_FILES['collar_straight']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_straight']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
			
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_straight']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_straight_cond = "`collar_straight`='$name',";
		$collar_straight_inst_cond = "`collar_straight`,";
		$collar_straight_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['collar_classic']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_classic']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_classic']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_classic_cond = "`collar_classic`='$name',";
		$collar_classic_inst_cond = "`collar_classic`,";
		$collar_classic_inst_cond2 = "'$name',";
    }
	
	

	
	
	$extension = getExtension($_FILES['collar_spread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_spread']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_spread']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_spread_cond = "`collar_spread`='$name',";
		$collar_spread_inst_cond = "`collar_spread`,";
		$collar_spread_inst_cond2 = "'$name',";


    }
	
	

	
	$extension = getExtension($_FILES['collar_cutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_cutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_cutaway']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_cutaway_cond = "`collar_cutaway`='$name',";
		$collar_cutaway_inst_cond = "`collar_cutaway`,";
		$collar_cutaway_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_fullcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_fullcutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_fullcutaway']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_fullcutaway_cond = "`collar_fullcutaway`='$name',";
		$collar_fullcutaway_inst_cond = "`collar_fullcutaway`,";
		$collar_fullcutaway_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['collar_englishcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_englishcutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_englishcutaway']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_englishcutaway_cond = "`collar_englishcutaway`='$name',";
		$collar_englishcutaway_inst_cond = "`collar_englishcutaway`,";
		$collar_englishcutaway_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_curvedcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_curvedcutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
           $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_curvedcutaway']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_curvedcutaway_cond = "`collar_curvedcutaway`='$name',";
		$collar_curvedcutaway_inst_cond = "`collar_curvedcutaway`,";
		$collar_curvedcutaway_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_cutawaybutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_cutawaybutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
			
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_cutawaybutton']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_cutawaybutton_cond = "`collar_cutawaybutton`='$name',";
		$collar_cutawaybutton_inst_cond = "`collar_cutawaybutton`,";
		$collar_cutawaybutton_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_bandedcollar']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_bandedcollar']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_bandedcollar']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_bandedcollar_cond = "`collar_bandedcollar`='$name',";
		$collar_bandedcollar_inst_cond = "`collar_bandedcollar`,";
		$collar_bandedcollar_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_wingup']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_wingup']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);

            if (move_uploaded_file($_FILES['collar_wingup']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_wingup_cond = "`collar_wingup`='$name',";
		$collar_wingup_inst_cond = "`collar_wingup`,";
		$collar_wingup_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_buttondown']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_buttondown']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_buttondown']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_buttondown_cond = "`collar_buttondown`='$name',";
		$collar_buttondown_inst_cond = "`collar_buttondown`,";
		$collar_buttondown_inst_cond2 = "'$name',";
    }
	
	

	
	$extension = getExtension($_FILES['collar_rounded']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_rounded']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['collar_rounded']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$collar_rounded_cond = "`collar_rounded`='$name',";
		$collar_rounded_inst_cond = "`collar_rounded`,";
		$collar_rounded_inst_cond2 = "'$name',";
    }
	
	

	
//	-------------------------------------------------------------------------------------------------------------------------///
	$extension = getExtension($_FILES['cuff_singlebuttonmiter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_singlebuttonmiter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_singlebuttonmiter']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_singlebuttonmiter_cond = "`cuff_singlebuttonmiter`='$name',";
		$cuff_singlebuttonmiter_inst_cond = "`cuff_singlebuttonmiter`,";
		$cuff_singlebuttonmiter_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['cuff_doublebuttonmiter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_doublebuttonmiter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_doublebuttonmiter']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_doublebuttonmiter_cond = "`cuff_doublebuttonmiter`='$name',";
		$cuff_doublebuttonmiter_inst_cond = "`cuff_doublebuttonmiter`,";
		$cuff_doublebuttonmiter_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_frenchbuttonmiter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_frenchbuttonmiter']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_frenchbuttonmiter_cond = "`cuff_frenchbuttonmiter`='$name',";
		$cuff_frenchbuttonmiter_inst_cond = "`cuff_frenchbuttonmiter`,";
		$cuff_frenchbuttonmiter_inst_cond2 = "'$name',";
    }
	

	
	$extension = getExtension($_FILES['cuff_singlebuttonround']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_singlebuttonround']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_singlebuttonround']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_singlebuttonround_cond = "`cuff_singlebuttonround`='$name',";
		$cuff_singlebuttonround_inst_cond = "`cuff_singlebuttonround`,";
		$cuff_singlebuttonround_inst_cond2 = "'$name',";
    }
	

	$extension = getExtension($_FILES['cuff_doublebuttonround']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_doublebuttonround']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_doublebuttonround']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_doublebuttonround_cond = "`cuff_doublebuttonround`='$name',";
		$cuff_doublebuttonround_inst_cond = "`cuff_doublebuttonround`,";
		$cuff_doublebuttonround_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['cuff_frenchbuttonround']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_frenchbuttonround']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_frenchbuttonround']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_frenchbuttonround_cond = "`cuff_frenchbuttonround`='$name',";
		$cuff_frenchbuttonround_inst_cond = "`cuff_frenchbuttonround`,";
		$cuff_frenchbuttonround_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquare']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_singlebuttonsquare']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_singlebuttonsquare']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_singlebuttonsquare_cond = "`cuff_singlebuttonsquare`='$name',";
		$cuff_singlebuttonsquare_inst_cond = "`cuff_singlebuttonsquare`,";
		$cuff_singlebuttonsquare_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquare']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_doublebuttonsquare']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_doublebuttonsquare']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_doublebuttonsquare_cond = "`cuff_doublebuttonsquare`='$name',";
		$cuff_doublebuttonsquare_inst_cond = "`cuff_doublebuttonsquare`,";
		$cuff_doublebuttonsquare_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquare']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_frenchbuttonsquare']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['cuff_frenchbuttonsquare']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$cuff_frenchbuttonsquare_cond = "`cuff_frenchbuttonsquare`='$name',";
		$cuff_frenchbuttonsquare_inst_cond = "`cuff_frenchbuttonsquare`,";
		$cuff_frenchbuttonsquare_inst_cond2 = "'$name',";
    }
	

	
//-------------------------------------------------------------------------------------------------------------------------------------//	
	$extension = getExtension($_FILES['pocket_miter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_miter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_miter']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_miter_cond = "`pocket_miter`='$name',";
		$pocket_miter_inst_cond = "`pocket_miter`,";
		$pocket_miter_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['pocket_round']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_round']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_round']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_round_cond = "`pocket_round`='$name',";
		$pocket_round_inst_cond = "`pocket_round`,";
		$pocket_round_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['pocket_square']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_square']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_square']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_square_cond = "`pocket_square`='$name',";
		$pocket_square_inst_cond = "`pocket_square`,";
		$pocket_square_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['pocket_vshape']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_vshape']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['pocket_vshape']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$pocket_vshape_cond = "`pocket_vshape`='$name',";
		$pocket_vshape_inst_cond = "`pocket_vshape`,";
		$pocket_vshape_inst_cond2 = "'$name',";
    }
	
//-------------------------------------------------------------------------------------------------------------------------------------//	

	$extension = getExtension($_FILES['front_placket']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_placket']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['front_placket']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$front_placket_cond = "`front_placket`='$name',";
		$front_placket_inst_cond = "`front_placket`,";
		$front_placket_inst_cond2 = "'$name',";
    }
	

	
	
	$extension = getExtension($_FILES['front_covered']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_covered']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['front_covered']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$front_covered_cond = "`front_covered`='$name',";
		$front_covered_inst_cond = "`front_covered`,";
		$front_covered_inst_cond2 = "'$name',";
    }
	

	

	
	
	
	$extension = getExtension($_FILES['front_noplacket']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_noplacket']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['front_noplacket']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
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
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['back_sidepleats']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
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
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['back_boxpleats']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
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
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $productname.$uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['back_nopleats']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/shirt/".$productname."/". $name;
            } else {
                header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=2");
                die();
            }
        } else {
            header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=1");
            die();
        }
		$back_nopleats_cond = "`back_nopleats`='$name',";
		$back_nopleats_inst_cond = "`back_nopleats`,";
		$back_nopleats_inst_cond2 = "'$name',";
    }
	
	
	if($productid==$_REQUEST['productid']) {
		
	$sql = "SELECT * FROM `shirtcustomization` WHERE `productid`='".$_REQUEST['productid']."'";
	$result_image = $obj_db->select($sql);
	
	 if(($result_image))
	 {
		 $update_string = $fit_slimfit_cond."".$fit_normalfit_cond."".$fit_loosefit_cond."".$style_full_fit_slimfit_sleeve_cond."".$style_half_fit_slimfit_sleeve_cond."".$style_full_fit_normalfit_sleeve_cond."".$style_half_fit_normalfit_sleeve_cond."".$style_full_fit_loosefit_sleeve_cond."".$style_half_fit_loosefit_sleeve_cond."".$collar_straight_cond."".$collar_classic_cond."".$collar_spread_cond."".$collar_cutaway_cond."".$collar_fullcutaway_cond."".$collar_englishcutaway_cond."".$collar_curvedcutaway_cond."".$collar_cutawaybutton_cond."".$collar_bandedcollar_cond."".$collar_wingup_cond."".$collar_buttondown_cond."".$collar_rounded_cond."".$cuff_singlebuttonmiter_cond."".$cuff_doublebuttonmiter_cond."".$cuff_frenchbuttonmiter_cond."".$cuff_singlebuttonround_cond."".$cuff_doublebuttonround_cond."".$cuff_frenchbuttonround_cond."".$cuff_singlebuttonsquare_cond."".$cuff_doublebuttonsquare_cond."".$cuff_frenchbuttonsquare_cond."".$pocket_miter_cond."".$pocket_round_cond."".$pocket_square_cond."".$pocket_vshape_cond."".$front_placket_cond."".$front_covered_cond."".$front_noplacket_cond."".$back_sidepleats_cond."".$back_boxpleats_cond."".$back_nopleats_cond;
		
			$update_string = substr($update_string,0,(strlen($update_string)-1));
		
	 	  	$sql_user="UPDATE shirtcustomization SET ".$update_string."  
				WHERE `shirtcustomizationid` = '".$result_image[0]['shirtcustomizationid']."' LIMIT 1"; //die();
	 $update=$obj_db->sql_query($sql_user); 
	header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
   die();
	} else 
	  {
       $sql="INSERT INTO shirtcustomization (`productid`,".$fit_slimfit_inst_cond."  ".$fit_normalfit_inst_cond."  ".$fit_loosefit_inst_cond."  ".$style_full_fit_slimfit_sleeve_inst_cond."  ".$style_half_fit_slimfit_sleeve_inst_cond."  ".$style_full_fit_normalfit_sleeve_inst_cond."  ".$style_half_fit_normalfit_sleeve_inst_cond."  ".$style_full_fit_loosefit_sleeve_inst_cond."  ".$style_half_fit_loosefit_sleeve_inst_cond."  ".$collar_straight_inst_cond."  ".$collar_classic_inst_cond."  ".$collar_spread_inst_cond."  ".$collar_cutaway_inst_cond."  ".$collar_fullcutaway_inst_cond."   ".$collar_englishcutaway_inst_cond."  ".$collar_curvedcutaway_inst_cond." ".$collar_cutawaybutton_inst_cond."  ".$collar_bandedcollar_inst_cond."  ".$collar_wingup_inst_cond."  ".$collar_buttondown_inst_cond."  ".$collar_rounded_inst_cond."  ".$cuff_singlebuttonmiter_inst_cond."  ".$cuff_doublebuttonmiter_inst_cond."  ".$cuff_frenchbuttonmiter_inst_cond."  ".$cuff_singlebuttonround_inst_cond."  ".$cuff_doublebuttonround_inst_cond."  ".$cuff_frenchbuttonround_inst_cond."  ".$cuff_singlebuttonsquare_inst_cond."  ".$cuff_doublebuttonsquare_inst_cond."  ".$cuff_frenchbuttonsquare_inst_cond."  ".$pocket_miter_inst_cond."  ".$pocket_round_inst_cond." ".$pocket_square_inst_cond." ".$pocket_vshape_inst_cond."  ".$front_placket_inst_cond."  ".$front_covered_inst_cond."  ".$front_noplacket_inst_cond."  ".$back_sidepleats_inst_cond." ".$back_boxpleats_inst_cond." ".$back_nopleats_inst_cond." `adate`) 
		VALUES ('$productid',".$fit_slimfit_inst_cond2."   ".$fit_normalfit_inst_cond2."  ".$fit_loosefit_inst_cond2."   ".$style_full_fit_slimfit_sleeve_inst_cond2."  ".$style_half_fit_slimfit_sleeve_inst_cond2."  ".$style_full_fit_normalfit_sleeve_inst_cond2."  ".$style_half_fit_normalfit_sleeve_inst_cond2."  ".$style_full_fit_loosefit_sleeve_inst_cond2."  ".$style_half_fit_loosefit_sleeve_inst_cond2."  ".$collar_straight_inst_cond2."  ".$collar_classic_inst_cond2."  ".$collar_spread_inst_cond2."   ".$collar_cutaway_inst_cond2."   ".$collar_fullcutaway_inst_cond2."   ".$collar_englishcutaway_inst_cond2."  ".$collar_curvedcutaway_inst_cond2."  ".$collar_cutawaybutton_inst_cond2."  ".$collar_bandedcollar_inst_cond2."  ".$collar_wingup_inst_cond2." " .$collar_buttondown_inst_cond2."  ".$collar_rounded_inst_cond2."  ".$cuff_singlebuttonmiter_inst_cond2."  ".$cuff_doublebuttonmiter_inst_cond2."  ".$cuff_frenchbuttonmiter_inst_cond2."  ".$cuff_singlebuttonround_inst_cond2."  ".$cuff_doublebuttonround_inst_cond2." ".$cuff_frenchbuttonround_inst_cond2."  ".$cuff_singlebuttonsquare_inst_cond2."  ".$cuff_doublebuttonsquare_inst_cond2."  ".$cuff_frenchbuttonsquare_inst_cond2."  ".$pocket_miter_inst_cond2." ".$pocket_round_inst_cond2." ".$pocket_square_inst_cond2." ".$pocket_vshape_inst_cond2." ".$front_placket_inst_cond2."  ".$front_covered_inst_cond2."  ".$front_noplacket_inst_cond2."  ".$back_sidepleats_inst_cond2." ".$back_boxpleats_inst_cond2." ".$back_nopleats_inst_cond2."  NOW())";  //die();
		 $recordinserted=$obj_db->insert($sql); 
		 $lastid=mysql_insert_id();
		 header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=added" );
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