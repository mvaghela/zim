<?php
if(isset($_REQUEST['del'])) {
  $albumid=$_REQUEST['albumid'];
	$del_sql="DELETE FROM `slidergallery` WHERE `id` = '".$_REQUEST['del']."'";
   $del_cat=$obj_db->sql_query($del_sql);
 if($_REQUEST['img']!='') {
		$filename = "upload/slidergallery/thumb/".$_REQUEST['img'];
		unlink($filename);
		$filename = "upload/slidergallery/thumbbig/".$_REQUEST['img'];
		unlink($filename);
		$filename = "upload/slidergallery/".$_REQUEST['img'];
		unlink($filename);
	}
   header("location:slidergallery.php?msg=deleted&page=".$_REQUEST['page'].$condition); 
   die();
     
}

if(isset($_REQUEST['submit']) AND $_REQUEST['submit']=='OK') {
$totalrow=$_POST['totalrow']; 
 for($i=0;$i<$totalrow;$i++) {
  $updateordersql="UPDATE `slidergallery` SET `displayorder` = '".$_POST['order'.$i]."' WHERE `id` ='".$_POST['pid'.$i]."' LIMIT 1";
  $updateorder=$obj_db->sql_query($updateordersql); 
 
 }
  header("location:slidergallery.php?msg=updated&page=".$_POST['page'].""); 
   die();
}

if(isset($_REQUEST['change'])) {
   if($_REQUEST['status']=='active')
   {
   $del_status="UPDATE `slidergallery` SET `status` = 'inactive'  WHERE `id` = '".$_REQUEST['change']."'"; 
   $status_cat=$obj_db->sql_query($del_status);
   } else {
	$del_status="UPDATE `slidergallery` SET `status` = 'active'  WHERE `id` = '".$_REQUEST['change']."'";
   $status_cat=$obj_db->sql_query($del_status);
   }
   $albumid=$_REQUEST['albumid'];
   header("location:slidergallery.php?msg=updated&page=".$_REQUEST['page']."");
   die();
}

if(isset($_REQUEST['submit'])) {
  
  $title=addslashes($_REQUEST['title']);
  
  $id=$_REQUEST['id'];
   $acn=$_REQUEST['acn'];
  $status=$_REQUEST['status'];
  
    $thumpw2=300;
	$thumph2=100;
	
    $thumpw3=1350;
	$thumph3=453;
	
	$path="upload/slidergallery/";
	$path2="upload/slidergallery/thumb/";
	$path3="upload/slidergallery/thumbbig/";
	

   	$extension = getExtension($_FILES['image']['name']);
    $extension = strtolower($extension);
    $uni = uniqid('');
	
    if ($_FILES['image']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png') {

            $name = $uni . '.' . $extension;
            $target_path = $path;
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = $path . $name;
                //replace eith thumb
                $thumb_name = $path . $name;
				$thumb_name2 = $path2 . $name;
				$thumb_name3 = $path3 . $name;
               
			 	$thumb = make_thumb($thumb_name, $thumb_name2,$thumpw2,$thumph2);
			 	$thumb = make_thumb($thumb_name, $thumb_name3,$thumpw3,$thumph3);
            } else {
                header("location:slidergallery.phpmsg=prob");
                die();
            }
        } else {
            header("location:slidergallery.php?msg=notvelid");
            die();
        }
		$cond="`image` = '$name',"; 
		$cond1="`image`,";
		$cond2="'".$name."',";
    }
 	$url=addslashes($_REQUEST['url']);
	if($id=='addnew') {
		 $sql="INSERT INTO `slidergallery` (`title`,".$cond1." `status`,`url`) 
		 VALUES ('$title',".$cond2." '$status','$url')";  
  		$insrecord=$obj_db->insert($sql);
		 
		 header("location:slidergallery.php?msg=added");
   		die();
	} else {
	  $sql_user="UPDATE `slidergallery` SET `title` = '$title',".$cond." 
	   `url`='$url',`status`='$status' WHERE `id` = $id LIMIT 1";
	  $update=$obj_db->sql_query($sql_user);
	  
  	  if($cond!=''){
    	$filename = "upload/slidergallery/".$_REQUEST['img'];
		unlink($filename);
	
		$filename = "upload/slidergallery/thumb/".$_REQUEST['img'];
		unlink($filename);

		$filename = "upload/slidergallery/thumbbig/".$_REQUEST['img'];
		unlink($filename);
	  }

	
   header("location:slidergallery.php?msg=updated&page=".$_REQUEST['page'].$condition);
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