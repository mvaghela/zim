<?php
$productid=$_REQUEST['productid'];

$productsql = "SELECT * FROM `product` WHERE `productid`='".$productid."'"; 
$productresult = $obj_db->select($productsql);
$productname = $productresult[0]['uniqname'];
//echo $productname; die();

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
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
		case 'style_fullsleeve':
			$name = $result_image[0]['style_fullsleeve'];
			$field_name = 'style_fullsleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
		case 'style_halfsleeve':
			$name = $result_image[0]['style_halfsleeve'];
			$field_name = 'style_halfsleeve';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
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
		case 'pocket_nopocket':
			$name = $result_image[0]['pocket_nopocket'];
			$field_name = 'pocket_nopocket';
			//Deleting main image
			$newname = "upload/shirt/".$productname."/". $name;
            unlink($newname);
			break;
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
    $extension = getExtension($_FILES['fit_slimfit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['fit_slimfit']['tmp_name'], $target_path);
            
	$fit_slimfit_cond = "`fit_slimfit`='$name',";
	$fit_slimfit_inst_cond = "`fit_slimfit`,";
	$fit_slimfit_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['fit_innerslimfit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['fit_innerslimfit']['tmp_name'], $target_path);
            
	$fit_innerslimfit_cond = "`fit_innerslimfit`='$name',";
	$fit_innerslimfit_inst_cond = "`fit_innerslimfit`,";
	$fit_innerslimfit_inst_cond2 = "'$name',";
   
    $extension = getExtension($_FILES['fit_normalfit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['fit_normalfit']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['fit_innernormalfit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['fit_innernormalfit']['tmp_name'], $target_path);
            
	$fit_innernormalfit_cond = "`fit_innernormalfit`='$name',";
	$fit_innernormalfit_inst_cond = "`fit_innernormalfit`,";
	$fit_innernormalfit_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['fit_loosefit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['fit_loosefit']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['fit_innerloosefit']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['fit_innerloosefit']['tmp_name'], $target_path);
            
	$fit_innerloosefit_cond = "`fit_innerloosefit`='$name',";
	$fit_innerloosefit_inst_cond = "`fit_innerloosefit`,";
	$fit_innerloosefit_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['style_fullsleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_fullsleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_fullsleeve']['tmp_name'], $target_path)) {
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
		$style_fullsleeve_cond = "`style_fullsleeve`='$name',";
		$style_fullsleeve_inst_cond = "`style_fullsleeve`,";
		$style_fullsleeve_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['style_halfsleeve']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['style_halfsleeve']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['style_halfsleeve']['tmp_name'], $target_path)) {
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
		$style_halfsleeve_cond = "`style_halfsleeve`='$name',";
		$style_halfsleeve_inst_cond = "`style_halfsleeve`,";
		$style_halfsleeve_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['collar_straight']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_straight']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
			
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['collar_innerstraight']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerstraight']['tmp_name'], $target_path);
            
	$collar_innerstraight_cond = "`collar_innerstraight`='$name',";
	$collar_innerstraight_inst_cond = "`collar_innerstraight`,";
	$collar_innerstraight_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_straightbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_straightbutton']['tmp_name'], $target_path);
            
	$collar_straightbutton_cond = "`collar_straightbutton`='$name',";
	$collar_straightbutton_inst_cond = "`collar_straightbutton`,";
	$collar_straightbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_straightthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_straightthread']['tmp_name'], $target_path);
            
	$collar_straightthread_cond = "`collar_straightthread`='$name',";
	$collar_straightthread_inst_cond = "`collar_straightthread`,";
	$collar_straightthread_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['collar_classic']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_classic']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerclassic']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerclassic']['tmp_name'], $target_path);
            
	$collar_innerclassic_cond = "`collar_innerclassic`='$name',";
	$collar_innerclassic_inst_cond = "`collar_innerclassic`,";
	$collar_innerclassic_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_classicbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_classicbutton']['tmp_name'], $target_path);
            
	$collar_classicbutton_cond = "`collar_classicbutton`='$name',";
	$collar_classicbutton_inst_cond = "`collar_classicbutton`,";
	$collar_classicbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_classicthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_classicthread']['tmp_name'], $target_path);
            
	$collar_classicthread_cond = "`collar_classicthread`='$name',";
	$collar_classicthread_inst_cond = "`collar_classicthread`,";
	$collar_classicthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_spread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_spread']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerspread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerspread']['tmp_name'], $target_path);
            
	$collar_innerspread_cond = "`collar_innerspread`='$name',";
	$collar_innerspread_inst_cond = "`collar_innerspread`,";
	$collar_innerspread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_spreadbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_spreadbutton']['tmp_name'], $target_path);
            
	$collar_spreadbutton_cond = "`collar_spreadbutton`='$name',";
	$collar_spreadbutton_inst_cond = "`collar_spreadbutton`,";
	$collar_spreadbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_spreadthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_spreadthread']['tmp_name'], $target_path);
            
	$collar_spreadthread_cond = "`collar_spreadthread`='$name',";
	$collar_spreadthread_inst_cond = "`collar_spreadthread`,";
	$collar_spreadthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_cutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_cutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innercutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innercutaway']['tmp_name'], $target_path);
            
	$collar_innercutaway_cond = "`collar_innercutaway`='$name',";
	$collar_innercutaway_inst_cond = "`collar_innercutaway`,";
	$collar_innercutaway_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_cutawaybuttonbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_cutawaybuttonbutton']['tmp_name'], $target_path);
            
	$collar_cutawaybuttonbutton_cond = "`collar_cutawaybuttonbutton`='$name',";
	$collar_cutawaybuttonbutton_inst_cond = "`collar_cutawaybuttonbutton`,";
	$collar_cutawaybuttonbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_cutawaythread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_cutawaythread']['tmp_name'], $target_path);
            
	$collar_cutawaythread_cond = "`collar_cutawaythread`='$name',";
	$collar_cutawaythread_inst_cond = "`collar_cutawaythread`,";
	$collar_cutawaythread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_fullcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_fullcutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerfullcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerfullcutaway']['tmp_name'], $target_path);
            
	$collar_innerfullcutaway_cond = "`collar_innerfullcutaway`='$name',";
	$collar_innerfullcutaway_inst_cond = "`collar_innerfullcutaway`,";
	$collar_innerfullcutaway_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_fullcutawaybutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_fullcutawaybutton']['tmp_name'], $target_path);
            
	$collar_fullcutawaybutton_cond = "`collar_fullcutawaybutton`='$name',";
	$collar_fullcutawaybutton_inst_cond = "`collar_fullcutawaybutton`,";
	$collar_fullcutawaybutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_fullcutawaythread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_fullcutawaythread']['tmp_name'], $target_path);
            
	$collar_fullcutawaythread_cond = "`collar_fullcutawaythread`='$name',";
	$collar_fullcutawaythread_inst_cond = "`collar_fullcutawaythread`,";
	$collar_fullcutawaythread_inst_cond2 = "'$name',";
	
	
	
	$extension = getExtension($_FILES['collar_englishcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_englishcutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerenglishcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerenglishcutaway']['tmp_name'], $target_path);
            
	$collar_innerenglishcutaway_cond = "`collar_innerenglishcutaway`='$name',";
	$collar_innerenglishcutaway_inst_cond = "`collar_innerenglishcutaway`,";
	$collar_innerenglishcutaway_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_englishcutawaybutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_englishcutawaybutton']['tmp_name'], $target_path);
            
	$collar_englishcutawaybutton_cond = "`collar_englishcutawaybutton`='$name',";
	$collar_englishcutawaybutton_inst_cond = "`collar_englishcutawaybutton`,";
	$collar_englishcutawaybutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_englishcutawaythread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_englishcutawaythread']['tmp_name'], $target_path);
            
	$collar_englishcutawaythread_cond = "`collar_englishcutawaythread`='$name',";
	$collar_englishcutawaythread_inst_cond = "`collar_englishcutawaythread`,";
	$collar_englishcutawaythread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_curvedcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_curvedcutaway']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
           $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innercurvedcutaway']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innercurvedcutaway']['tmp_name'], $target_path);
            
	$collar_innercurvedcutaway_cond = "`collar_innercurvedcutaway`='$name',";
	$collar_innercurvedcutaway_inst_cond = "`collar_innercurvedcutaway`,";
	$collar_innercurvedcutaway_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_curvedcutawaybutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_curvedcutawaybutton']['tmp_name'], $target_path);
            
	$collar_curvedcutawaybutton_cond = "`collar_curvedcutawaybutton`='$name',";
	$collar_curvedcutawaybutton_inst_cond = "`collar_curvedcutawaybutton`,";
	$collar_curvedcutawaybutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_curvedcutawaythread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_curvedcutawaythread']['tmp_name'], $target_path);
            
	$collar_curvedcutawaythread_cond = "`collar_curvedcutawaythread`='$name',";
	$collar_curvedcutawaythread_inst_cond = "`collar_curvedcutawaythread`,";
	$collar_curvedcutawaythread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_cutawaybutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_cutawaybutton']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
			
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innercutawaybutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innercutawaybutton']['tmp_name'], $target_path);
            
	$collar_innercutawaybutton_cond = "`collar_innercutawaybutton`='$name',";
	$collar_innercutawaybutton_inst_cond = "`collar_innercutawaybutton`,";
	$collar_innercutawaybutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_cutawaybutton_button']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_cutawaybutton_button']['tmp_name'], $target_path);
            
	$collar_cutawaybutton_button_cond = "`collar_cutawaybutton_button`='$name',";
	$collar_cutawaybutton_button_inst_cond = "`collar_cutawaybutton_button`,";
	$collar_cutawaybutton_button_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_cutawaybuttonthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_cutawaybuttonthread']['tmp_name'], $target_path);
            
	$collar_cutawaybuttonthread_cond = "`collar_cutawaybuttonthread`='$name',";
	$collar_cutawaybuttonthread_inst_cond = "`collar_cutawaybuttonthread`,";
	$collar_cutawaybuttonthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_bandedcollar']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_bandedcollar']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerbandedcollar']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerbandedcollar']['tmp_name'], $target_path);
            
	$collar_innerbandedcollar_cond = "`collar_innerbandedcollar`='$name',";
	$collar_innerbandedcollar_inst_cond = "`collar_innerbandedcollar`,";
	$collar_innerbandedcollar_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_bandedcollarbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_bandedcollarbutton']['tmp_name'], $target_path);
            
	$collar_bandedcollarbutton_cond = "`collar_bandedcollarbutton`='$name',";
	$collar_bandedcollarbutton_inst_cond = "`collar_bandedcollarbutton`,";
	$collar_bandedcollarbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_bandedcollarthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_bandedcollarthread']['tmp_name'], $target_path);
            
	$collar_bandedcollarthread_cond = "`collar_bandedcollarthread`='$name',";
	$collar_bandedcollarthread_inst_cond = "`collar_bandedcollarthread`,";
	$collar_bandedcollarthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_wingup']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_wingup']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerwingup']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerwingup']['tmp_name'], $target_path);
            
	$collar_innerwingup_cond = "`collar_innerwingup`='$name',";
	$collar_innerwingup_inst_cond = "`collar_innerwingup`,";
	$collar_innerwingup_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_wingupbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_wingupbutton']['tmp_name'], $target_path);
            
	$collar_wingupbutton_cond = "`collar_wingupbutton`='$name',";
	$collar_wingupbutton_inst_cond = "`collar_wingupbutton`,";
	$collar_wingupbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_wingupthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_wingupthread']['tmp_name'], $target_path);
            
	$collar_wingupthread_cond = "`collar_wingupthread`='$name',";
	$collar_wingupthread_inst_cond = "`collar_wingupthread`,";
	$collar_wingupthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_buttondown']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_buttondown']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerbuttondown']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerbuttondown']['tmp_name'], $target_path);
            
	$collar_innerbuttondown_cond = "`collar_innerbuttondown`='$name',";
	$collar_innerbuttondown_inst_cond = "`collar_innerbuttondown`,";

	$collar_innerbuttondown_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_buttondownbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_buttondownbutton']['tmp_name'], $target_path);
            
	$collar_buttondownbutton_cond = "`collar_buttondownbutton`='$name',";
	$collar_buttondownbutton_inst_cond = "`collar_buttondownbutton`,";
	$collar_buttondownbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_buttondownthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_buttondownthread']['tmp_name'], $target_path);
            
	$collar_buttondownthread_cond = "`collar_buttondownthread`='$name',";
	$collar_buttondownthread_inst_cond = "`collar_buttondownthread`,";
	$collar_buttondownthread_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['collar_rounded']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['collar_rounded']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	
	$extension = getExtension($_FILES['collar_innerrounded']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_innerrounded']['tmp_name'], $target_path);
            
	$collar_innerrounded_cond = "`collar_innerrounded`='$name',";
	$collar_innerrounded_inst_cond = "`collar_innerrounded`,";
	$collar_innerrounded_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_roundedbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_roundedbutton']['tmp_name'], $target_path);
            
	$collar_roundedbutton_cond = "`collar_roundedbutton`='$name',";
	$collar_roundedbutton_inst_cond = "`collar_roundedbutton`,";
	$collar_roundedbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['collar_roundedthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['collar_roundedthread']['tmp_name'], $target_path);
            
	$collar_roundedthread_cond = "`collar_roundedthread`='$name',";
	$collar_roundedthread_inst_cond = "`collar_roundedthread`,";
	$collar_roundedthread_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_singlebuttonmiter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_singlebuttonmiter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	$extension = getExtension($_FILES['cuff_singlebuttonmiterinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonmiterinner']['tmp_name'], $target_path);
            
	$cuff_singlebuttonmiterinner_cond = "`cuff_singlebuttonmiterinner`='$name',";
	$cuff_singlebuttonmiterinner_inst_cond = "`cuff_singlebuttonmiterinner`,";
	$cuff_singlebuttonmiterinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonmiterbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonmiterbutton']['tmp_name'], $target_path);
            
	$cuff_singlebuttonmiterbutton_cond = "`cuff_singlebuttonmiterbutton`='$name',";
	$cuff_singlebuttonmiterbutton_inst_cond = "`cuff_singlebuttonmiterbutton`,";
	$cuff_singlebuttonmiterbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonmiterthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonmiterthread']['tmp_name'], $target_path);
            
	$cuff_singlebuttonmiterthread_cond = "`cuff_singlebuttonmiterthread`='$name',";
	$cuff_singlebuttonmiterthread_inst_cond = "`cuff_singlebuttonmiterthread`,";
	$cuff_singlebuttonmiterthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonmiterright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonmiterright']['tmp_name'], $target_path);
            
	$cuff_singlebuttonmiterright_cond = "`cuff_singlebuttonmiterright`='$name',";
	$cuff_singlebuttonmiterright_inst_cond = "`cuff_singlebuttonmiterright`,";
	$cuff_singlebuttonmiterright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonmiterrightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonmiterrightinner']['tmp_name'], $target_path);
            
	$cuff_singlebuttonmiterrightinner_cond = "`cuff_singlebuttonmiterrightinner`='$name',";
	$cuff_singlebuttonmiterrightinner_inst_cond = "`cuff_singlebuttonmiterrightinner`,";
	$cuff_singlebuttonmiterrightinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonmiter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_doublebuttonmiter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_doublebuttonmiterinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonmiterinner']['tmp_name'], $target_path);
            
	$cuff_doublebuttonmiterinner_cond = "`cuff_doublebuttonmiterinner`='$name',";
	$cuff_doublebuttonmiterinner_inst_cond = "`cuff_doublebuttonmiterinner`,";
	$cuff_doublebuttonmiterinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonmiterbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonmiterbutton']['tmp_name'], $target_path);
            
	$cuff_doublebuttonmiterbutton_cond = "`cuff_doublebuttonmiterbutton`='$name',";
	$cuff_doublebuttonmiterbutton_inst_cond = "`cuff_doublebuttonmiterbutton`,";
	$cuff_doublebuttonmiterbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonmiterthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonmiterthread']['tmp_name'], $target_path);
            
	$cuff_doublebuttonmiterthread_cond = "`cuff_doublebuttonmiterthread`='$name',";
	$cuff_doublebuttonmiterthread_inst_cond = "`cuff_doublebuttonmiterthread`,";
	$cuff_doublebuttonmiterthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonmiterright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonmiterright']['tmp_name'], $target_path);
            
	$cuff_doublebuttonmiterright_cond = "`cuff_doublebuttonmiterright`='$name',";
	$cuff_doublebuttonmiterright_inst_cond = "`cuff_doublebuttonmiterright`,";
	$cuff_doublebuttonmiterright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonmiterrightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonmiterrightinner']['tmp_name'], $target_path);
            
	$cuff_doublebuttonmiterrightinner_cond = "`cuff_doublebuttonmiterrightinner`='$name',";
	$cuff_doublebuttonmiterrightinner_inst_cond = "`cuff_doublebuttonmiterrightinner`,";
	$cuff_doublebuttonmiterrightinner_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_frenchbuttonmiter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiterinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonmiterinner']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonmiterinner_cond = "`cuff_frenchbuttonmiterinner`='$name',";
	$cuff_frenchbuttonmiterinner_inst_cond = "`cuff_frenchbuttonmiterinner`,";
	$cuff_frenchbuttonmiterinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiterbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonmiterbutton']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonmiterbutton_cond = "`cuff_frenchbuttonmiterbutton`='$name',";
	$cuff_frenchbuttonmiterbutton_inst_cond = "`cuff_frenchbuttonmiterbutton`,";
	$cuff_frenchbuttonmiterbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiterthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonmiterthread']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonmiterthread_cond = "`cuff_frenchbuttonmiterthread`='$name',";
	$cuff_frenchbuttonmiterthread_inst_cond = "`cuff_frenchbuttonmiterthread`,";
	$cuff_frenchbuttonmiterthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiterright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonmiterright']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonmiterright_cond = "`cuff_frenchbuttonmiterright`='$name',";
	$cuff_frenchbuttonmiterright_inst_cond = "`cuff_frenchbuttonmiterright`,";
	$cuff_frenchbuttonmiterright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonmiterrightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonmiterrightinner']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonmiterrightinner_cond = "`cuff_frenchbuttonmiterrightinner`='$name',";
	$cuff_frenchbuttonmiterrightinner_inst_cond = "`cuff_frenchbuttonmiterrightinner`,";
	$cuff_frenchbuttonmiterrightinner_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_singlebuttonround']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_singlebuttonround']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_singlebuttonroundinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonroundinner']['tmp_name'], $target_path);
            
	$cuff_singlebuttonroundinner_cond = "`cuff_singlebuttonroundinner`='$name',";
	$cuff_singlebuttonroundinner_inst_cond = "`cuff_singlebuttonroundinner`,";
	$cuff_singlebuttonroundinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonroundbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonroundbutton']['tmp_name'], $target_path);
            
	$cuff_singlebuttonroundbutton_cond = "`cuff_singlebuttonroundbutton`='$name',";
	$cuff_singlebuttonroundbutton_inst_cond = "`cuff_singlebuttonroundbutton`,";
	$cuff_singlebuttonroundbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonroundthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonroundthread']['tmp_name'], $target_path);
            
	$cuff_singlebuttonroundthread_cond = "`cuff_singlebuttonroundthread`='$name',";
	$cuff_singlebuttonroundthread_inst_cond = "`cuff_singlebuttonroundthread`,";
	$cuff_singlebuttonroundthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonroundright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonroundright']['tmp_name'], $target_path);
            
	$cuff_singlebuttonroundright_cond = "`cuff_singlebuttonroundright`='$name',";
	$cuff_singlebuttonroundright_inst_cond = "`cuff_singlebuttonroundright`,";
	$cuff_singlebuttonroundright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonroundrightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonroundrightinner']['tmp_name'], $target_path);
            
	$cuff_singlebuttonroundrightinner_cond = "`cuff_singlebuttonroundrightinner`='$name',";
	$cuff_singlebuttonroundrightinner_inst_cond = "`cuff_singlebuttonroundrightinner`,";
	$cuff_singlebuttonroundrightinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonround']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_doublebuttonround']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_doublebuttonroundinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonroundinner']['tmp_name'], $target_path);
            
	$cuff_doublebuttonroundinner_cond = "`cuff_doublebuttonroundinner`='$name',";
	$cuff_doublebuttonroundinner_inst_cond = "`cuff_doublebuttonroundinner`,";
	$cuff_doublebuttonroundinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonroundbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonroundbutton']['tmp_name'], $target_path);
            
	$cuff_doublebuttonroundbutton_cond = "`cuff_doublebuttonroundbutton`='$name',";
	$cuff_doublebuttonroundbutton_inst_cond = "`cuff_doublebuttonroundbutton`,";
	$cuff_doublebuttonroundbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonroundthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonroundthread']['tmp_name'], $target_path);
            
	$cuff_doublebuttonroundthread_cond = "`cuff_doublebuttonroundthread`='$name',";
	$cuff_doublebuttonroundthread_inst_cond = "`cuff_doublebuttonroundthread`,";
	$cuff_doublebuttonroundthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonroundright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonroundright']['tmp_name'], $target_path);
            
	$cuff_doublebuttonroundright_cond = "`cuff_doublebuttonroundright`='$name',";
	$cuff_doublebuttonroundright_inst_cond = "`cuff_doublebuttonroundright`,";
	$cuff_doublebuttonroundright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonroundrightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonroundrightinner']['tmp_name'], $target_path);
            
	$cuff_doublebuttonroundrightinner_cond = "`cuff_doublebuttonroundrightinner`='$name',";
	$cuff_doublebuttonroundrightinner_inst_cond = "`cuff_doublebuttonroundrightinner`,";
	$cuff_doublebuttonroundrightinner_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_frenchbuttonround']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_frenchbuttonround']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_frenchbuttonroundinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonroundinner']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonroundinner_cond = "`cuff_frenchbuttonroundinner`='$name',";
	$cuff_frenchbuttonroundinner_inst_cond = "`cuff_frenchbuttonroundinner`,";
	$cuff_frenchbuttonroundinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonroundbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonroundbutton']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonroundbutton_cond = "`cuff_frenchbuttonroundbutton`='$name',";
	$cuff_frenchbuttonroundbutton_inst_cond = "`cuff_frenchbuttonroundbutton`,";
	$cuff_frenchbuttonroundbutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonroundthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonroundthread']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonroundthread_cond = "`cuff_frenchbuttonroundthread`='$name',";
	$cuff_frenchbuttonroundthread_inst_cond = "`cuff_frenchbuttonroundthread`,";
	$cuff_frenchbuttonroundthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonroundright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonroundright']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonroundright_cond = "`cuff_frenchbuttonroundright`='$name',";
	$cuff_frenchbuttonroundright_inst_cond = "`cuff_frenchbuttonroundright`,";
	$cuff_frenchbuttonroundright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonroundrightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonroundrightinner']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonroundrightinner_cond = "`cuff_frenchbuttonroundrightinner`='$name',";
	$cuff_frenchbuttonroundrightinner_inst_cond = "`cuff_frenchbuttonroundrightinner`,";
	$cuff_frenchbuttonroundrightinner_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquare']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_singlebuttonsquare']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquareinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonsquareinner']['tmp_name'], $target_path);
            
	$cuff_singlebuttonsquareinner_cond = "`cuff_singlebuttonsquareinner`='$name',";
	$cuff_singlebuttonsquareinner_inst_cond = "`cuff_singlebuttonsquareinner`,";
	$cuff_singlebuttonsquareinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquarebutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonsquarebutton']['tmp_name'], $target_path);
            
	$cuff_singlebuttonsquarebutton_cond = "`cuff_singlebuttonsquarebutton`='$name',";
	$cuff_singlebuttonsquarebutton_inst_cond = "`cuff_singlebuttonsquarebutton`,";
	$cuff_singlebuttonsquarebutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquarethread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonsquarethread']['tmp_name'], $target_path);
            
	$cuff_singlebuttonsquarethread_cond = "`cuff_singlebuttonsquarethread`='$name',";
	$cuff_singlebuttonsquarethread_inst_cond = "`cuff_singlebuttonsquarethread`,";
	$cuff_singlebuttonsquarethread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquareright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonsquareright']['tmp_name'], $target_path);
            
	$cuff_singlebuttonsquareright_cond = "`cuff_singlebuttonsquareright`='$name',";
	$cuff_singlebuttonsquareright_inst_cond = "`cuff_singlebuttonsquareright`,";
	$cuff_singlebuttonsquareright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_singlebuttonsquarerightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_singlebuttonsquarerightinner']['tmp_name'], $target_path);
            
	$cuff_singlebuttonsquarerightinner_cond = "`cuff_singlebuttonsquarerightinner`='$name',";
	$cuff_singlebuttonsquarerightinner_inst_cond = "`cuff_singlebuttonsquarerightinner`,";
	$cuff_singlebuttonsquarerightinner_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquare']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_doublebuttonsquare']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquareinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonsquareinner']['tmp_name'], $target_path);
            
	$cuff_doublebuttonsquareinner_cond = "`cuff_doublebuttonsquareinner`='$name',";
	$cuff_doublebuttonsquareinner_inst_cond = "`cuff_doublebuttonsquareinner`,";
	$cuff_doublebuttonsquareinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquarebutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonsquarebutton']['tmp_name'], $target_path);
            
	$cuff_doublebuttonsquarebutton_cond = "`cuff_doublebuttonsquarebutton`='$name',";
	$cuff_doublebuttonsquarebutton_inst_cond = "`cuff_doublebuttonsquarebutton`,";
	$cuff_doublebuttonsquarebutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquarethread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonsquarethread']['tmp_name'], $target_path);
            
	$cuff_doublebuttonsquarethread_cond = "`cuff_doublebuttonsquarethread`='$name',";
	$cuff_doublebuttonsquarethread_inst_cond = "`cuff_doublebuttonsquarethread`,";
	$cuff_doublebuttonsquarethread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquareright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonsquareright']['tmp_name'], $target_path);
            
	$cuff_doublebuttonsquareright_cond = "`cuff_doublebuttonsquareright`='$name',";
	$cuff_doublebuttonsquareright_inst_cond = "`cuff_doublebuttonsquareright`,";
	$cuff_doublebuttonsquareright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_doublebuttonsquarerightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_doublebuttonsquarerightinner']['tmp_name'], $target_path);
            
	$cuff_doublebuttonsquarerightinner_cond = "`cuff_doublebuttonsquarerightinner`='$name',";
	$cuff_doublebuttonsquarerightinner_inst_cond = "`cuff_doublebuttonsquarerightinner`,";
	$cuff_doublebuttonsquarerightinner_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquare']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['cuff_frenchbuttonsquare']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquareinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonsquareinner']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonsquareinner_cond = "`cuff_frenchbuttonsquareinner`='$name',";
	$cuff_frenchbuttonsquareinner_inst_cond = "`cuff_frenchbuttonsquareinner`,";
	$cuff_frenchbuttonsquareinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquarebutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonsquarebutton']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonsquarebutton_cond = "`cuff_frenchbuttonsquarebutton`='$name',";
	$cuff_frenchbuttonsquarebutton_inst_cond = "`cuff_frenchbuttonsquarebutton`,";
	$cuff_frenchbuttonsquarebutton_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquarethread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonsquarethread']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonsquarethread_cond = "`cuff_frenchbuttonsquarethread`='$name',";
	$cuff_frenchbuttonsquarethread_inst_cond = "`cuff_frenchbuttonsquarethread`,";
	$cuff_frenchbuttonsquarethread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquareright']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonsquareright']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonsquareright_cond = "`cuff_frenchbuttonsquareright`='$name',";
	$cuff_frenchbuttonsquareright_inst_cond = "`cuff_frenchbuttonsquareright`,";
	$cuff_frenchbuttonsquareright_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['cuff_frenchbuttonsquarerightinner']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['cuff_frenchbuttonsquarerightinner']['tmp_name'], $target_path);
            
	$cuff_frenchbuttonsquarerightinner_cond = "`cuff_frenchbuttonsquarerightinner`='$name',";
	$cuff_frenchbuttonsquarerightinner_inst_cond = "`cuff_frenchbuttonsquarerightinner`,";
	$cuff_frenchbuttonsquarerightinner_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['pocket_miter']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_miter']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
            $name = $uni . '.' . $extension;
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
            $name = $uni . '.' . $extension;
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
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['pocket_nopocket']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['pocket_nopocket']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
            $target_path = "upload/shirt/".$productname."/";
            $target_path = $target_path . basename($name);

            if (move_uploaded_file($_FILES['pocket_nopocket']['tmp_name'], $target_path)) {
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
		$pocket_nopocket_cond = "`pocket_nopocket`='$name',";
		$pocket_nopocket_inst_cond = "`pocket_nopocket`,";
		$pocket_nopocket_inst_cond2 = "'$name',";
    }
	
	$extension = getExtension($_FILES['front_placket']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_placket']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['front_placketthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['front_placketthread']['tmp_name'], $target_path);
            
	$front_placketthread_cond = "`front_placketthread`='$name',";
	$front_placketthread_inst_cond = "`front_placketthread`,";
	$front_placketthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['front_placketbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['front_placketbutton']['tmp_name'], $target_path);
            
	$front_placketbutton_cond = "`front_placketbutton`='$name',";
	$front_placketbutton_inst_cond = "`front_placketbutton`,";
	$front_placketbutton_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['front_covered']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_covered']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	
	$extension = getExtension($_FILES['front_coveredthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['front_coveredthread']['tmp_name'], $target_path);
            
	$front_coveredthread_cond = "`front_coveredthread`='$name',";
	$front_coveredthread_inst_cond = "`front_coveredthread`,";
	$front_coveredthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['front_coveredbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['front_coveredbutton']['tmp_name'], $target_path);
            
	$front_coveredbutton_cond = "`front_coveredbutton`='$name',";
	$front_coveredbutton_inst_cond = "`front_coveredbutton`,";
	$front_coveredbutton_inst_cond2 = "'$name',";
	
	
	
	$extension = getExtension($_FILES['front_noplacket']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['front_noplacket']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
	$extension = getExtension($_FILES['front_noplacketthread']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['front_noplacketthread']['tmp_name'], $target_path);
            
	$front_noplacketthread_cond = "`front_noplacketthread`='$name',";
	$front_noplacketthread_inst_cond = "`front_noplacketthread`,";
	$front_noplacketthread_inst_cond2 = "'$name',";
	
	$extension = getExtension($_FILES['front_noplacketbutton']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
	$folder = mkdir("upload/shirt/".$productname, 0777);
	$name = $uni . '.' . $extension;
    $target_path = "upload/shirt/" .$productname."/".basename($name);
    move_uploaded_file($_FILES['front_noplacketbutton']['tmp_name'], $target_path);
            
	$front_noplacketbutton_cond = "`front_noplacketbutton`='$name',";
	$front_noplacketbutton_inst_cond = "`front_noplacketbutton`,";
	$front_noplacketbutton_inst_cond2 = "'$name',";
	
	
	$extension = getExtension($_FILES['back_sidepleats']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['back_sidepleats']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$folder = mkdir("upload/shirt/".$productname, 0777);
            $name = $uni . '.' . $extension;
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
            $name = $uni . '.' . $extension;
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
            $name = $uni . '.' . $extension;
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
		 $update_string = $fit_slimfit_cond."".$fit_innerslimfit_cond."".$fit_normalfit_cond."".$fit_innernormalfit_cond."".$fit_loosefit_cond."".$fit_innerloosefit_cond."".$style_fullsleeve_cond."".$style_halfsleeve_cond."".$collar_straight_cond."".$collar_innerstraight_cond."".$collar_straightbutton_cond."".$collar_straightthread_cond."".$collar_classic_cond."".$collar_innerclassic_cond."".$collar_classicbutton_cond."".$collar_classicthread_cond."".$collar_englishcutaway_cond."".$collar_innerenglishcutaway_cond."".$collar_englishcutawaybutton_cond."".$collar_englishcutawaythread_cond."".$collar_spread_cond."".$collar_innerspread_cond."".$collar_spreadbutton_cond."".$collar_spreadthread_cond."".$collar_cutaway_cond."".$collar_innercutaway."".$collar_cutawaybuttonbutton_cond."".$collar_cutawaythread_cond."".$collar_fullcutaway_cond."".$collar_innerfullcutaway_cond."".$collar_fullcutawaybutton_cond."".$collar_fullcutawaythread_cond."".$collar_curvedcutaway_cond."".$collar_innercurvedcutaway_cond."".$collar_curvedcutawaybutton_cond."".$collar_curvedcutawaythread_cond."".$collar_cutawaybutton_cond."".$collar_innercutawaybutton_cond."".$collar_cutawaybutton_button_cond."".$collar_cutawaybuttonthread_cond."".$collar_bandedcollar_cond."".$collar_innerbandedcollar_cond."".$collar_bandedcollarbutton_cond."".$collar_bandedcollarthread_cond."".$collar_wingup_cond."".$collar_innerwingup_cond."".$collar_wingupbutton_cond."".$collar_wingupthread_cond."".$collar_buttondown_cond."".$collar_innerbuttondown_cond."".$collar_buttondownbutton_cond."".$collar_buttondownthread_cond."".$collar_rounded_cond."".$collar_innerrounded_cond."".$collar_roundedbutton_cond."".$collar_roundedthread_cond."".$cuff_singlebuttonmiter_cond."".$cuff_singlebuttonmiterinner_cond."".$cuff_singlebuttonmiterbutton_cond."".$cuff_singlebuttonmiterthread_cond."".$cuff_singlebuttonmiterright_cond."".$cuff_singlebuttonmiterrightinner_cond."".$cuff_doublebuttonmiter_cond."".$cuff_doublebuttonmiterinner_cond."".$cuff_doublebuttonmiterbutton_cond."".$cuff_doublebuttonmiterthread_cond."".$cuff_doublebuttonmiterright_cond."".$cuff_doublebuttonmiterrightinner_cond."".$cuff_frenchbuttonmiter_cond."".$cuff_frenchbuttonmiterinner_cond."".$cuff_frenchbuttonmiterbutton_cond."".$cuff_frenchbuttonmiterthread_cond."".$cuff_frenchbuttonmiterright_cond."".$cuff_frenchbuttonmiterrightinner_cond."".$cuff_singlebuttonround_cond."".$cuff_singlebuttonroundinner_cond."".$cuff_singlebuttonroundbutton_cond."".$cuff_singlebuttonroundthread_cond."".$cuff_singlebuttonroundright_cond."".$cuff_singlebuttonroundrightinner_cond."".$cuff_doublebuttonround_cond."".$cuff_doublebuttonroundinner_cond."".$cuff_doublebuttonroundbutton_cond."".$cuff_doublebuttonroundthread_cond."".$cuff_doublebuttonroundright_cond."".$cuff_doublebuttonroundrightinner_cond."".$cuff_frenchbuttonsquare_cond."".$cuff_frenchbuttonsquareinner_cond."".$cuff_frenchbuttonsquarebutton_cond."".$cuff_frenchbuttonsquarethread_cond."".$cuff_frenchbuttonsquareright_cond."".$cuff_frenchbuttonsquarerightinner_cond."".$cuff_frenchbuttonround_cond."".$cuff_frenchbuttonroundinner_cond."".$cuff_frenchbuttonroundbutton_cond."".$cuff_frenchbuttonroundthread_cond."".$cuff_frenchbuttonroundright_cond."".$cuff_frenchbuttonroundrightinner_cond."".$cuff_singlebuttonsquare_cond."".$cuff_singlebuttonsquareinner_cond."".$cuff_singlebuttonsquarebutton_cond."".$cuff_singlebuttonsquarethread_cond."".$cuff_singlebuttonsquareright_cond."".$cuff_singlebuttonsquarerightinner_cond."".$cuff_doublebuttonsquare_cond."".$cuff_doublebuttonsquareinner_cond."".$cuff_doublebuttonsquarebutton_cond."".$cuff_doublebuttonsquarethread_cond."".$cuff_doublebuttonsquareright_cond."".$cuff_doublebuttonsquarerightinner_cond."".$pocket_miter_cond."".$pocket_round_cond."".$pocket_square_cond."".$pocket_vshape_cond."".$pocket_nopocket_cond."".$front_placket_cond."".$front_placketthread_cond."".$front_placketbutton_cond."".$front_covered_cond."".$front_coveredthread_cond."".$front_coveredbutton_cond."".$front_noplacket_cond."".$front_noplacketthread_cond."".$front_noplacketbutton_cond."".$back_sidepleats_cond."".$back_boxpleats_cond."".$back_nopleats_cond;
		
		$update_string = substr($update_string,0,(strlen($update_string)-1));
		
	 	echo $sql_user="UPDATE shirtcustomization SET ".$update_string."  
				WHERE `shirtcustomizationid` = '".$result_image[0]['shirtcustomizationid']."' LIMIT 1"; die();
	 $update=$obj_db->sql_query($sql_user); 
	header("location:shirtcustomization.php?productid=".$_REQUEST['productid']."&msg=updated" );
   die();
	} else 
	  {
      echo $sql="INSERT INTO shirtcustomization (`productid`,".$fit_slimfit_inst_cond." ".$fit_innerslimfit_inst_cond." ".$fit_normalfit_inst_cond." ".$fit_innernormalfit_inst_cond." ".$fit_loosefit_inst_cond." ".$fit_innerloosefit_inst_cond." ".$style_fullsleeve_inst_cond." ".$style_halfsleeve_inst_cond." ".$collar_straight_inst_cond." ".$collar_innerstraight_inst_cond." ".$collar_straightbutton_inst_cond." ".$collar_straightthread_inst_cond." ".$collar_classic_inst_cond." ".$collar_innerclassic_inst_cond." ".$collar_classicbutton_inst_cond." ".$collar_classicthread_inst_cond." ".$collar_spread_inst_cond." ".$collar_innerspread_inst_cond." ".$collar_spreadbutton_inst_cond." ".$collar_spreadthread_inst_cond." ".$collar_cutaway_inst_cond." ".$collar_innercutaway_inst_cond." ".$collar_cutawaybuttonbutton_inst_cond." ".$collar_cutawaythread_inst_cond." ".$collar_fullcutaway_inst_cond." ".$collar_innerfullcutaway_inst_cond." ".$collar_fullcutawaybutton_inst_cond." ".$collar_fullcutawaythread_inst_cond."  ".$collar_englishcutaway_inst_cond." ".$collar_innerenglishcutaway_inst_cond." ".$collar_englishcutawaybutton_inst_cond." ".$collar_englishcutawaythread_inst_cond." ".$collar_curvedcutaway_inst_cond." ".$collar_innercurvedcutaway_inst_cond." ".$collar_curvedcutawaybutton_inst_cond." ".$collar_curvedcutawaythread_inst_cond." ".$collar_cutawaybutton_inst_cond." ".$collar_innercutawaybutton_inst_cond." ".$collar_cutawaybutton_button_inst_cond." ".$collar_cutawaybuttonthread_inst_cond." ".$collar_bandedcollar_inst_cond." ".$collar_innerbandedcollar_inst_cond." ".$collar_bandedcollarbutton_inst_cond." ".$collar_bandedcollarthread_inst_cond." ".$collar_wingup_inst_cond." ".$collar_innerwingup_inst_cond." ".$collar_wingupbutton_inst_cond." ".$collar_wingupthread_inst_cond." ".$collar_buttondown_inst_cond." ".$collar_innerbuttondown_inst_cond." ".$collar_buttondownbutton_inst_cond." ".$collar_buttondownthread_inst_cond." ".$collar_rounded_inst_cond." ".$collar_innerrounded_inst_cond." ".$collar_roundedbutton_inst_cond." ".$collar_roundedthread_inst_cond." ".$cuff_singlebuttonmiter_inst_cond." ".$cuff_singlebuttonmiterinner_inst_cond." ".$cuff_singlebuttonmiterbutton_inst_cond." ".$cuff_singlebuttonmiterthread_inst_cond." ".$cuff_singlebuttonmiterright_inst_cond." ".$cuff_singlebuttonmiterrightinner_inst_cond."  ".$cuff_doublebuttonmiter_inst_cond." ".$cuff_doublebuttonmiterinner_inst_cond." ".$cuff_doublebuttonmiterbutton_inst_cond." ".$cuff_doublebuttonmiterthread_inst_cond." ".$cuff_doublebuttonmiterright_inst_cond." ".$cuff_doublebuttonmiterrightinner_inst_cond." ".$cuff_frenchbuttonmiter_inst_cond." ".$cuff_frenchbuttonmiterinner_inst_cond." ".$cuff_frenchbuttonmiterbutton_inst_cond." ".$cuff_frenchbuttonmiterthread_inst_cond." ".$cuff_frenchbuttonmiterright_inst_cond." ".$cuff_frenchbuttonmiterrightinner_inst_cond." ".$cuff_singlebuttonround_inst_cond." ".$cuff_singlebuttonroundinner_inst_cond." ".$cuff_singlebuttonroundbutton_inst_cond." ".$cuff_singlebuttonroundthread_inst_cond." ".$cuff_singlebuttonroundright_inst_cond." ".$cuff_singlebuttonroundrightinner_inst_cond." ".$cuff_doublebuttonround_inst_cond." ".$cuff_doublebuttonroundinner_inst_cond." ".$cuff_doublebuttonroundbutton_inst_cond." ".$cuff_doublebuttonroundthread_inst_cond." ".$cuff_doublebuttonroundright_inst_cond." ".$cuff_doublebuttonroundrightinner_inst_cond." ".$cuff_frenchbuttonround_inst_cond." ".$cuff_frenchbuttonroundinner_inst_cond." ".$cuff_frenchbuttonroundbutton_inst_cond." ".$cuff_frenchbuttonroundthread_inst_cond." ".$cuff_frenchbuttonroundright_inst_cond." ".$cuff_frenchbuttonroundrightinner_inst_cond." ".$cuff_singlebuttonsquare_inst_cond." ".$cuff_singlebuttonsquareinner_inst_cond." ".$cuff_singlebuttonsquarebutton_inst_cond." ".$cuff_singlebuttonsquarethread_inst_cond." ".$cuff_singlebuttonsquareright_inst_cond." ".$cuff_singlebuttonsquarerightinner_inst_cond." ".$cuff_doublebuttonsquare_inst_cond." ".$cuff_doublebuttonsquareinner_inst_cond." ".$cuff_doublebuttonsquarebutton_inst_cond." ".$cuff_doublebuttonsquarethread_inst_cond." ".$cuff_doublebuttonsquareright_inst_cond." ".$cuff_doublebuttonsquarerightinner_inst_cond." ".$cuff_frenchbuttonsquare_inst_cond." ".$cuff_frenchbuttonsquareinner_inst_cond." ".$cuff_frenchbuttonsquarebutton_inst_cond." ".$cuff_frenchbuttonsquarethread_inst_cond." ".$cuff_frenchbuttonsquareright_inst_cond." ".$cuff_frenchbuttonsquarerightinner_inst_cond." ".$pocket_miter_inst_cond."  ".$pocket_round_inst_cond." ".$pocket_square_inst_cond." ".$pocket_vshape_inst_cond." ".$pocket_nopocket_inst_cond."  ".$front_placket_inst_cond." ".$front_placketthread_inst_cond." ".$front_placketbutton_inst_cond." ".$front_covered_inst_cond." ".$front_coveredthread_inst_cond." ".$front_coveredbutton_inst_cond." ".$front_noplacket_inst_cond." ".$front_noplacketthread_inst_cond." ".$front_noplacketbutton_inst_cond." ".$back_sidepleats_inst_cond." ".$back_boxpleats_inst_cond." ".$back_nopleats_inst_cond." `adate`) 
		VALUES ('$productid',".$fit_slimfit_inst_cond2."  ".$fit_innerslimfit_inst_cond2." ".$fit_normalfit_inst_cond2." ".$fit_innernormalfit_inst_cond2." ".$fit_loosefit_inst_cond2."  ".$fit_innerloosefit_inst_cond2." ".$style_fullsleeve_inst_cond2." ".$style_halfsleeve_inst_cond2." ".$collar_straight_inst_cond2." ".$collar_innerstraight_inst_cond2." ".$collar_straightbutton_inst_cond2." ".$collar_straightthread_inst_cond2." ".$collar_classic_inst_cond2." ".$collar_innerclassic_inst_cond2." ".$collar_classicbutton_inst_cond2." ".$collar_classicthread_inst_cond2." ".$collar_spread_inst_cond2." ".$collar_innerspread_inst_cond2." ".$collar_spreadbutton_inst_cond2." ".$collar_spreadthread_inst_cond2."  ".$collar_cutaway_inst_cond2."  ".$collar_innercutaway_inst_cond2." ".$collar_cutawaybuttonbutton_inst_cond2." ".$collar_cutawaythread_inst_cond2." ".$collar_fullcutaway_inst_cond2." ".$collar_innerfullcutaway_inst_cond2." ".$collar_fullcutawaybutton_inst_cond2." ".$collar_fullcutawaythread_inst_cond2."  ".$collar_englishcutaway_inst_cond2." ".$collar_innerenglishcutaway_inst_cond2." ".$collar_englishcutawaybutton_inst_cond2." ".$collar_englishcutawaythread_inst_cond2." ".$collar_curvedcutaway_inst_cond2." ".$collar_innercurvedcutaway_inst_cond2." ".$collar_curvedcutawaybutton_inst_cond2." ".$collar_curvedcutawaythread_inst_cond2." ".$collar_cutawaybutton_inst_cond2." ".$collar_innercutawaybutton_inst_cond2." ".$collar_cutawaybutton_button_inst_cond2." ".$collar_cutawaybuttonthread_inst_cond2." ".$collar_bandedcollar_inst_cond2." ".$collar_innerbandedcollar_inst_cond2." ".$collar_bandedcollarbutton_inst_cond2." ".$collar_bandedcollarthread_inst_cond2." ".$collar_wingup_inst_cond2." ".$collar_innerwingup_inst_cond2." ".$collar_wingupbutton_inst_cond2." ".$collar_wingupthread_inst_cond2."" .$collar_buttondown_inst_cond2." ".$collar_innerbuttondown_inst_cond2." ".$collar_buttondownbutton_inst_cond2." ".$collar_buttondownthread_inst_cond2." ".$collar_rounded_inst_cond2." ".$collar_innerrounded_inst_cond2." ".$collar_roundedbutton_inst_cond2." ".$collar_roundedthread_inst_cond2."  ".$cuff_singlebuttonmiter_inst_cond2." ".$cuff_singlebuttonmiterinner_inst_cond2." ".$cuff_singlebuttonmiterbutton_inst_cond2." ".$cuff_singlebuttonmiterthread_inst_cond2." ".$cuff_singlebuttonmiterright_inst_cond2." ".$cuff_singlebuttonmiterrightinner_inst_cond2." ".$cuff_doublebuttonmiter_inst_cond2." ".$cuff_doublebuttonmiterinner_inst_cond2." ".$cuff_doublebuttonmiterbutton_inst_cond2." ".$cuff_doublebuttonmiterthread_inst_cond2." ".$cuff_doublebuttonmiterright_inst_cond2." ".$cuff_doublebuttonmiterrightinner_inst_cond2." ".$cuff_frenchbuttonmiter_inst_cond2." ".$cuff_frenchbuttonmiterinner_inst_cond2." ".$cuff_frenchbuttonmiterbutton_inst_cond2." ".$cuff_frenchbuttonmiterthread_inst_cond2." ".$cuff_frenchbuttonmiterright_inst_cond2." ".$cuff_frenchbuttonmiterrightinner_inst_cond2." ".$cuff_singlebuttonround_inst_cond2." ".$cuff_singlebuttonroundinner_inst_cond2." ".$cuff_singlebuttonroundbutton_inst_cond2." ".$cuff_singlebuttonroundthread_inst_cond2." ".$cuff_singlebuttonroundright_inst_cond2." ".$cuff_singlebuttonroundrightinner_inst_cond2." ".$cuff_doublebuttonround_inst_cond2." ".$cuff_doublebuttonroundinner_inst_cond2." ".$cuff_doublebuttonroundbutton_inst_cond2." ".$cuff_doublebuttonroundthread_inst_cond2." ".$cuff_doublebuttonroundright_inst_cond2." ".$cuff_doublebuttonroundrightinner_inst_cond2." ".$cuff_frenchbuttonround_inst_cond2." ".$cuff_frenchbuttonroundinner_inst_cond2." ".$cuff_frenchbuttonroundbutton_inst_cond2." ".$cuff_frenchbuttonroundthread_inst_cond2." ".$cuff_frenchbuttonroundright_inst_cond2." ".$cuff_frenchbuttonroundrightinner_inst_cond2." ".$cuff_singlebuttonsquare_inst_cond2." ".$cuff_singlebuttonsquareinner_inst_cond2." ".$cuff_singlebuttonsquarebutton_inst_cond2." ".$cuff_singlebuttonsquarethread_inst_cond2." ".$cuff_singlebuttonsquareright_inst_cond2." ".$cuff_singlebuttonsquarerightinner_inst_cond2." ".$cuff_doublebuttonsquare_inst_cond2." ".$cuff_doublebuttonsquareinner_inst_cond2." ".$cuff_doublebuttonsquarebutton_inst_cond2." ".$cuff_doublebuttonsquarethread_inst_cond2." ".$cuff_doublebuttonsquareright_inst_cond2." ".$cuff_doublebuttonsquarerightinner_inst_cond2."  ".$cuff_frenchbuttonsquare_inst_cond2." ".$cuff_frenchbuttonsquareinner_inst_cond2." ".$cuff_frenchbuttonsquarebutton_inst_cond2." ".$cuff_frenchbuttonsquarethread_inst_cond2." ".$cuff_frenchbuttonsquareright_inst_cond2." ".$cuff_frenchbuttonsquarerightinner_inst_cond2." ".$pocket_miter_inst_cond2." ".$pocket_round_inst_cond2." ".$pocket_square_inst_cond2." ".$pocket_vshape_inst_cond2." ".$pocket_nopocket_inst_cond2." ".$front_placket_inst_cond2." ".$front_placketthread_inst_cond2." ".$front_placketbutton_inst_cond2." ".$front_covered_inst_cond2." ".$front_coveredthread_inst_cond2." ".$front_coveredbutton_inst_cond2."  ".$front_noplacket_inst_cond2." ".$front_noplacketthread_inst_cond2." ".$front_noplacketbutton_inst_cond2."  ".$back_sidepleats_inst_cond2." ".$back_boxpleats_inst_cond2." ".$back_nopleats_inst_cond2."  NOW())";  die();
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