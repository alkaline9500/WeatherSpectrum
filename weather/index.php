<?php
        $weather = simplexml_load_file('http://w1.weather.gov/xml/current_obs/KROC.xml');
        $temp = $weather->temp_f;
	//$temp = 200.0;
	$im = imagecreatefrompng('colors.png');
	if ($temp < 0)
	{
		$stemp = 0;
	}
	elseif ($temp > 100)
	{
		$stemp = 100;
	}
	else
	{
		$stemp = intval($temp);
	}
	$im = imagecreatefrompng("colors.png");
	$bgarr = imagecolorsforindex($im, imagecolorat($im, $stemp, 0));
	$tempbg_color = str_pad(DecHex($bgarr["red"]&240), 2, "0", STR_PAD_LEFT) . str_pad(DecHex($bgarr["green"]&240), 2, "0", STR_PAD_LEFT) . str_pad(DecHex($bgarr["blue"]&240), 2, "0", STR_PAD_LEFT);
	$fgarr = imagecolorsforindex($im, imagecolorat($im, $stemp, 1));
	$tempfg_color = str_pad(DecHex($fgarr["red"]&240), 2, "0", STR_PAD_LEFT) . str_pad(DecHex($fgarr["green"]&240), 2, "0", STR_PAD_LEFT) . str_pad(DecHex($fgarr["blue"]&240), 2, "0", STR_PAD_LEFT);
	// $image = $weather->icon_url_base.$weather->icon_url_name;
	$desc = $weather->weather;
?>
<html>
<head>
<title>Rochester Weather</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
</script>
<style>
#con
{
	width: 200px;
	height: 100px;
	//position: fixed;
	//top: 50%;
	//left: 50%;
	//margin-top: -50px;
	//margin-left: -100px;
	font-family: 'Ubuntu Mono', sans-serif;
}
#temp
{
        color: <?php echo $tempfg_color; ?>;
        font-size: 160px;
}
#desc
{
	font-size: 55px;
}
body
{
	background-color: <?php echo $tempbg_color; ?>;
}
</style>
</head>
<body onload="timedRefresh(300000);">
<div id='con'>
<?php
	echo "<div id='temp'>".$temp."&deg;</div>\n";
	echo "<div id='desc'>".$desc."</div>\n";
?>
</div>
</body>
</html>
