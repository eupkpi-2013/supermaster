<! DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../kpi_sources/style.css">
<script src="../kpi_sources/js/jquery-1.9.1.js"></script>
<script src="../kpi_sources/Highcharts-3.0.1/js/highcharts.js"></script>
<script src="../kpi_sources/js/js.js"></script>
<?php
	header('refresh:5; url=index');
?>

<title>eUP KPI</title>
</head>

<body>
	<div class="login login-banner">
		<a href = '<?php echo site_url(); ?>/index'>
		<img src="../kpi_sources/img/up_small.png"/>
		<h1>eUP KPI</h1>
		</a>
	</div>

	<div id="login-buttons" class="login content">
		<?php
			echo "You have accessed a forbidden page! <br /> <br /> You will be automatically redirected out of this page. Click "."<a href='index' style='color: blue'>here</a>"." if you are not redirected in 5 seconds.";
		?>
	</div>
	<div class="login splash"></div>
	
</body>
</html>