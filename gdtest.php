<!DOCTYPE html>
<html>
<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <style type="text/css">
    #slider { margin: 10px; }
  </style>
<script>
  $(document).ready(function() {
		$("#slider").slider({
			range: "min",
			value: 1,
			step: 10,
			min: 0,
			max: 500,
			slide: function( event, ui ) {
				$( "input" ).val( "$" + ui.value );
			}
		});

		$("input").change(function () {
			var value = this.value.substring(1);
			console.log(value);
			$("#slider").slider("value", parseInt(value));
		});

	});
	
</script>
</head>

<body style="font-size:62.5%;">
  
<div id="slider"></div>

<div data-role="fieldcontain">
	<label for="slider-2">Input slider:</label>
	<input type="range" name="slider-2" id="slider-2" value="" min="0" max="100" data-theme="a" data-track-theme="b" />
</div>



</body>
</html>