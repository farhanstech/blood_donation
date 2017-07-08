<?php 
require_once "header.php";
require_once "footer.php";
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">  
	<title>Humanity Organization - Blood Donation Wing</title>
	<script>
		$(window).scroll(function() {
	if ($(this).scrollTop() > 1){  
		$('.sticky-header').addClass("sticky");
		$('.logo').hide();
		$('.sticky-logo').show();
		$('.menu-item').css("padding-top","0px");
	  }
	  else{
		$('.sticky-header').removeClass("sticky");
		$('.logo').show();
		$('.sticky-logo').hide();
		$('.menu-item').css("padding-top","15px");
	  }
	});
	</script>
</head>
<style>
.wrapper {
    min-height: 100%;
    height: auto !important; /* This line and the next line are not necessary unless you need IE6 support */
    height: 100%;
    margin: 0 auto -71px; /* the bottom margin is the negative value of the footer's height */
}
html, body {
    height: 100%;
}
#footer{
	margin-top:100px;
}
</style>
  <body>
  <div class="wrapper">
  <?php get_header(); ?>
  </div>
  <?php get_footer(); ?>
  </body>
</html>