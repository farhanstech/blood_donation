<?php
require_once "save.php";
function get_header(){
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<style>
#top-bar{
width:100%;
height:40px;
background-color:#e67e22;
}
.sticky-header{
  position: fixed;
  width: 100%;
  height: 76px;
  background-color: #ffffff;
  transition: all 0.4s ease;
  z-index:1;
}
.sticky-header.sticky {
top:0px;
  height: 60px;
}
.sticky-header a, #top-bar a{
    text-decoration: none;
	font-family: arial;
    font-size: 15px;
	color:white;
}
.logo, .sticky-logo{
    display: inline;
    padding: 15px;
    float: left;
    margin-left: 80px;
}
.menu-item li, #top-bar li{
display:inline-block;
margin-right:15px;
}
.menu-item
{
float:right;
padding-top:15px;
}
.menu-item li a i:hover
{
color:#e67e22;
}
.contact{
    padding-top: 10px;
	color:white;
	margin: 0;
}
.fa{
margin-right:10px;
}
#noti-count{
    display: block;
    margin-top: -30px;
    margin-left: 13px;
    background-color: #e67e22;
    text-align: center;
    border-radius: 50%;
    padding: 0 4px;
    font-weight: bold;
    position: absolute;
	border: 1px solid #fff;
}
.menu-item .fa
{
font-size:25px;
color:#000000;
}
</style>


<div id="top-bar">
		<ul class="contact">
			<i class="fa fa-mobile"></i><li class="header-phone">+91 8871712281</li>
			<i class="fa fa-envelope"></i><li class="header-email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
		</ul>
</div>
<div class="sticky-header">
	<a href="#" class="navbar-brand" title="Humanity Organization - Just another WordPress site">
		<img class="logo" src="images/logo.png" alt="Humanity Organization" width="170" height="45">
		<img class="sticky-logo" style="display:none;" src="images/sticky-logo.png" alt="Humanity Organization" width="115" height="30">
	</a>
	
	<?php if(isset($_SESSION['user_id'])) { ?>
	<ul class="menu-item">
		<li ><a href="notification.php" title="Notifications"><i class="fa fa-bell"></i><span id="noti-count"><?php echo notificationCount(); ?></span></a></li>
		<li><a href="main.php" title="Home"><i class="fa fa-home"></i></a></li>
		<li><a href="request.php" title="Request for Blood"><i class="fa fa-ambulance"></i></a></li>
		<li><a href="requests.php" title="All Requests"><i class="fa fa-heartbeat"></i></a></li>
		<li><a href="profile.php" title="My Profile"><i class="fa fa-user"></i></a></li>
		<li><a href="logout.php" title="Sign Out"><i class="fa fa-sign-out"></i></a></li>
	</ul>
	<?php } ?>
</div>
<?php } ?>