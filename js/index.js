$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' , maxDate: 0 });
  });
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
$("#login_form").submit(function(e){
    return false;
});
$("#req_form").submit(function(e){
    return false;
});
$("#update_form").submit(function(e){
    return false;
});
$("#forgot_submit").submit(function(e){
    return false;
});
function user_registration() 
{
	$("#msg").html('');
	$( "#msg" ).css({"display":"block","color":"#d62d20"});
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var full_name = document.getElementsByName("full_name")[0].value;
	var age = document.getElementsByName("age")[0].value;
	var last_donated = document.getElementsByName("last_donated")[0].value;
	var email = document.getElementsByName("email")[0].value;
	var mob = document.getElementsByName("mob")[0].value;
	var pass = document.getElementsByName("pass")[0].value;
	var cpass = document.getElementsByName("cpass")[0].value;
	var pic = document.getElementsByName("pic")[0].value;
	if(full_name == "")
	{
		$("#msg").html("Enter Full Name");
		document.getElementsByName("full_name")[0].focus();
	}
	else if(isNaN(age) || age < 18 || age > 100) 
	{
		$("#msg").html("Enter Correct Age");
		document.getElementsByName("age")[0].focus();
	}
	else if(last_donated == "")
	{
		$("#msg").html("Enter Last Donated");
		document.getElementsByName("last_donated")[0].focus();
	}
	else if(reg.test(email) == false)
	{
		$("#msg").html("Enter Correct email address");
		document.getElementsByName("email")[0].focus();
	}
	else if(mob.length != 10)
	{
		$("#msg").html("Enter Correct Mobile no.");
		document.getElementsByName("mob")[0].focus();
	}
	else if(pass.length < 7)
	{
		$("#msg").html("Password Must be of 8 Character or longer");
		document.getElementsByName("pass")[0].focus();
	}
	else if(pass != cpass)
	{
		$("#msg").html("Password Doesn't Match");
		document.getElementsByName("cpass")[0].focus();
	}
	else if(pic == "")
	{
		$("#msg").html("Choose Profile Pic");
		document.getElementsByName("pic")[0].focus();
	}
	else
	{
	$('#progress').show();
	var formData = new FormData($('#reg_form')[0]);
	formData.append('action', 'user_registration');
	
	$.ajax({
			type: "POST",
			url: "save.php",
			data: formData,
			xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress',progress, false);
                }
                return myXhr;
				},
			cache: false,
			contentType:false,
			processData:false,			
			success: function(response)
			{	
				
				$("body").scrollTop(0);
				$("#msg").append(response);
				if(response === "Registered Successfully Login now")
					{
					$( "#msg" ).css('color','#008744');
					$("#reg_form")[0].reset();
					}
				$( "#msg" ).fadeOut(5000);
				
			}
			});
	}
}


function progress(e){

    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;

        var Percentage = (current * 100)/max; 
		$('#progress').width(Percentage + '%'); //update width

        if(Percentage >= 100)
        {
           // process completed  
		   $('#progress').hide();
        }
    }  
 }

function user_login() 
{
	$("#msg_login").html('');
	$( "#msg_login" ).css({"display":"block","color":"#d62d20"});
	var formData = new FormData($('#login_form')[0]);
	formData.append('action', 'user_login');
	$.ajax({
			type: "POST",
			url: "save.php",
			data: formData,
			cache: false,
			contentType:false,
			processData:false,
			success: function(response)
			{		
				if(response === "Logged in")
					{
						window.location.replace("main.php");
					}	
				else
					{
					$("#msg_login").append(response);
					$( "#msg_login" ).fadeOut(5000);
					}
			}
			});
}

function callDonor(url,name,mob)
{
document.getElementById("modalImg").src = "uploads/"+url;
document.getElementById("modalName").textContent = name;
document.getElementById("modalMob").textContent = mob;
}

function msgDonor(url,name,email)
{
document.getElementById("modalImg2").src = "uploads/"+url;
document.getElementById("modalName2").textContent = name;
document.getElementById("modalMail").textContent = email;
}

function requestDonor()
{
$("#msg").html('');
$( "#msg" ).css({"display":"block","color":"#d62d20"});
var pt_name = document.getElementsByName("pt_name")[0].value;
var age = document.getElementsByName("age")[0].value;
var hospital = document.getElementsByName("hospital")[0].value;
var problem = document.getElementsByName("case")[0].value;
var address = document.getElementsByName("address")[0].value;
var aname = document.getElementsByName("aname")[0].value;
var amob = document.getElementsByName("amob")[0].value;
if(pt_name == "")
	{
		$("#msg").html("Enter Full Name");
		document.getElementsByName("pt_name")[0].focus();
	}
	else if(isNaN(age) || age < 18 || age > 100) 
	{
		$("#msg").html("Enter Correct Age");
		document.getElementsByName("age")[0].focus();
	}
	else if(hospital == "")
	{
		$("#msg").html("Enter Hospital's Name");
		document.getElementsByName("hospital")[0].focus();
	}
	else if(problem == "")
	{
		$("#msg").html("Enter Case");
		document.getElementsByName("case")[0].focus();
	}
	else if(address == "")
	{
		$("#msg").html("Enter Address");
		document.getElementsByName("address")[0].focus();
	}
	else if(aname == "")
	{
		$("#msg").html("Enter Attender's Name");
		document.getElementsByName("aname")[0].focus();
	}
	else if(amob == "")
	{
		$("#msg").html("Enter Attender's Mobile no.");
		document.getElementsByName("amob")[0].focus();
	}
	else
	{
	var formData = new FormData($('#req_form')[0]);
	formData.append('action', 'requestDonor');
	$.ajax({
			type: "POST",
			url: "save.php",
			data: formData,
			cache: false,
			contentType:false,
			processData:false,
			success: function(response)
			{	
				$("#msg").append(response);
				$("#msg").fadeOut(5000);
				
			}
			});
	}
}

function notificationAction(action,id)
{
	
	var queryString;
	if(action === 'view')
		{
		queryString = 'action='+action+'&id='+ id;
		}
	else if(action === 'delete')
		{
		queryString = 'action='+action+'&id='+ id;
		}
	$.ajax({
				type: "POST",
				url: "save.php",
				data: queryString,
				success: function(response)
				{	
					if(response === "deleted")
					{
						$('#notification_'+id).fadeOut();
					}
					else if(action === "view")
					{
						var tempArray = JSON.parse(response);
						var myTable = document.getElementById('req_table');
						myTable.rows[0].cells[1].innerHTML = tempArray[0].nop;
						myTable.rows[1].cells[1].innerHTML = tempArray[0].age;
						myTable.rows[2].cells[1].innerHTML = tempArray[0].gender;
						myTable.rows[3].cells[1].innerHTML = tempArray[0].hospital;
						myTable.rows[4].cells[1].innerHTML = tempArray[0].pt_case;
						myTable.rows[5].cells[1].innerHTML = tempArray[0].pt_add;
						myTable.rows[6].cells[1].innerHTML = tempArray[0].aname;
						myTable.rows[7].cells[1].innerHTML = tempArray[0].amob;
						document.getElementById('accept_req').onclick = function() { acceptRequest(tempArray[0].request_no); };
						var temp = tempArray[0].accepted;
						if(temp === 'true')
						{
						$('#accept_req').text('ACCEPTED');
						}
						else{
						$('#accept_req').text('ACCEPT');
						}
					}
					else
					{
					alert("Error Code : 2281");
					}
				}
				});
}

function patientDetails(req)
{
	var queryString;
	queryString = 'action=pt_details'+'&req='+ req;
	$.ajax({
				type: "POST",
				url: "save.php",
				data: queryString,
				success: function(response)
				{	
						var tempArray = JSON.parse(response);
						var myTable = document.getElementById('req_table');
						myTable.rows[0].cells[1].innerHTML = tempArray[0].nop;
						myTable.rows[1].cells[1].innerHTML = tempArray[0].age;
						myTable.rows[2].cells[1].innerHTML = tempArray[0].gender;
						myTable.rows[3].cells[1].innerHTML = tempArray[0].hospital;
						myTable.rows[4].cells[1].innerHTML = tempArray[0].pt_case;
						myTable.rows[5].cells[1].innerHTML = tempArray[0].pt_add;
						myTable.rows[6].cells[1].innerHTML = tempArray[0].aname;
						myTable.rows[7].cells[1].innerHTML = tempArray[0].amob;
						
				}
				});
}

function updateProfile()
{
	$("#msg").html('');
	$( "#msg" ).css({"display":"block","color":"#d62d20"});
	var full_name = document.getElementsByName("full_name")[0].value;
	var age = document.getElementsByName("age")[0].value;
	var last_donated = document.getElementsByName("last_donated")[0].value;
	var mob = document.getElementsByName("mob")[0].value;
	var pass = document.getElementsByName("pass")[0].value;
	var cpass = document.getElementsByName("cpass")[0].value;
	if(pass.length != 0)
	{
		if(pass.length < 7)
			{
				$("#msg").html("Password Must be of 8 Character or longer");
				document.getElementsByName("pass")[0].focus();
				return;
			}
		else if(pass != cpass)
		{
			$("#msg").html("Password Doesn't Match");
			document.getElementsByName("cpass")[0].focus();
			return;
		}
		
	}
	if(full_name == "")
	{
		$("#msg").html("Enter Full Name");
		document.getElementsByName("full_name")[0].focus();
	}
	else if(isNaN(age) || age < 18 || age > 100) 
	{
		$("#msg").html("Enter Correct Age");
		document.getElementsByName("age")[0].focus();
	}
	else if(last_donated == "")
	{
		$("#msg").html("Enter Last Donated");
		document.getElementsByName("last_donated")[0].focus();
	}
	else if(mob.length != 10)
	{
		$("#msg").html("Enter Correct Mobile no.");
		document.getElementsByName("mob")[0].focus();
	}
	
	else
	{
	$('#progress').show();
	var formData = new FormData($('#update_form')[0]);
	formData.append('action', 'updateProfile');
	$.ajax({
			type: "POST",
			url: "save.php",
			data: formData,
			xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress',progress, false);
                }
                return myXhr;
				},
			cache: false,
			contentType:false,
			processData:false,
			success: function(response)
			{	
				$("body").scrollTop(0);
				$("#msg").append(response);
				if(response === "Profile Updated Successfully")
					{
					$( "#msg" ).css('color','#008744');
					}
				$( "#msg" ).fadeOut(5000);
				
			}
			});
	}
}

function forgotPassword()
{
	$("#msg").html('');
	$( "#msg" ).css({"display":"block","color":"#d62d20"});
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var email = document.getElementsByName("email")[0].value;
	if(reg.test(email) == false)
	{
		$("#msg").html("Enter Correct email address");
		document.getElementsByName("email")[0].focus();
	}
	else
	{	
		$('#forgot_submit').text('Sending...');
	    queryString = 'action=forgotPassword&email='+ email;
		$.ajax({
				type: "POST",
				url: "save.php",
				data: queryString,
				xhr: function () {
					var xhr = new XMLHttpRequest();
					//Download progress
					xhr.addEventListener("progress",progress, false);
					return xhr;
				},
				success: function(response)
				{	
					$("#msg").html(response);
					if(response === "Password has been sent")
					{
					$( "#msg" ).css('color','#008744');
					}
					$( "#msg" ).fadeOut(5000);
					$('#forgot_submit').text('Send Password');
				}
				});
	}
}

function acceptRequest(req)
{
	var buttontext = document.getElementById("accept_req").innerHTML;
	if(buttontext == "ACCEPTED")
	{
		return;
	}
	queryString = 'action=accept_req'+'&req='+ req;
	$.ajax({
				type: "POST",
				url: "save.php",
				data: queryString,
				success: function(response)
				{	
				    if(response === "accepted")
					{
						$('#accept_req').text('ACCEPTED');
					}
					else
					{
						alert("Something went wrong");
					}
						
				}
				});
	
}