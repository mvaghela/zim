<?php

################################################################
#		Common Function
##################################################################

//FUNCTION FOR THE CREATING THE IMAGE ACCORDING TO USER SIZE
function createThumb( $sourcepath , $targetpath ,$name , $size )
{
 		$img = $sourcepath ;
		
		$handle = fopen ($img, "rb");
		
		$org = fread ($handle, filesize ($img));
		
		fclose ($handle);
		
		$tnsize =$size;
		
		$img = imagecreatefromstring( $org );
		
		$w = imagesx( $img );
		
		$h = imagesy( $img );
		
		if( $w > $h )
		{
		
			$ratio = $w / $h;
			
			$nw = $tnsize;
			
			$nh = $nw / $ratio;
		}
		else
		{
			$ratio = $h / $w;
			
			$nh = $tnsize;
			
			$nw = $nh /$ratio;
		}
		$img2 = imagecreatetruecolor( $nw, $nh );
		
		imagecopyresampled ( $img2, $img, 0, 0, 0 , 0, $nw, $nh, $w, $h );
		
		$fimg = $name.'.'.'jpg';
		
		$real_tpath = realpath ($targetpath);
		
		/*if( $HTTP_ENV_VARS['OS'] == 'Windows_NT')
		{
		
			$real_tpath= str_replace( "\\", "\\\\", $real_tpath);
			
			$file = $real_tpath . "\\" . $fimg;
		
		}
		else*/
		{
				$file = $real_tpath . "/" . $fimg;
		}
		
		imagejpeg( $img2, $file );
	
		 
		return $file;
}

function check_input_db($value)
{
		
	$value=htmlspecialchars($value, ENT_QUOTES);
	$value = addslashes($value);
	
	// Quote if not a number
	if (!is_numeric($value))
	{
		 $value = "'" . mysql_real_escape_string($value) . "'";
	}
	
	
	return trim($value);
}
//FUnction FOR Generate Random numbers
function random()
{
	$input = array(4,6,2,8,5,1,7,3,9,"N","A","M","E","K");
	$rand_keys = array_rand($input,7);
	$rand_number = "";
	for($i=0; $i<7; $i++)
	{
		$rand_number = $rand_number.$input[$rand_keys[$i]];
	}
	return $rand_number;
}


// FUNCTION FOR THE SENDING SIMPLE OR HTML MAILS
function SendEmail($to,$from,$subject,$msg,$cond)
{//echo $msg;die();
	//$cond=0     For the simple mail to send
	//$cond=1     For Html Format Mail Send
	if($cond==0)
	{
    	$mail_subject = $subject;
		$message = $msg;
		$mail_to = $to;
		$mail_from = $from;
    	$headers = "From:".$mail_from;

		mail($mail_to, $mail_subject, $message, $headers);
	}
	if($cond==1)
	{
		/* recipients */
		//-->$to  = "mary@example.com" . ", " ; // note the comma


		/* subject */
		//-->$subject = "Birthday Reminders for August";

		/* message */
				$message = '
					<html>
					<head>
					<title>'.$_SESSION['config_val'][0]['varcurrency'].'</title>
					</head>
					<body>
					<table width=100% border=0 cellspacing=0 cellpadding=0 >
					 <tr>
    					<td class="skinbg">'.$msg.'</td>
  					</tr>
					<tr>
    					<td class="skinbg">&nbsp;</td>
  					</tr>
					</table>
					</body>
					</html>';

			/* To send HTML mail, you can set the Content-type header. */
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			/* additional headers */
			$headers .= "To: ".$to."\r\n";
			$headers .= "From: ".$from."\r\n";
						
			/* and now mail it */
			//echo $to.",". $subject.",". $message.",.". $headers;die();
			if(mail($to, $subject, $message, $headers))
			{return true;}
	
	}
}


// FUNCTION FOR CHECKING THE VARAIBLE IS SET OR NOT (REQUEST  OR SESSION )
function issetvar($val="",$fixkept="")
{
	
	if(isset($_REQUEST[$val]))
	{
		return $_REQUEST[$val];
	}
	else
	{
		if(isset($_SESSION[$val]))
		{
			return $_SESSION[$val];
		}
		else
		{	
			if(trim($fixkept)!="")
			{
				return $fixkept;
			}
			else
			{
				return false;
			}
		}
	}
}


// FUNCTION FOR CHECKING  THAT ANY MAGIC QUOTES ARE REPLACED IN STRING
function mymagictxt($theValue)
{
	$theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;	
	$theValue= str_replace("%<%","&lt;",$theValue);
	$theValue= str_replace("%>%","&gt;",$theValue);
	return $theValue;
}

function makeUniqueName($string)
{
	$string = strtolower($string);
	$find=array(' ');
	$replace = array('-');
	$data=str_replace($find, $replace, $string); 
	return $data;
}




// FUNCTION FOR CHECKING ACTIONS OF FORM
function actionfrmcheck($var="",$val="")
{
	//echo $_REQUEST[$var]."$var-->$val";
	if( isset($_REQUEST[$var])  && ($_REQUEST[$var]!="") &&  ($_REQUEST[$var]==$val) )
	{
		return true;
	}
	else
	{
		return false;
	}
}


// FUNCTION FOR THE FETCHING THE VALUE FROM CONFIG AND STORE IN SESSION
function configvalfetch($obj_db)
{
	$sql="SELECT *	FROM  `tblconfigsite`";
	//	echo $sql."<br>";
	$res_config=$obj_db->select($sql);
	$newdata="";
	for($i=0;$i<count($res_config);$i++)
	{
		$fld=$res_config[$i]['varfieldname'];
		$val=$res_config[$i]['value'];
		$newdata[$fld]= $val;
	}

	 return $newdata;
	
}

//FUNCTION FOR THE PER PAGE ROW DISPLAY DROP DOWN CREATE
function drpdown_display($maxval)
{
	echo " <select name='sltpage' onChange='this.form.submit();'>";
	//echo "<option value=0>Select</option>";
	if(actionfrmcheckrm('sltpage') )
	{
			$tmppage=$_REQUEST['sltpage'];								
	}
	for($i=0;$i<$maxval;$i=$i+ DRPPG )
	{
		$slted="";
		if($tmppage==$i)
		{
			$slted=" Selected";
		}
		
		if($i==0)
		{
			echo "<option value=".$i." $slted >".All."</option>";
		}
		else
		{
			echo "<option value=".$i." $slted >".$i."</option>";
		}
	}
	echo "</select>";
}





// parsedate from time stamp in linux

function printdate($timestamp)
{
	if(strpos($timestamp, "-"))
	{
		$timestamp=explode(" ",$timestamp);
		$timestamp=explode("-",$timestamp[0]);
		$yr=$timestamp[0];
		$month=$timestamp[1];
		$day=$timestamp[2];
		
	}
	else
	{
		$yr=substr($timestamp, 0, 4);
		$month=substr($timestamp, 4, 2);
		$day=substr($timestamp, 6, 2);
	}
	$mon[1]="Jan";
	$mon[2]="Feb";
	$mon[3]="Mar";
	$mon[4]="Apr";
	$mon[5]="May";
	$mon[6]="June";
	$mon[7]="July";
	$mon[8]="Aug";
	$mon[9]="Sep";
	$mon[10]="Oct";
	$mon[11]="Nov";
	$mon[12]="Dec";
	//$date = $yr."-".$mon[ceil($month)]."-".$day;
	$date = $day."-".$mon[ceil($month)]."-".$yr;
	return $date;
	
}

### FUNCTION FOR Automatic Emails FORMAT
function automails($obj_db)
{
$sql="SELECT * FROM `tbl_autoemails` WHERE intstatus='1'";
$res_automail=$obj_db->select($sql);
$newdata="";
for($i=0;$i<count($res_automail);$i++)
{
$title=$res_automail[$i]['title'];
$subject=$res_automail[$i]['subject'];
$mailformat=$res_automail[$i]['mailformat'];
$maildata['subject'][$title]= $subject;
$maildata['format'][$title]= $mailformat;
}
return $maildata;
}

#### Function to prevent database attack:
function check_input($value)
{
	// Stripslashes
	if (get_magic_quotes_gpc())
	{
		$value = stripslashes($value);
	}
	// Quote if not a number
	if (!is_numeric($value))
	{
		 $value = "'" . mysql_real_escape_string($value) . "'";
	}
	return trim($value);
}

#### function should print out: February, March, April, May, and June
### Between two dates...
function get_months($date1, $date2) {
   $time1  = strtotime($date1);
   $time2  = strtotime($date2);
   $my     = date('mY', $time2);

   $months = array(date('F', $time1));
   $f      = '';

   while($time1 < $time2) {
      $time1 = strtotime((date('Y-m-d', $time1).' +15days'));
      if(date('F', $time1) != $f) {
         $f = date('F', $time1);
         if(date('mY', $time1) != $my && ($time1 < $time2))
            $months[] = date('F', $time1);
      }
   }

   $months[] = date('F', $time2);
   return $months;
}

function site_Encryption($val)
{
	$letter1 = ucfirst(chr(rand(97,122)));
	$letter2 = ucfirst(chr(rand(97,122)));
	$letter3 = ucfirst(chr(rand(97,122)));
	$letter4 = ucfirst(chr(rand(97,122)));
	$str1=$letter1.$letter4."#";
	$str2="#".$letter2.$letter3;
	return base64_encode($str1.$val.$str2);
}

function site_Decryption($val)
{
	$exp = explode("#",base64_decode($val));
	return $exp[1];
}

function selfURL() {
	$s = empty($_SERVER["HTTPS"]) ? ''
		: ($_SERVER["HTTPS"] == "on") ? "s"
		: "";
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
		: (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
function strleft($s1, $s2) {
	return substr($s1, 0, strpos($s1, $s2));
}


function Removeword($msg,$pat){
//wrightdown which you want to remove 
//$pattern = '([i][d][=]\w*[&]*)';
//$pattern = '([c][a][t][e][=]\w*[&]*)';
//$pattern = '([p][a][g][e][=]\w*[&]*)';
//$pattern = '([m][s][g][=]\w*[&]*)';
$string =$msg;
$pattern = $pat;
$replacement = '';
$rowstring=preg_replace($pattern, $replacement, $string);
$last = substr($rowstring, -1);
if($last=='?'){
	return  substr($rowstring,0,-1);
}else if($last=='&'){
	return substr($rowstring,0,-1);
} else {
  return $rowstring;
}

}

//get last page page name of any url
function lastpage() {
$fullurl=parse_url($_SERVER["REQUEST_URI"]);
$Arrayofurl=explode ("/",$fullurl[path]);
return end($Arrayofurl);
}

//to check put ? or &
function checkurlconnecter(){;
	$level1=explode ("/",$_SERVER['REQUEST_URI']);
    $level2=end($level1);
	$level3=explode ("?",$level2);
	if(count($level3)>1) {
		return "&";
	} else {
		return "?";
	}
}
//check connecter of msg
function checkurlconnectergiven($url){;
	$level1=explode ("/",$url);
    $level2=end($level1);
	$level3=explode ("?",$level2);
	if(count($level3)>1) {
		return "&";
	} else {
		return "?";
	}
}

//get all data after ?
function Getalldataafter(){;
	$level1=explode ("/",$_SERVER['REQUEST_URI']);
    $level2=end($level1);
	$level3=explode ("?",$level2);
	return $level3[1];
}


function Removemsg($msg){
//wrightdown which you want to remove 
$string =$msg;
$pattern = '([m][s][g][=]\w*[&]*)';
$replacement = '';
$rowstring=preg_replace($pattern, $replacement, $string);
$last = substr($rowstring, -1);
if($last=='?'){
	return  substr($rowstring,0,-1);
}else if($last=='&'){
	return substr($rowstring,0,-1);
} else {
  return $rowstring;
}

}

function Removepage($msg){
//wrightdown which you want to remove 
$string =$msg;
$pattern = '([p][a][g][e][=]\w*[&]*)';
$replacement = '';
$rowstring=preg_replace($pattern, $replacement, $string);
$last = substr($rowstring, -1);
if($last=='?'){
	return  substr($rowstring,0,-1);
}else if($last=='&'){
	return substr($rowstring,0,-1);
} else {
  return $rowstring;
}

}


function Removeid($msg){
//wrightdown which you want to remove 
$string =$msg;
$pattern = '([i][d][=]\w*[&]*)';
$replacement = '';
$rowstring=preg_replace($pattern, $replacement, $string);
$last = substr($rowstring, -1);
if($last=='?'){
	return  substr($rowstring,0,-1);
}else if($last=='&'){
	return substr($rowstring,0,-1);
} else {
  return $rowstring;
}

}


function Removecateid($msg){
//wrightdown which you want to remove 
$string =$msg;
$pattern = '([c][a][t][e][=]\w*[&]*)';
$replacement = '';
$rowstring=preg_replace($pattern, $replacement, $string);
$last = substr($rowstring, -1);
if($last=='?'){
	return  substr($rowstring,0,-1);
}else if($last=='&'){
	return substr($rowstring,0,-1);
} else {
  return $rowstring;
}

}

function Replacestring($string) {
$find=array(' ', '&');
$replace = array('_', '+');
$data=str_replace($find, $replace, $string); 
return $data; 
}

function ReverceReplacestring($string) {
$replace=array(' ', '&');
$find = array('_', '+');
$data=str_replace($find, $replace, $string);
return $data; 
}
?>