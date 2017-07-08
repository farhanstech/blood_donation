<?php
session_start();
if(isset($_SESSION['user_id']))
{
require_once "header.php";
require_once "footer.php";
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM userinfo where email = '$user_id'"; 
$result = mysql_query ($sql);
$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html >
  <head>
  <title>Humanity Organization - Blood Donation Wing</title>
  <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
  <meta charset="UTF-8">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/index.js"></script>
<style>
.white-text{
    margin-top: 8px;
    margin-right: 20px;
    float: right;
    font-family: arial;
    color: white;
    text-decoration: none;
}
.white-text:hover{
    color: black;
	font-family: arial;
}
.btn-group{
background-color: #E67E22;
    width: 100%;
    height: 40px;
}
.field-wrap img {
width: 150px;
	height: 150px;
	border-radius: 50%;
	box-shadow: 1px 1px 5px #000;
	}
form{
text-align:center;
}
.wrapper {
    min-height: 100%;
    height: auto !important; /* This line and the next line are not necessary unless you need IE6 support */
    height: 100%;
    margin: 0 auto -71px; /* the bottom margin is the negative value of the footer's height */
}
html, body {
    height: 100%;
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
.form{margin-top: 0px;}
</style>
    
    
    
  </head>

  <body>
  <div class="wrapper">
  <?php get_header(); ?>
  <div id="progress" style="display:none;"></div>
    <h1>My Profile</h1>
    <div class="form">
        <div id="signup">   
          
		  <h3 id="msg" style="color:#d62d20"></h3>
          
          <form action="" method="post" id="update_form" enctype="multipart/form-data">
          		  
			<div class="field-wrap">
            <input onchange="readURL(this);" type="file" name="photoimg" id="photoimg" style="opacity: 0;
    position: absolute;"/>
	        <img src="uploads/<?php echo $row['profile_pic'] ?>" alt="" id="pic">
          </div>
            
		  
            <div class="field-wrap">
				<input type="text" placeholder="Name" name="full_name" value="<?php echo $row['name'] ?>" autocomplete="off" />
            </div>
		  
		  <div class="top-row">
            <div class="field-wrap">
              <input type="number" placeholder="Age" value="<?php echo $row['age'] ?>" autocomplete="off" name="age" min="18" max="70" maxlength="2" />
            </div>
        
            <div class="field-wrap" style="color: rgba(255, 255, 255, 0.5);
    font-size: 20px;
    transform: translateY(6px);">
			  <input type="radio" name="gender" value="male" <?php if ($row['gender'] == "male"){echo "checked";} ?> > Male
              <input type="radio" name="gender" value="female" <?php if ($row['gender'] == "female"){echo "checked";} ?> > Female
            </div>
          </div>
		  
		  <div class="top-row">
            <div class="field-wrap">
              <select name="blood_group">
				<option value="O+" <?php if ($row['blood_group'] == "O+"){echo "selected";} ?> >O+</option>
				<option value="O-" <?php if ($row['blood_group'] == "O-"){echo "selected";} ?> >O-</option>
				<option value="A+" <?php if ($row['blood_group'] == "A+"){echo "selected";} ?> >A+</option>
				<option value="A-" <?php if ($row['blood_group'] == "A-"){echo "selected";} ?> >A-</option>
				<option value="B+" <?php if ($row['blood_group'] == "B+"){echo "selected";} ?> >B+</option>
				<option value="B-" <?php if ($row['blood_group'] == "B-"){echo "selected";} ?> >B-</option>
				<option value="AB+" <?php if ($row['blood_group'] == "AB+"){echo "selected";} ?> >AB+</option>
				<option value="AB-" <?php if ($row['blood_group'] == "AB-"){echo "selected";} ?> >AB-</option>
			  </select>
            </div>
        
            <div class="field-wrap">
			
              <input type="text" name="last_donated" value="<?php echo $row['last_donated'] ?>" autocomplete="off" id="datepicker" placeholder="Last Donated"/>
            </div>
          </div>
		  
		  <div class="field-wrap">
            <input type="text" placeholder="Contact Number" value="<?php echo $row['mobile_no'] ?>" autocomplete="off" name="mob" maxlength="10" pattern="[0-9]{10}"/>
          </div>
		  
		  <div class="field-wrap">
            <input type="password" placeholder="Change Password" name="pass" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <input type="password" placeholder="Confirm Password" name="cpass" autocomplete="off"/>
          </div>
          
		  <div id="progressbox" style="display: none;"><div id="progressbar"></div><div id="statustxt">0%</div></div>		  
          <button id="reg_submit" type="button" onclick="updateProfile()" class="button button-block"/>Update Profile</button>
          
          </form>

        </div>
      
</div> <!-- /form -->   
</div>
<?php get_footer(); ?>    
    
  </body>
</html>
<?php }
else{ header("location: index.php");
}
?>