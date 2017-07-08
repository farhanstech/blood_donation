<?php
session_start();
if(isset($_SESSION['user_id']))
{
require_once "header.php";
require_once "footer.php";
?>
<head>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
	<script src="js/index.js"></script>
	<title>Humanity Organization - Blood Donation Wing</title>
</head>
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
.notification-circle {
    background-color: #e67e22;
    border-radius: 50%;
    height: 15px;
    left: -9px;
    position: absolute;
    top: 15px;
    width: 15px;
}

.notification-row {
    margin: 8px 0 13px;
    position: relative;
}

.notification-row-cont {
    border-left: 4px solid #e67e22;
    padding: 4px 0 1px;
	 width: 800px;
    margin: 0px auto;
	margin-top: 5px;
}

.notification-row-cont .white-block {
    border-left: none;
}

strong {
    font-weight: bold;
	
}

.notification-time {
    color: #a4a4a4;
    font-size: 12px;
    margin-left: 5px;
}

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

span{
    border: 0 none;
    margin: 0;
    padding: 0;
    vertical-align: baseline;
}



.notification-row-text {
    padding: 10px 15px;
}

.highlight-blue-bg {
    background: rgba(34,34,34,0.75);
}

.inline-block {
    display: inline-block;
}

.btn-icon
{
float:right;

}

.orange{color:#e67e22;}


p{
display:inline-block;
margin-left: 20px;
font-family: 'Paytone One', sans-serif;
color: white;
}
p span{
letter-spacing: 1;
    font-size: 24;
    color: white;
    text-shadow: 0 0 2px black;
}


.modalDialog {
    position: fixed;
    font-family: 'Paytone One', sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
	background-image: url(images/c.jpg);
    background-size: cover;
}
.modalDialog:target {
    opacity:1;
    pointer-events: auto;
}
.modalDialog > div {
    width: 400px;
    position: relative;
    margin: 10% auto;
    padding: 5px 20px 13px 20px;
    background: rgba(34,34,34,0.75);
	box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.5);
}
.closeModal {
    background: #606061;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 1px 3px #000;
    -webkit-box-shadow: 1px 1px 3px #000;
    box-shadow: 1px 1px 3px #000;
}
.closeModal:hover {
    background: #e67e22;
	color: white;
    text-decoration: none; 
}

div div h2{
margin-bottom:0;
letter-spacing: 1;
color: white;
text-shadow: 0 0 5px black;
}
div div h3{
margin-bottom:0;
letter-spacing: 1;
color: white;
text-shadow: 0 0 5px black;
text-align:left;
}
div div p{
	margin-top:0;
    color: white;
	display:block;
}
.modalDialog .modal2{
text-align:center;
}
.modal2 form input[type="text"]{
    font-size: 20px;
	width:100%;
    padding: 5px 10px;
    background: none;
    border: 1px solid #a0b3b0;
    color: #ffffff;
	outline-color:#e67e22;
	margin-top:3px;
}

body{
    background-image: url(images/c.jpg);
    background-attachment: fixed;
    background-position: center center;
    background-size: cover;
	margin:0;
	padding:0;
	font-family:arial;
}
h1{
    padding-top: 50px;
    font-size: 50px;
    font-weight: 100;
	color: white;
    text-align: center;
    font-family: 'Paytone One', sans-serif;
    text-shadow: 0 0 2px black;
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
#footer{
	margin-top:100px;
}
a{text-decoration:none;}
#accept_req{
	border: 0;
    outline: none;
    border-radius: 0;
    padding: 15px 0;
    font-weight: 600;
    font-size: 16px;
    text-transform: uppercase;
    background: #E67E22;
    color: #ffffff;
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    -webkit-appearance: none;
    width: 70%;
    margin-top: 10px;
}
#accept_req:hover{
    background: #ce6100;
}
</style>

<div class="wrapper" >
<?php get_header(); ?>
<?php
$to_user = $_SESSION["user_id"];
$result = mysql_query("SELECT * FROM userinfo INNER JOIN notification ON userinfo.email = notification.from_user where notification.to_user = '$to_user'");
if (mysql_num_rows($result) > 0) { ?>
<h1>Notifications</h1>
<?php
    while($row = mysql_fetch_assoc($result)) { ?>
	
<div class="notification-row-cont" id="notification_<?php echo $row['id']?>">
	      <div class="notification-row">
	        <div class="notification-circle"></div>
	        <div class="white-block notification-row-text highlight-blue-bg" id="e24:31">
	          <strong style="color: #fff;"><?php echo ucfirst($row['name']) ?> Requested you to donate blood.</strong> 
			  <div class="notification-time inline-block">
			  <i class="fa fa-clock-o"></i>
			  <span class="time">at <?php echo $row['timestamp']?></span>
			  </div>
			  
			  <div class="btn-icon">
				<a href="#openModal2" onclick="notificationAction('view',<?php echo $row['id']?>);" title="View">
				<i class="fa fa-eye orange"></i>
				</a>
				<a href="javascript:void(0);" onclick="notificationAction('delete',<?php echo $row['id']?>);" title="Delete">
				<i class="fa fa-trash orange"></i>
				</a>
			  </div>
	        </div><!-- white-block ends -->
	      </div><!-- notification-row ends -->
</div>
<?php }  }
else
{ ?>
<h1>You have no Notifications</h1>
<?php
}
 ?>
 </div>
 <?php get_footer(); ?>
 <div id="openModal2" class="modalDialog">
    <div class="modal2">	<a href="#close" title="Close" class="closeModal">X</a>
        	<h2>Requirement Details</h2><hr>
			<table style="color: white; margin: 0px auto;" id="req_table">
			  <tr>
				<td>Name of Patient - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Age - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Gender - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Hospital - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Case - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Address - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Attender's Name - </td>
				<td></td>
			  </tr>
			  <tr>
				<td>Attender's Contact - </td>
				<td></td>
			  </tr>
			</table>
			<button id="accept_req" type="button"/>ACCEPT</button>
        
    </div>
</div>
<?php }
else{
	header("location: index.php");
} ?>