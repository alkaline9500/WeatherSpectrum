<?php
        $weather = simplexml_load_file('http://w1.weather.gov/xml/current_obs/KROC.xml');
        $temp = $weather->temp_f;
	if ($temp < 30) // Cold
	{
		$tempbg_color = "#00b4ff";
		$temp_color = "#0400ff";
	}
	else if ($temp < 50)
	{
                $tempbg_color = "#00d4ff";
                $temp_color = "#0084ff";
	}
        else if ($temp < 70)
        {
                $tempbg_color = "#00ff83";
                $temp_color = "#00BD61";
        }
        else if ($temp < 80)
        {
                $tempbg_color = "#FFc800";
                $temp_color = "#FF6e00";
        }
	else
	{
                $tempbg_color = "#FF0000";
                $temp_color = "#FFF";
	}

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
        color: <?php echo $temp_color; ?>;
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
