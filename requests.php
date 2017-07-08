<?php
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
	height: 150px;
	border-radius: 50%;
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
#modalImg{
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
	position: absolute;
    margin-top: 20px;
	left:200px;
}
.modalDialog .modal2{
text-align:center;
width:300px;
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
.circular h2{
	letter-spacing: 1;
    color: white;
    position: absolute;
    line-height: 100px;
    left: 70px;
    font-family: 'Paytone One', sans-serif;
    text-shadow: 0 0 2px black;
    font-size: 30px;
}
.btn{
	height:30px;
	width:80px;
	background-color:green;	
	}
	
.func-item li{
margin:15px;
}
.func-item
{
float:right;
padding-top:20px;
list-style:none;
}
.func-item li a i:hover
{
color:#e67e22;
}
.func-item .fa
{
font-size:25px;
color:#000000;
}
</style>
<div class="wrapper">
<?php get_header(); ?>
<?php 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10; 
$result = mysql_query("SELECT * FROM notification GROUP BY request_no ASC LIMIT $start_from, 10");
if (mysql_num_rows($result) > 0) {?>
    <h1>Blood Requests</h1>
	<?php
    while($row = mysql_fetch_assoc($result)) { ?>
<div class="circular">
	<img src="images/heart.png ?>" alt="">
	<h2><?php echo $row['blood_group'] ?></h2>
	<p><span><?php echo ucfirst($row['nop']) ?></span><br>Age - <?php echo $row['age']?> years<br>Case - <?php echo $row['pt_case']?><br>Hospital - <?php echo $row['hospital']?></p>
	<ul class="func-item">
	<li><a href="#openModal2" title="View Details"><i class="fa fa-eye" onclick="patientDetails('<?php echo $row['request_no']?>')" ></i></a></li>
	<?php if($row['accepted'] == 'true') { ?>
	<li><i class="fa fa-check" title="Accepted" ></i></li>
	<?php } else { ?> <li><i class="fa fa-question" title="Pending" ></i></li> <?php } ?>
	</ul>
</div>
<?php }  }
else
{ ?>
<h1>No Donor Found</h1>
<?php
}
$sql = "SELECT COUNT(*) FROM notification GROUP BY request_no"; 
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
            echo "<a href='requests.php?page=".$prev."'><<  Prev</a> "; 
}
if($next<=$total_pages){
            echo "<a href='requests.php?page=".$next."'>Next  >></a> "; 
}
 ?>
 </div>
 </div>
<?php get_footer(); ?>
<!-- Modal start-->

<div id="openModal2" class="modalDialog">
    <div class="modal2">	<a href="#close" title="Close" class="close">X</a>
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
        
    </div>
</div>