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
if(isset($_REQUEST['submit'])) {
	$id=$_POST['id'];
	$title = addslashes(ucfirst(($_POST['title'])));
	$description1 = addslashes($_REQUEST['description1']);
	$description2 = addslashes($_REQUEST['description2']);
	$description3 = addslashes($_REQUEST['description3']);
	$description4 = addslashes($_REQUEST['description4']);
	$description5 = addslashes($_REQUEST['description5']);
	$description6 = addslashes($_REQUEST['description6']);
	$description7 = addslashes($_REQUEST['description7']);
	$description8 = addslashes($_REQUEST['description8']);
	$description9 = addslashes($_REQUEST['description9']);
	$video_link = addslashes($_REQUEST['video_link']);
	$discription=addslashes($_POST['discription']);
	$for=$_POST['for'];
	$type=$_POST['type'];
	$youtube=$_POST['youtube'];
	if($youtube!='yes'){
		$youtube="no";
	}
	//Video Upload
	$extension = getExtension($_FILES['video']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['video']['name'] != '') {
        if ($extension == 'flv' || $extension == 'mp4' || $extension == 'webm' || $extension == 'ogv')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/video/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['video']['tmp_name'], $target_path)) {
                              
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond0="`video`='$name',";
		
		$video1="`video`,";
		$video2="'$name',";
    }
	//Upload image 1
    $extension = getExtension($_FILES['image1']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image1']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image1']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image1/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond1="`image1`='$name',";		
		$icont11="`image1`,";
		$icont12="'$name',";
    }
	//Upload image 2
    $extension = getExtension($_FILES['image2']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image2']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image2/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond2="`image2`='$name',";		
		$icont21="`image2`,";
		$icont22="'$name',";
    }
	//Upload image 3
    $extension = getExtension($_FILES['image3']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image3']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image3']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image3/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond3="`image3`='$name',";		
		$icont31="`image3`,";
		$icont32="'$name',";
    }
	//Upload image 4
    $extension = getExtension($_FILES['image4']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image4']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image4']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image4/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond4="`image4`='$name',";		
		$icont41="`image4`,";
		$icont42="'$name',";
    }
	//Upload image 5
    $extension = getExtension($_FILES['image5']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image5']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image5']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image5/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond5="`image5`='$name',";		
		$icont51="`image5`,";
		$icont52="'$name',";
    }
	//Upload image 6
    $extension = getExtension($_FILES['image6']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image6']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image6']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image6/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond6="`image6`='$name',";		
		$icont61="`image6`,";
		$icont62="'$name',";
    }
	//Upload image 7
    $extension = getExtension($_FILES['image7']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image7']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image7']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image7/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond7="`image7`='$name',";		
		$icont71="`image7`,";
		$icont72="'$name',";
    }
	//Upload image 8
    $extension = getExtension($_FILES['image8']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image8']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image8']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image8/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond8="`image8`='$name',";		
		$icont81="`image8`,";
		$icont82="'$name',";
    }
	//Upload image 9
    $extension = getExtension($_FILES['image9']['name']);
    $extension = strtolower($extension);
    $uni = uniqid();
    if ($_FILES['image9']['name'] != '') {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png')
		{
			$name = $uni . '.' . $extension;
            $target_path = "upload/measurement/";
            $target_path = $target_path . basename($name);
            if (move_uploaded_file($_FILES['image9']['tmp_name'], $target_path)) {
                //Find old pic
                $newname = "upload/measurement/" . $name;
                //replace eith thumb
                $thumb_name = "upload/measurement/image9/" . $name;				
                $thumb = make_thumb($newname, $thumb_name,310,193);				
            } else {
                header("location:measurement.php?msg=2&for=".$for."&type=".$type."");
                die();
            }
        } else {
            header("location:measurement.php?msg=1&for=".$for."&type=".$type."");
            die();
        }
		$cond9="`image9`='$name',";		
		$icont91="`image9`,";
		$icont92="'$name',";
    }
	
	
	
	
	if($id=='addnew') {
				
       $sql="INSERT INTO measurements (`title`,`description`,`video_link`,".$video1."".$icont11."".$icont21."".$icont31."".$icont41."".$icont51."".$icont61."".$icont71."".$icont81."".$icont91."
					`image_desc_1`,`image_desc_2`,`image_desc_3`,`type`,`for`, `youtubevideo`) 
		VALUES ('$title','$discription','$video_link',".$video2." ".$icont12." ".$icont22." ".$icont32." ".$icont42." ".$icont52." ".$icont62." ".$icont72." ".$icont82." ".$icont92." '$description1','$description2','$description3','$type','$for','$youtube')"; 
	     $recordinserted=$obj_db->insert($sql); 
		 $lastid=mysql_insert_id();
		 header("location:measurement.php?msg=added&for=".$for."&type=".$type."" );
   		die();
	} else {
	  $sql_user="UPDATE measurements SET `title` = '$title',`description`='$discription',`video_link`='$video_link',
					   ".$cond0." ".$cond1." ".$cond2." ".$cond3." ".$cond4." ".$cond5." ".$cond6." ".$cond7." ".$cond8." ".$cond9."
					   `image_desc_1`='$description1',`image_desc_2`='$description2',`image_desc_3`='$description3',
					   `image_desc_4`='$description4',`image_desc_5`='$description5',`image_desc_6`='$description6',
					   `image_desc_7`='$description7',`image_desc_8`='$description8',`image_desc_9`='$description9',
						`youtubevideo` = '$youtube' WHERE `for` = '".$for."' AND `type`='".$type."' LIMIT 1";  
	 $update=$obj_db->sql_query($sql_user); 
	 
	 if($cond0!=''){
		$filename = "upload/measurement/video/".$_REQUEST['vid'];
		unlink($filename);		
	 }
	 
	 if($cond1!=''){
		 $filename = "upload/measurement/".$_REQUEST['img1'];
		 unlink($filename);
		 $filename = "upload/measurement/image1/".$_REQUEST['img1'];
		 unlink($filename);
	 }
	 
	 if($cond2!=''){
		 $filename = "upload/measurement/".$_REQUEST['img2'];
		 unlink($filename);
		 $filename = "upload/measurement/image2/".$_REQUEST['img2'];
		 unlink($filename);
	 }
	 if($cond3!=''){
		 $filename = "upload/measurement/".$_REQUEST['img3'];
		 unlink($filename);
		 $filename = "upload/measurement/image3/".$_REQUEST['img3'];
		 unlink($filename);
	 }
	 if($cond4!=''){
		 $filename = "upload/measurement/".$_REQUEST['img4'];
		 unlink($filename);
		 $filename = "upload/measurement/image4/".$_REQUEST['img4'];
		 unlink($filename);
	 }
	 if($cond5!=''){
		 $filename = "upload/measurement/".$_REQUEST['img5'];
		 unlink($filename);
		 $filename = "upload/measurement/image5/".$_REQUEST['img5'];
		 unlink($filename);
	 }
	 if($cond6!=''){
		 $filename = "upload/measurement/".$_REQUEST['img6'];
		 unlink($filename);
		 $filename = "upload/measurement/image6/".$_REQUEST['img6'];
		 unlink($filename);
	 }
	 if($cond7!=''){
		 $filename = "upload/measurement/".$_REQUEST['img7'];
		 unlink($filename);
		 $filename = "upload/measurement/image7/".$_REQUEST['img7'];
		 unlink($filename);
	 }
	 if($cond8!=''){
		 $filename = "upload/measurement/".$_REQUEST['img8'];
		 unlink($filename);
		 $filename = "upload/measurement/image8/".$_REQUEST['img8'];
		 unlink($filename);
	 }
	 if($cond9!=''){
		 $filename = "upload/measurement/".$_REQUEST['img9'];
		 unlink($filename);
		 $filename = "upload/measurement/image9/".$_REQUEST['img9'];
		 unlink($filename);
	 }
	 
	header("location:measurement.php?msg=updated&for=".$for."&type=".$type."" );
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