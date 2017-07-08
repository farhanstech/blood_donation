<?php 
if(isset($_SESSION['user_id']))
{
	header("location: profile.php");
}
require_once "header.php";
require_once "footer.php";
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script src="js/index.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
	<title>Humanity Organization - Blood Donation Wing</title>
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
	margin:0;
	padding:0;
}
h1{
    margin-top: 100px;
    font-size: 50px;
    font-weight: 100;
	color: white;
    text-align: center;
    font-family: 'Paytone One', sans-serif;
    text-shadow: 0 0 2px black;
}
.form{margin: 0px auto;}
</style>
  <body>
  <?php get_header(); ?>
  <div id="progress" style="display:none;"></div>
    <div class="wrapper">
	<h1>Forgot Password..??</h1>
    <div class="form">
        <div id="signup">
		  <h3 id="msg" style="color:#d62d20"></h3>
          
          <form action="" method="post" id="reg_form" enctype="multipart/form-data">
          		  
			

          <div class="field-wrap">
            <input type="email" placeholder="Enter Registered Email Address" name="email" autocomplete="off"/>
          </div>
          
		  		  
          <button id="forgot_submit" type="button" onclick="forgotPassword()" class="button button-block"/>Send Password</button>
          
          </form>

        </div>
      
</div> <!-- /form -->
</div>
<?php get_footer(); ?>
    
    
  </body>
</html>