<?php
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Send') {
	$sql="SELECT * FROM `user` WHERE `email`='".$_REQUEST['email']."'"; 
	$result=$obj_db->select($sql);
	
	$select_admin="SELECT * FROM `admin`";
	$admin_res=$obj_db->select($select_admin);
	if(count($result)==0){
		header("location:index.php?msg=1");
		die();	
	}
	 $mail="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			<title>Contact</title>
			<style type='text/css'>
				body {
					font-family:Calibri;
					font-size:14px;
					font-weight:normal;
				}
				.innertd td {
					border: 1px solid silver;
					border-collapse: collapse;
					margin: 2px;
					padding: 5px;
				}
				.innertd {
					border: 1px solid silver;
					border-collapse: collapse;
					margin: 2px;
					padding: 5px;
				}
				.header {
					height:25px;
					padding:5px;
				}
				.firstcol {
					width:100px;
					padding:5px;
				}
				.redfont {
					color:#0F75BD;
				}
			</style>
			</head>
			<body style='background-color:#f4f4f4; width:100%; height:100%; font-family:Verdana, Geneva, sans-serif;'>
			
			<center>
			<table cellpadding='0' cellspacing='0' style='background-color:#FFFAF0; width:700px; border-collapse:collapse; margin:0px; padding:0px;'>
				<tbody>
				<tr>
					<td>
						<div style='border:none; height:10px; background: #0F75BD;' />&nbsp;<div>
					</td>
				</tr>
				<tr>
					<td style='padding:15px; font-size:16px; font-family:Verdana, Geneva, sans-serif; font-weight:bold;'>
						Hello ".$result[0]['firstname']."
					</td>
				</tr>
				<tr>
					<td>
						<table width='95%' cellpadding='2' cellspacing='3' class='innertd'>
							<tr>
								<th colspan='2'>Your login Detail</th>
							</tr>
							<tr>
								<td>Email</td>
								<td>".$result[0]['email']."</td>
							</tr>
							<tr>	
								<td>Password</td>
								<td>".$result[0]['password']."</td>
							</tr>
							<tr>
								<td>Login URL</td>
								<td><a href='".$admin_res[0]['website']."login.php'>Click here</a></td>
							</tr>
						</table>
					</td>
				</tr>				
				<tr>
					<td style=' font-weight:bold; font-size:12px; padding-bottom:5px; font-family:Verdana, Geneva, sans-serif;  padding-bottom:15px; padding-left:15px;'>
						<br /><p>
							Thanks!<br /> 
							<a href='".$admin_res[0]['website']."'>Zymba</a>
							
							</p>
					</td>
				</tr>
				<tr>
					<td>
						<div style='border:none; height:10px; background: #0F75BD;' />&nbsp;<div>
					</td>
				</tr>	
			</tbody>
			</table>
			</center>
		</body>
	</html>";
	
	
	$subject="Login Detail for Zymba";
	$from = 'info@zymba.com'; 
	$headers = "From:". "$from"."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($result[0]['email'],$subject,$mail,$headers);
	header("location:index.php");
	die();
}
?>