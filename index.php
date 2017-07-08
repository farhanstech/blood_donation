<?php 
require_once "header.php";
require_once "footer.php";
if(isset($_SESSION['user_id']))
{
	header("location: main.php");
}
else{
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
	<div id="progress" style="display:none;"></div>
    <div class="form">
      
      <ul class="tab-group">
		<li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>        
      </ul>
      
      <div class="tab-content">
	  
		<div id="login">   
          <h1>Welcome Back!</h1>
		  <h3 id="msg_login" style="color:#d62d20"></h3>
          
          <form id="login_form" action="" method="post">
          
            <div class="field-wrap">
            <input name="usr_mail" id="usr_mail" placeholder="Email Address" type="email" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input name="usr_pass" id="usr_pass" placeholder="Password" type="password" autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button id="login_button" type="button" onclick="user_login()" class="button button-block"/>Log In</button>
          
          </form>
			
        </div>
		
		
        <div id="signup">   
          <h1>Your 5 Minutes can Save a Life</h1>
		  <h3 id="msg" style="color:#d62d20"></h3>
          
          <form action="" method="post" id="reg_form" enctype="multipart/form-data">
          
          
            <div class="field-wrap">
				<input type="text" placeholder="Name" name="full_name"  autocomplete="off" />
            </div>
		  
		  <div class="top-row">
            <div class="field-wrap">
              <input type="number" placeholder="Age"  autocomplete="off" name="age" min="18" max="70" maxlength="2"/>
            </div>
        
            <div class="field-wrap" style="color: rgba(255, 255, 255, 0.5);
    font-size: 20px;
    transform: translateY(6px);">
			  <input type="radio" name="gender" value="male" checked> Male
              <input type="radio" name="gender" value="female"> Female
            </div>
          </div>
		  
		  <div class="top-row">
            <div class="field-wrap">
              <select name="blood_group">
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
			  </select>
            </div>
        
            <div class="field-wrap">
			
              <input type="text" name="last_donated"  autocomplete="off" id="datepicker" placeholder="Last Donated"/>
            </div>
          </div>

          <div class="field-wrap">
            <input type="email" placeholder="Email Address" name="email" autocomplete="off"/>
          </div>
		  
		  <div class="field-wrap">
            <input type="text" placeholder="Contact Number"  autocomplete="off" name="mob" maxlength="10" pattern="[0-9]{10}"/>
          </div>
		  
		  <div class="field-wrap">
            <input type="password" placeholder="Password" name="pass" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input type="password" placeholder="Confirm Password" name="cpass" autocomplete="off"/>
          </div>
          
		  <div class="field-wrap">
            <input type="file" name="photoimg" id="photoimg" onchange="document.getElementById('file-path').value = this.value.split('\\')[this.value.split('\\').length-1];" style="opacity: 0;
    position: absolute;"/>
			<input type="text" id="file-path" name="pic" placeholder="Upload Profile Picture"/>
          </div>
		  
          <button id="reg_submit" type="button" onclick="user_registration()" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    

        <script src="js/index.js"></script>
</div>
  <?php get_footer(); ?>
  </body>
</html>
<?php } ?>