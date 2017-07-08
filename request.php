<?php 
require_once "header.php";
require_once "footer.php";
if(isset($_SESSION['user_id']))
{
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
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
h1{
	font-family: 'Paytone One', sans-serif;
}
</style>
  <body>
  <div class="wrapper">
  <?php get_header(); ?>
    <div class="form">
		
		
        <div id="signup">   
          <h1>Request Donors</h1>
		  <h3 id="msg" style="color:#d62d20"></h3>
          
          <form action="" method="post" id="req_form" enctype="multipart/form-data">
          
          
            <div class="field-wrap">
				<input type="text" placeholder="Patient's Name" name="pt_name"  autocomplete="off" />
            </div>
		  
		  <div class="top-row">
            <div class="field-wrap">
              <input type="number" placeholder="Age" min="18" max="70" maxlength="2" autocomplete="off" name="age"/>
            </div>
        
            <div class="field-wrap" style="color: rgba(255, 255, 255, 0.5);
    font-size: 20px;
    transform: translateY(6px);">
			  <input type="radio" name="gender" value="male" checked> Male
              <input type="radio" name="gender" value="female"> Female
            </div>
          </div>
		  
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
			
			<div class="field-wrap">
				<input type="text" placeholder="Hospital" name="hospital"  autocomplete="off" />
            </div>
		  
		  
		  <div class="field-wrap">
				<input type="text" placeholder="Case" name="case"  autocomplete="off" />
            </div>
		  
		  
		  <div class="field-wrap">
				<input type="text" placeholder="Address" name="address"  autocomplete="off" />
            </div>
		  

          <div class="field-wrap">
            <input type="email" placeholder="Attender's Name" name="aname" autocomplete="off"/>
          </div>
		  
		  <div class="field-wrap">
            <input type="text" placeholder="Attender's Contact Number"  autocomplete="off" name="amob" maxlength="10" pattern="[0-9]{10}"/>
          </div>
		  		  
          <button id="req_submit" type="button" onclick="requestDonor()" class="button button-block"/>Request Now</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    

        <script src="js/index.js"></script>
</div>
  <?php get_footer(); ?>
  </body>
</html>
<?php }
else{ header("location: index.php"); }
?>