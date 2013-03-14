<?php 
if(isset($_SESSION['adsadmin']) OR isset($_SESSION['id'])) {
	header("location:index.php");
	die();
}
if(isset($_REQUEST['submit'])) {
$username=$_REQUEST['uname'];
$password=$_REQUEST['password'];	


$sql="SELECT * FROM `admin` WHERE `varusername`='$username' AND `varpassword`='$password' AND `enumstatus`='Active'"; 
$result=$obj_db->select($sql);
if($result)
			{
				$_SESSION['adminid'] = $result[0]['intid'];
				$_SESSION['adsadmin'] = $result[0]['varusername'];
				$_SESSION['email'] = $result[0]['varemailid'];
				$_SESSION['id'] = '0';
							
				if($_POST['id']!=''){
					header("location:user.php?id=".$_POST['id']."&page=".$_POST['page']."");
					die();

				}
				else{
					header("location:index.php");
					die();
				}
			
			} else {
				header("location:login.php?msg=invalid");
				die();
				}
			}

	


?>