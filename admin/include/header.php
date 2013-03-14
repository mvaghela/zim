<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>

   <style type="text/css" media="all">
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
    </style>
<div id="hld">
		<div class="wrapper">		<!-- wrapper begins -->
			
			<div id="header">
				<div class="hdrl"></div>
				<div class="hdrr"></div>
				
				<h1><a href="index.php">Zymba</a></h1>
				<ul id="nav">
              <?php $currentpage=lastpage(); ?>
			 <li <?php if($currentpage=='user.php') { ?> class="active" <?php } ?> ><a href="#"  title="User Submited Forms"><span>User Forms</span></a>
              		<ul>
                      <li><a href="user.php"  title="Manage user"><span>User</span></a>
                      </li>                      
                     </ul>
             </li>
			 
			 <li <?php if($currentpage=='product.php') { ?> class="active" <?php } ?> ><a href="product.php"  title="Manage Product"><span>Product</span></a>
                 </li>
				 
				 <li <?php if($currentpage=='producttype.php') { ?> class="active" <?php } ?> ><a href="producttype.php"  title="Manage Product Type"><span>Product Type</span></a>
                 </li>
				 
				 <li <?php if($currentpage=='option.php') { ?> class="active" <?php } ?> ><a href="option.php"  title="Manage Option"><span>Option</span></a>
                 </li>			 
			 <li <?php if($currentpage=='cms_pages.php') { ?> class="active" <?php } ?> ><a href="cms_pages.php"  title="Manage Pages"><span>Pages</span></a>
              </li>
			  
			  <li <?php if($currentpage=='measurement.php') { ?> class="active" <?php } ?> ><a href="monogram.php"  title="Manage Monogram"><span>Monogram</span></a>
			   	<ul>
                    	<li><a href="monogramoption.php"  title="Monogram Option"><span>Monogram Option</span></a></li>
						<li><a href="colour.php"  title="Monogram Colour"><span>Monogram Colour</span></a></li>
						<li><a href="font.php"  title="Monogram Font"><span>Monogram Font</span></a></li>
				</ul>
				</li>
				
				
              <li <?php if($currentpage=='measurement.php') { ?> class="active" <?php } ?> ><a href="#"  title="Manage Measurements"><span>Measurements</span></a>
              		<ul>
                    	<li><a href="#"  title="Shirt Measurements"><span>Shirts</span></a>
                        	<ul>
                            	<li><a href="measurement.php?for=body-shape&type=shirt"  title="Shirt Measurements"><span>Body Shape </span></a></li>
								<li><a href="measurement.php?for=shirt-fit&type=shirt"  title="Shirt Measurements"><span>Shirt Fit </span></a></li>
								<li><a href="measurement.php?for=shirt-length&type=shirt"  title="Shirt Measurements"><span>Shirt Length </span></a></li>
                                <li><a href="measurement.php?for=shirt-shoulder&type=shirt"  title="Shirt Measurements"><span>Shirt Shoulder</span></a></li>
                                <li><a href="measurement.php?for=shirt-sleeve-length&type=shirt"  title="Shirt Measurements"><span>Shirt Sleeve length</span></a></li>
                                <li><a href="measurement.php?for=chest&type=shirt"  title="Shirt Measurements"><span>Chest</span></a></li>
                                <li><a href="measurement.php?for=stomach&type=shirt"  title="Shirt Measurements"><span>Stomach</span></a></li>
                                <li><a href="measurement.php?for=hip&type=shirt"  title="Shirt Measurements"><span>Hip</span></a></li>
                                <li><a href="measurement.php?for=shirt-neck&type=shirt"  title="Shirt Measurements"><span>Shirts Neck</span></a></li>
                                <li><a href="measurement.php?for=shirt-knee&type=shirt"  title="Shirt Measurements"><span>Shirt Knee</span></a></li>
                                <li><a href="measurement.php?for=wrist&type=shirt"  title="Shirt Measurements"><span>Wrist</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"  title="Blazer Measurements"><span>BLazers</span></a>
                        	<ul>
                            	<li><a href="measurement.php?for=suit-length&type=blazer"  title="Blazer Measurements"><span>SUIT  Length </span></a></li>
                                <li><a href="measurement.php?for=suit-shoulder&type=blazer"  title="Blazer Measurements"><span>SUIT Shoulder </span></a></li>
                                <li><a href="measurement.php?for=suit-sleeve-length&type=blazer"  title="Blazer Measurements"><span>SUIT Sleeve length </span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"  title="Pant Measurements"><span>Pants</span></a>
                        	<ul>
                            	<li><a href="measurement.php?for=body-shape&type=pant"  title="Pant Measurements"><span>Body Shape </span></a></li>
								<li><a href="measurement.php?for=pant-fit&type=pant"  title="Pant Measurements"><span>Pant Fit </span></a></li>
								<li><a href="measurement.php?for=pant-waist-image&type=pant"  title="Pant Measurements"><span>Pant Waist </span></a></li>
								<li><a href="measurement.php?for=waist-level&type=pant"  title="Pant Measurements"><span>Waist Level</span></a></li>
                                <li><a href="measurement.php?for=pant-length&type=pant"  title="Pant Measurements"><span>Pant Length </span></a></li>
                                <li><a href="measurement.php?for=pant-waist&type=pant"  title="Pant Measurements"><span>Pant Waist </span></a></li>
                                <li><a href="measurement.php?for=pant-hip&type=pant"  title="Pant Measurements"><span>Pant Hip </span></a></li>
                                <li><a href="measurement.php?for=pant-bottom&type=pant"  title="Pant Measurements"><span>Pant Bottom </span></a></li>
                            </ul>
                        </li>
                    </ul>              	
              </li>
			 <li<?php if($currentpage=='order.php' || $currentpage=='measurement_sample.php' || $currentpage=='customization_sample.php') { ?> class="active" <?php } ?>><a href="order.php"  title="Manage Orders"><span>Orders</span></a>
             </li>
             <li <?php if($currentpage=='testimonials.php' || $currentpage=='slidergallery.php' || $currentpage=='shirtfilter.php' || $currentpage=='coupon.php') { ?> class="active" <?php } ?>><a href="#"  title="Links"><span>Links</span></a>
             	<ul>
                	<li><a href="shirtfilter.php"  title="Manage Shirt Filter"><span>Shirt Filter</span></a></li>
                	<li><a href="slidergallery.php"  title="Manage Home Page Slider Image"><span>Home Slider Image</span></a></li>
                	<li><a href="testimonials.php"  title="Manage Thoughts"><span>Thoughts</span></a></li>
                    <li><a href="coupon.php"  title="Manage Coupons"><span>Coupons</span></a></li>
             	</ul>
             </li>
             </ul>
				
				
				<p class="user">Hello, <a href="setting.php"><?php echo $_SESSION['adsadmin']; ?></a> | <a href="logout.php">Logout</a></p>
			</div>		<!-- #header ends -->
			