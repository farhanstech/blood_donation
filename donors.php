<?php
session_start();
if(isset($_SESSION['user_id']))
{
require_once "header.php";
require_once "footer.php";
?>
<head>
    <meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
	<script src="js/index.js"></script>
	<title>Humanity Organization - Blood Donation Wing</title>
</head>
<style>
#openmodal div {height:152px;}
#openmodal2 div {height:152px;}
body{    margin: 0;}
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
.circular img {
width: 150px;
	height: 150px;
	border-radius: 50%;
    margin: 0 15px;
	float:left;
	}
.circular{
    position: relative;
    height: 150px;
    background: rgba(34,34,34,0.4);
    margin: 0px auto;
    width: 80%;
	margin-top:20px;
}
.btn2{
    height: 75px;
    width: 50px;
    bottom: 0;
    background: #e67e22 url(images/msg.png) no-repeat center;
    background-size: contain;
    right: 0;
    position: absolute;
}
.btn1{
height: 75px;
    width: 50px;
	background: #e67e22 url(images/call.png) no-repeat center;
    background-size: contain;
	right: 0;
	top:0;
	position: absolute;
}
.btn1:hover{
   transition: background 0.5s ease;
	background: #333 url(images/call.png) no-repeat center;
    background-size: contain;
}
.btn2:hover{transition: background 0.5s ease;
	background: #333 url(images/msg.png) no-repeat center;
    background-size: contain;}
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
.close {
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
.close:hover {
    background: #e67e22;
}
#modalImg, #modalImg2{
width: 150px;
	height: 150px;
	border-radius: 50%;
	margin-right: 10px;
	float:left;
	box-shadow: 1px 1px 5px #000;
	}
div div h2{
margin-bottom:0;
letter-spacing: 1;
color: white;
text-shadow: 0 0 5px black;
}
div div p{
	margin-top:0;
    color: white;
	display:block;
}
.modalDialog .modal2{
text-align:center;
width:265px;
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
.modal2 form {
    color: #ffffff;
}
#req_submit{
    width: 100%;
    height: 33px;
    background-color: #e67e22;
    color: #fff;
    font-size: 20px;
    margin-top: 3px;
    cursor: pointer;
	outline:none;
    border: 0px solid #000;
}
#req_submit:hover{
    background-color: #ce6100;
}
body{
    background-image: url(images/c.jpg);
    background-attachment: fixed;
    background-position: center center;
    background-size: cover;
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
#paging-count{
	text-align:center;
	margin-top:10px;
}
#paging-count a{
	text-decoration: none;
    margin-right: 5px;
    font-family: arial;
    font-weight: bold;
}
</style>
<div class="wrapper">
<?php get_header(); ?>
<?php 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 
$query = $_GET["query_field"];
$result = mysql_query("SELECT * FROM userinfo WHERE str_to_date(`last_donated`, '%d/%m/%Y') <= DATE(NOW() - INTERVAL 3 MONTH) and name like '%$query%' or str_to_date(`last_donated`, '%d/%m/%Y') <= DATE(NOW() - INTERVAL 3 MONTH) and blood_group like '%$query%' ORDER BY name ASC LIMIT $start_from, 10");
if (mysql_num_rows($result) > 0) {?>
    <h1>You Searched for "<?php echo $query; ?>"</h1>
	<?php
    while($row = mysql_fetch_assoc($result)) {
		if($row['gender'] == 'female')
		{
			$mobile="XXXXXXXXXX";
		}
		else{
			$mobile = $row['mobile_no'];
		}
		?>
<div class="circular">
	<img src="uploads/<?php echo $row['profile_pic'] ?>" alt="">
	<p><span><?php echo ucfirst($row['name']) ?></span><br>Blood Group - <?php echo $row['blood_group']?><br>Age - <?php echo $row['age']?> years<br>Last Donated - <?php echo $row['last_donated']?></p>
	<a href="#openModal"><div class="btn1" onclick="callDonor('<?php echo $row['profile_pic'] ?>','<?php echo ucfirst($row['name']) ?>','<?php echo $mobile ?>')"></div></a>
	<a href="#openModal2"><div class="btn2" onclick="msgDonor('<?php echo $row['profile_pic'] ?>','<?php echo ucfirst($row['name']) ?>','<?php echo $row['email'] ?>')"></div></a>
</div>
<?php }  }
else
{ ?>
<h1>No Donor Found</h1>
<?php
}
$sql = "SELECT COUNT(*) FROM userinfo WHERE str_to_date(`last_donated`, '%d/%m/%Y') <= DATE(NOW() - INTERVAL 3 MONTH) and name like '%$query%' or str_to_date(`last_donated`, '%d/%m/%Y') <= DATE(NOW() - INTERVAL 3 MONTH) and blood_group like '%$query%'"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 10); 
?>
<div id="paging-count">
<?php  
$prev = $page -1;
$next = $page + 1; 
if($prev>=1){
            echo "<a href='donors.php?query_field=".$query."&page=".$prev."'><<  Prev</a> "; 
}
if($next<=$total_pages){
            echo "<a href='donors.php?query_field=".$query."&page=".$next."'>Next  >></a> "; 
}
 ?>
 </div>
 </div>
<?php get_footer(); ?>
<!-- Modal start-->


<div id="openModal" class="modalDialog">
    <div>	<a href="#close" title="Close" class="close">X</a>
			<img id="modalImg" src="#" alt="">
        	<h2 id="modalName">Farhan Ansari</h2>
			<p>Contact Number : <span1 id="modalMob">8871712281</span1></p>
        
    </div>
</div>

<div id="openModal2" class="modalDialog">
    <div>	<a href="#close" title="Close" class="close">X</a>
			<img id="modalImg2" src="#" alt="">
        	<h2 id="modalName2">Farhan Ansari</h2>
			<p>Email : <span1 id="modalMail">farhanstech@gmail.com</span1></p>
        
    </div>
</div>

<?php }
else{ header("location: index.php");
}
?>