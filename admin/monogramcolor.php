<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>jQuery Colorpicker</title>
		<!-- jQuery/jQueryUI (hosted) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <style>
			body {
				font-family:	'Segoe UI', Verdana, Arial, Helvetica, sans-serif;
				font-size:		62.5%;
			}
        </style>
		<script src="js/jquery.colorpicker.js"></script>
		<link href="css/jquery.colorpicker.css" rel="stylesheet" type="text/css"/>
		<script src="i18n/jquery.ui.colorpicker-nl.js"></script>

		<script>
			$(function() {
				$('#tabs').tabs();
			});
		</script>
    </head>
    <body>
		<h1>jQuery ColorPicker</h1>

		<div id="tabs">
			<ul>
			  <li><a href="#tab-input-format">Input formatting</a></li>
			</ul>
			
			

			<div id="tab-input-format">
				<h2>Input formatting</h2>
				<input type="text" class="cp-input" value="rgb(123,42,87)"/>
			</div>

			
		</div>

		<script>
           	$( function() {
				
				 
                $('.cp-input').colorpicker({
					colorFormat: ['RGBA']
				});
			});
		</script>
    </body>
</html>
