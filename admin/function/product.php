<?php
if(isset($_REQUEST['del'])) {
	$del_sql="DELETE FROM product WHERE `productid` = '".$_REQUEST['del']."'";
    $del_cat=$obj_db->sql_query($del_sql);
	
 	/*$filename = "upload/image/".$_REQUEST['img'];
	unlink($filename);

 	$filename = "upload/image/thumb/".$_REQUEST['img'];
	unlink($filename);
 	$filename = "upload/testimonial/".$_REQUEST['img'];
	unlink($filename);*/
   header("location:product.php?msg=deleted"); 
   die();
}
if(isset($_REQUEST['change'])) {
   if($_REQUEST['status']=='active')
   {
  $del_status="UPDATE `product` SET `status` = 'inactive'  WHERE `productid` = '".$_REQUEST['change']."'"; 
   $status_cat=$obj_db->sql_query($del_status);
   } else {
	$del_status="UPDATE `product` SET `status` = 'active'  WHERE `productid` = '".$_REQUEST['change']."'";
   $status_cat=$obj_db->sql_query($del_status);
   }
   $albumid=$_REQUEST['id'];
   header("location:product.php?msg=updated&page=".$_REQUEST['page']."");
   die();
}
if(isset($_REQUEST['rid'])) {
	$rid=$_REQUEST['rid'];
	$updatesql="DELETE FROM `productoption` WHERE  `productid` ='$rid'"; 
	$result=$obj_db->sql_query($updatesql); 
	header("location:product.php?id=$rid"); 
    die();
}
if(isset($_REQUEST['deloption'])) {
	$id=$_REQUEST['id'];
	$deloption=$_REQUEST['deloption'];
	$updatesql="DELETE FROM `productoption` WHERE  `productoptionid` ='$deloption' AND `productid` = '$id' "; 
	$result=$obj_db->sql_query($updatesql); 
	header("location:product.php?id=$id"); 
    die();
}

if(isset($_REQUEST['changebestseller'])){
	if($_REQUEST['bestseller']=='yes'){
			$sqlstatus="UPDATE `product` SET `bestseller`='no' WHERE `productid` = '".$_REQUEST['changebestseller']."'"; //die();
			$status=$obj_db->sql_query($sqlstatus);
		} else {
			$sqlstatus="UPDATE `product` SET `bestseller`='yes' WHERE `productid` = '".$_REQUEST['changebestseller']."'"; //die();
			$status=$obj_db->sql_query($sqlstatus);
		}

		
		$_SESSION['msg']="Display Order Updated Successfully.";

		header("location:product.php?msg=updated" );
		die();
}

if(isset($_REQUEST['changeindexslider'])){
	if($_REQUEST['indexslider']=='yes'){
			$sqlstatus="UPDATE `product` SET `indexslider`='no' WHERE `productid` = '".$_REQUEST['changeindexslider']."'"; //die();
			$status=$obj_db->sql_query($sqlstatus);
		} else {
			$sqlstatus="UPDATE `product` SET `indexslider`='yes' WHERE `productid` = '".$_REQUEST['changeindexslider']."'"; //die();
			$status=$obj_db->sql_query($sqlstatus);
		}

		
		$_SESSION['msg']="Display Order Updated Successfully.";

		header("location:product.php?msg=updated" );
		die();
}




if(isset($_REQUEST['changedo']))
	{
		$totalrow=$_REQUEST['totalrow'];
		for($i=0;$i<$totalrow;$i++)
		{
			$sqlstatus="UPDATE `product` SET `dispalyorder`='".$_POST['product'.$i]."' WHERE `productid` = ".$_POST['id'.$i].""; 
			$status=$obj_db->sql_query($sqlstatus);
		}
		$_SESSION['msg']="Display Order Updated Successfully.";

		header("location:product.php?msg=updated" );
		die();
}


if(isset($_REQUEST['submit'])) {
	$id=$_POST['id'];
	$productname = ucfirst(($_POST['productname']));

	$urltitle=strtolower($_REQUEST['uname']);
	$urltitle=addslashes($urltitle);
	$newtitle=preg_replace('/[^a-z0-9]/i',' ', $urltitle);
	$uniqname=str_replace(" ","-",$newtitle);
	
	$option = addslashes($_REQUEST['option']);
	$seotitle = addslashes($_REQUEST['seotitle']);
	$seokeywords =  addslashes($_REQUEST['seokeywords']);
	$seodescription = addslashes($_REQUEST['seodescription']);
	
	$image=$_POST['image'];
   	$price=$_POST['price'];

	$shortdiscription=addslashes($_POST['shortdiscription']);
	$discription=addslashes($_POST['discription']);
	$indexslider=$_POST['indexslider'];
	$bestseller=$_POST['bestseller'];
	$status=$_POST['status'];

    $extension = getExtension($_FILES['image']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			
            $name = $uni . '.' . $extension;
            $target_path = "upload/image/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/image/" . $name;
                //replace eith thumb
                $thumb_name = "upload/image/thumb/" . $name;
				$thumb_name1 = "upload/image/medthumb/" . $name;
				$thumb_name2 = "upload/image/bigthumb/" . $name;
				$thumb_name3 = "upload/image/sliderthumb/" . $name;

                $thumb = make_thumb($newname, $thumb_name,180,180);
				$thumb1 = make_thumb($newname, $thumb_name1,50,65);
				$thumb2 = make_thumb($newname, $thumb_name2,720,840);
				$thumb3 = make_thumb($newname, $thumb_name3,280,150);
            } else {
                header("location:product.php?msg=2");
                die();
            }
        } else {
            header("location:product.php?msg=1");
            die();
        }
		$cond="`image`='$name',";
		
		$icont1="`image`,";
		$icont2="'$name',";
    }

	if($id=='addnew') {
				
       $sql="INSERT INTO product (`productname`,`uniqname`,`producttypeid`,`seotitle`,`seokeyword`,`seodescription`,
					".$icont1." `price`,`date`,`shortdiscription`,`discription`,`indexslider`,`bestseller`, `status`) 
		VALUES ('$productname','$uniqname','$option','$seotitle','$seokeywords','$seodescription',".$icont2."'$price',NOW(),'$shortdiscription','$discription','$indexslider','$bestseller','$status')"; 
	     $recordinserted=$obj_db->insert($sql); 
		 $lastid=mysql_insert_id();
		 header("location:product.php?msg=added" );
   		die();
	} else {
	  $sql_user="UPDATE product SET `productname` = '$productname',`uniqname`='$uniqname',`producttypeid`='$option',
					   `seotitle`='$seotitle',`seokeyword`='$seokeywords',`seodescription`='$seodescription',".$cond."
						`price`='$price',`shortdiscription` = '$shortdiscription',`discription` = '$discription',
						`indexslider` = '$indexslider',`bestseller` = '$bestseller',`status` = '$status' WHERE `productid` = '".$id."' LIMIT 1";  
	 $update=$obj_db->sql_query($sql_user); 
	header("location:product.php?msg=updated" );
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