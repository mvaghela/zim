<?php
$sqladmin="SELECT * FROM `admin` "; 
$resultadmin=$obj_db->select($sqladmin);

$sql="SELECT * FROM cms_pages WHERE  `id`='4' "; 
$pages=$obj_db->select($sql);

?>

<div class="footer">
	<div class="wrapper">
		<div class="contact-with-us">
			<div class="footer-title"> <img src="images/CONTACT-WITH-US.png" alt="CONTACT WITH US" />
				<h2>CONTACT WITH US</h2>
				<ul>
					<li><?php echo $resultadmin[0]['address'];?></li>
<!--					<li>Lorem ipsum dolor sit amet<br />
						33 NEW city 2222 new tower<br />
						xyz road 4da90h</li>-->
					<li>TEL:<?php echo $resultadmin[0]['varphoneno'];?></li>
					<li class="last">EMAIL: <a href="mailto:<?php echo $resultadmin[0]['varemailid'];?>"><?php echo $resultadmin[0]['varemailid'];?></a></li>
				</ul>
			</div>
		</div>
		<div class="care-and-advice">
			<div class="footer-title"> <img src="images/CARE-AND-ADVICE.png" alt="CARE AND ADVICE" />
				<h2><?php echo $pages[0]['Title'];?></h2>
			</div>
			<div class="double-comma-left"><img src="images/double-comma-up.png"  alt="comma"/></div>
			<p><?php echo $pages[0]['content'];?></p>
			<div class="double-comma-right"><img src="images/double-comma-down.png"  alt="comma"/> </div>
		</div>
		<div class="twitter">
			<div class="footer-title"> <img src="images/TWITTER.png" alt="TWITTER" />
				<h2>TWITTER</h2>
			</div>
			<ul>
				<li> <a href="#">Lorem ipsum dolor sit amet 
					consectetuer adipiscing elit
					Maecenas porttitor.</a> <a href="#">1 hour ago</a> </li>
				<li> <a href="#">Lorem ipsum dolor sit amet 
					consectetuer adipiscing elit
					Maecenas porttitor.</a> <a href="#">1 hour ago</a> </li>
			</ul>
		</div>
		<div class="footer-bottom">
			<div class="social-div">
				<ul>
					<li>
						<h3>CONNECT WITH US</h3>
					</li>
					<li><a href="<?php echo $resultadmin[0]['facebooklink'];?>" title="facebook"><img src="images/facebook.png"  alt="facebbok"/></a></li>
					<li><a href="<?php echo $resultadmin[0]['twitterlink'];?>" title="twitter"><img src="images/twitter-1.png"  alt="twitter"/></a></li>
					<li><a href="mailto:<?php echo $resultadmin[0]['varemailid'];?>"><img src="images/main.png"  alt="main"/></a></li>
					<li><a href="<?php echo $resultadmin[0]['varemailid'];?>" title="Google Plus"><img src="images/google-plus.png"  alt="Google Plus"/></a></li>
				</ul>
			</div>
			<div class="news-letters">
				<ul>
					<li>
						<h3>CONNECT WITH US</h3>
					</li>
					<li>
						<form action="#" method="post">
							<input class="input-text" type="text"  value="YOUR EMAIL"/>
							<input class="button" type="button"  value="GO"/>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
