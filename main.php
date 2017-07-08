<?php
session_start();
if(isset($_SESSION['user_id']))
{
require_once "save.php";
require_once "header.php";
require_once "footer.php";
?>
<head>
      <meta charset="utf-8">	  
	  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="css/main.css"/>	
	  <link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
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
</style>
<div class="wrapper">
  <?php get_header(); ?>
  <div class="container">
	<div class="bg-image">
		
		<h1>BLOOD DONATION WING</h1>
		<h3>"Because HUMANITY is in our <span>BLOOD</span>"</h3>
		<div id="search-form">
			<form class="form-container" id="search_form" action="donors.php" method="GET" >
				<input type="text" name="query_field" id="query_field" class="search-field" placeholder="Enter Donor's Name or Blood Group" />
				<div class="submit-container">
					<input type="submit" value="" id="search_submit" class="submit" />
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>
<?php }
else{ header("location: index.php");
}
?>
