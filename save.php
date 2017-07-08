<?php
include "database_connection.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$path = "uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST["action"]) && !empty($_POST["action"]))
	{	
		if($_POST["action"] == "user_registration")
			{
				define ("MAX_SIZE","1024");
				$path = "uploads/";
				 function getExtension($str) {
						 $i = strrpos($str,".");
						 if (!$i) { return ""; }
						 $l = strlen($str) - $i;
						 $ext = substr($str,$i+1,$l);
						 return $ext;
				 }
					$image =$_FILES["photoimg"]["name"];
					$uploadedfile = $_FILES['photoimg']['tmp_name'];
					 
				 
					if ($image) 
					{
					
						$filename = stripslashes($_FILES['photoimg']['name']);
					
						$extension = getExtension($filename);
						$extension = strtolower($extension);
						
						
				 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
						{
							echo "Please Choose Correct File"; return;
						}
						else
						{

				 $size=filesize($_FILES['photoimg']['tmp_name']);


				if ($size > MAX_SIZE*1024)
				{
					echo "Max Upload size is 1MB"; return;
				}


				if($extension=="jpg" || $extension=="jpeg" )
				{
				$uploadedfile = $_FILES['photoimg']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);

				}
				else if($extension=="png")
				{
				$uploadedfile = $_FILES['photoimg']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);

				}
				else 
				{
				$src = imagecreatefromgif($uploadedfile);
				}

				list($width,$height)=getimagesize($uploadedfile);


				$newwidth=150;
				$newheight=150;
				$tmp=imagecreatetruecolor($newwidth,$newheight);


				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

				$actual_image_name = time().".".$extension;

				imagejpeg($tmp,$path.$actual_image_name,100);

				imagedestroy($src);
				imagedestroy($tmp);
				}}
				
				//db save start
				$name=$_POST['full_name'];
				$age=$_POST['age'];
				$gender=$_POST['gender'];
				$blood_group=$_POST['blood_group'];
				$last_donated=$_POST['last_donated'];
				$email=$_POST['email'];
				$mobile_no=$_POST['mob'];
				$pass=$_POST['pass'];
				
				$duplicate = mysql_query("SELECT * FROM userinfo WHERE email='$email'");
				if(mysql_num_rows($duplicate) > 0)
				{
					echo "Email Address already exists";
					return;
				}
				else
				{
				$result = mysql_query("INSERT INTO userinfo(name, age, gender, email, mobile_no, profile_pic, blood_group, last_donated, password) VALUES ('$name',$age,'$gender','$email','$mobile_no','$actual_image_name','$blood_group','$last_donated','$pass')");
				if($result)
				echo "Registered Successfully Login now";
				else
				echo "Something went wrong try again later";
				}
			}
		elseif($_POST["action"] == "user_login")
			{
				$email=$_POST['usr_mail'];
				$pass=$_POST['usr_pass'];
				$login_status = mysql_query("SELECT * FROM userinfo WHERE email='$email' && password='$pass'");
				if(mysql_num_rows($login_status) > 0)
				{
					$_SESSION["user_id"] = $email;
					echo "Logged in";
				}
				else
				echo "Email Address Doesn't Exist";
			}
			
		elseif($_POST["action"] == "requestDonor")
			{
				date_default_timezone_set('Asia/Calcutta');
				$timestamp = date('h:i M d Y'); 
				$from_user = $_SESSION["user_id"];
				//$to_user = $_POST['to_user'];
				$pt_name=$_POST['pt_name'];
				$age=$_POST['age'];
				$gender=$_POST['gender'];
				$hospital=$_POST['hospital'];
				$case=$_POST['case'];
				$address=$_POST['address'];
				$aname=$_POST['aname'];
				$amob=$_POST['amob'];
				$blood_group = $_POST['blood_group'];
				$request_no = uniqid();
				$query = "SELECT email from userinfo where blood_group = '$blood_group' and email != '$from_user'";
				if( $query_run = mysql_query($query))
				{
					$donorsList = array();
					while($row = mysql_fetch_assoc($query_run))
					{
						array_push($donorsList, $row['email']);
					}
				}
				foreach($donorsList as $to_user)
				{
				$result = mysql_query("INSERT INTO notification(request_no, from_user, to_user, seen, timestamp, nop, blood_group, age, gender, hospital, pt_case, pt_add, aname, amob, accepted) VALUES ('$request_no','$from_user','$to_user','false','$timestamp','$pt_name','$blood_group',$age,'$gender', '$hospital','$case','$address','$aname','$amob','false')");
				}
				if($result)
				echo "Request Sent Successfully";
				else
				echo "Something went wrong try again later";
				
			}
			
		elseif($_POST["action"] == "view")
			{
				mysql_query("UPDATE notification set seen ='true' WHERE id=".$_POST["id"]);
				$tempArray = array();
				$result = mysql_query("SELECT * FROM notification WHERE id=".$_POST["id"]);
				while($row = mysql_fetch_assoc($result))
				{
					$tempArray[] = $row;
				}
				echo json_encode($tempArray);
				
			}
			
		elseif($_POST["action"] == "pt_details")
			{
				$req = $_POST["req"];
				$tempArray = array();
				$result = mysql_query("SELECT * FROM notification WHERE request_no = '$req' GROUP BY request_no");
				while($row = mysql_fetch_assoc($result))
				{
					$tempArray[] = $row;
				}
				echo json_encode($tempArray);
				
			}
			
		elseif($_POST["action"] == "delete")
			{
				$result = mysql_query("DELETE FROM notification WHERE id=".$_POST["id"]);
				if($result) echo "deleted";
				else echo "Something went Wrong";
			}
			
		elseif($_POST["action"] == "accept_req")
			{
				$req = $_POST["req"];
				$result = mysql_query("UPDATE notification set accepted='true' WHERE request_no='$req'");
				if($result) echo "accepted";
				else echo "Something went Wrong";
			}
			
		elseif($_POST["action"] == "forgotPassword")
			{
				$email = $_POST['email'];
				$result = mysql_query("SELECT * FROM userinfo WHERE email='$email'");
				if(mysql_num_rows($result) != 1)
				{
					echo "Email Address doesn't exist";
				}
				else{
					$query = mysql_query("SELECT password,name FROM userinfo WHERE email='$email'");
					$row = mysql_fetch_array($query);
					$password = $row['password'];
					$name = $row['name'];
					
					require 'PHPMailerAutoload.php';
 
					$mail = new PHPMailer;
					 
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'armankhan78623@gmail.com';                   // SMTP username
					$mail->Password = 'anam4321';               // SMTP password
					$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
					$mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
					$mail->setFrom('armankhan78623@gmail.com', 'Farhan Ansari');     //Set who the message is to be sent from
					$mail->addAddress($email);               // Name is optional
					$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
					$mail->isHTML(true);                                  // Set email format to HTML
					 
					$mail->Subject = 'Humanity Organization - Forgot Password';
					$mail->Body    = 'Hello,<br>'.ucfirst($name).'<br>Your Password is - <b>'.$password.'</b><br><a href="#">Login Now</a>';
					 
					if(!$mail->send()) {
					   echo 'Password could not be sent.';
					   echo 'Mailer Error: ' . $mail->ErrorInfo;
					   exit;
					}
					 
					echo 'Password has been sent';
				}
			}
			
		elseif($_POST["action"] == "updateProfile")
			{
				$query=null;
				$user_id = $_SESSION["user_id"];
				if(isset( $_FILES["photoimg"] ) && !empty( $_FILES["photoimg"]["name"] ))
				{
					define ("MAX_SIZE","1024");
					$path = "uploads/";
					 function getExtension($str) {
							 $i = strrpos($str,".");
							 if (!$i) { return ""; }
							 $l = strlen($str) - $i;
							 $ext = substr($str,$i+1,$l);
							 return $ext;
					 }
						$image =$_FILES["photoimg"]["name"];
						$uploadedfile = $_FILES['photoimg']['tmp_name'];
						 
					 
						if ($image) 
						{
						
							$filename = stripslashes($_FILES['photoimg']['name']);
						
							$extension = getExtension($filename);
							$extension = strtolower($extension);
							
							
					 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
							{
								echo "Please Choose Correct File"; return;
							}
							else
							{

					 $size=filesize($_FILES['photoimg']['tmp_name']);


					if ($size > MAX_SIZE*1024)
					{
						echo "Max Upload size is 1MB"; return;
					}


					if($extension=="jpg" || $extension=="jpeg" )
					{
					$uploadedfile = $_FILES['photoimg']['tmp_name'];
					$src = imagecreatefromjpeg($uploadedfile);

					}
					else if($extension=="png")
					{
					$uploadedfile = $_FILES['photoimg']['tmp_name'];
					$src = imagecreatefrompng($uploadedfile);

					}
					else 
					{
					$src = imagecreatefromgif($uploadedfile);
					}

					list($width,$height)=getimagesize($uploadedfile);


					$newwidth=150;
					$newheight=150;
					$tmp=imagecreatetruecolor($newwidth,$newheight);


					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

					$actual_image_name = time().".".$extension;

					imagejpeg($tmp,$path.$actual_image_name,100);

					imagedestroy($src);
					imagedestroy($tmp);
					}}
					$query = "UPDATE userinfo set profile_pic='$actual_image_name' where email='$user_id';";
				}
				
				$name=$_POST['full_name'];
				$age=$_POST['age'];
				$gender=$_POST['gender'];
				$blood_group=$_POST['blood_group'];
				$last_donated=$_POST['last_donated'];
				$mobile_no=$_POST['mob'];
				$pass=$_POST['pass'];
				
				
				if(!empty($pass))
				{
					$query .= "UPDATE userinfo set password='$pass' where email='$user_id';";
				}
				
				$link = mysqli_connect("localhost", "root", "", "humanity_reg");
				$query .= "UPDATE userinfo SET name='$name',age=$age,gender='$gender',blood_group='$blood_group',last_donated='$last_donated',mobile_no='$mobile_no' where email='$user_id'";
				$result = mysqli_multi_query($link,$query);
				if($result)
				echo "Profile Updated Successfully";
				else
				echo "Something went wrong try again later";
			}
			
	}

function notificationCount()
{
$to_user = $_SESSION["user_id"];
$result = mysql_query("SELECT * FROM notification WHERE to_user = '$to_user' and seen = 'false'");
$count = mysql_num_rows($result);
if ($count > 9)
{ $count = "9+"; }
return $count;
}
?>