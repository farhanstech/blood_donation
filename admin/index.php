<?php
require_once "../database_connection.php";

function donorsCount($group)
{
$result = mysql_query("SELECT * FROM userinfo WHERE blood_group='$group'");
$count = mysql_num_rows($result);
return $count;
}

function usersCount()
{
$result = mysql_query("SELECT * FROM userinfo");
$count = mysql_num_rows($result);
return $count;
}


$query1 = mysql_query("SELECT * FROM `notification` GROUP BY `request_no`");
$total = mysql_num_rows($query1);

$query2 = mysql_query("SELECT * FROM `notification` where accepted='true' GROUP BY `request_no`");
$accepted = mysql_num_rows($query2);

$pending = $total - $accepted;

$acceptedPer = ($accepted/$total)*100;
$pendinPer = ($pending/$total)*100;


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>BLOOD DONATION </span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="login.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							A+
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('A+'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							B+
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('B+'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							O+
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('O+'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							AB+
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('AB+'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							A-
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('A-'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							B-
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('B-'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							O-
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('O-'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left" style="font-size: 40px;">
							AB-
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo donorsCount('AB-'); ?></div>
							<div class="text-muted">Donors</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3" style="width:50%;">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo usersCount(); ?></div>
							<div class="text-muted">Total No. of Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3" style="width:50%;">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						     <svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total; ?></div>
							<div class="text-muted">Total No. of Requests</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
		
		
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Donors Chart</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="chart" id="pie-chart" height="251" width="502" style="width: 502px; height: 251px;"></canvas>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Accepted Requests</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $acceptedPer; ?>" ><span class="percent"><?php echo $acceptedPer; ?>%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Pending Requests</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $pendinPer; ?>" ><span class="percent"><?php echo $pendinPer; ?>%</span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-teal">
					<div class="panel-heading dark-overlay">Your 5 Minutes Can Save a Life</div>
					<div class="panel-body">
						<p></p>
					</div>
				</div>
			</div>
		</div><!--/.row-->
								
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	
	var pieData = [
				{
					value: <?php echo donorsCount('A+') ?>,
					color:"#30a5ff",
					highlight: "#62b9fb",
					label: "A+"
				},
				{
					value: <?php echo donorsCount('B+') ?>,
					color: "#ffb53e",
					highlight: "#fac878",
					label: "B+"
				},
				{
					value: <?php echo donorsCount('AB+') ?>,
					color: "#963d97",
					highlight: "#fac878",
					label: "AB+"
				},
				{
					value: <?php echo donorsCount('O+') ?>,
					color: "#e03a3e",
					highlight: "#fac878",
					label: "O+"
				},
				{
					value: <?php echo donorsCount('A-') ?>,
					color: "#f5821f",
					highlight: "#fac878",
					label: "A-"
				},
				{
					value: <?php echo donorsCount('B-') ?>,
					color: "#61bb46",
					highlight: "#fac878",
					label: "B-"
				},
				{
					value: <?php echo donorsCount('AB-') ?>,
					color: "#1ebfae",
					highlight: "#3cdfce",
					label: "AB-"
				},
				{
					value: <?php echo donorsCount('O-') ?>,
					color: "#f9243f",
					highlight: "#f6495f",
					label: "O-"
				}

			];
			

window.onload = function(){
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
	});
	
};
	</script>	
</body>

</html>