<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mobile Food Ordering App</title>
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){


	$("#home").on('click', function(){
		alert("Welcome");
	});
	
	$("#loginBtn").on('click' , function(){
		$(".loginDiv").slideDown(400);
		});
		
		$(".loginBtn2").on('click' , function(){
		$(".loginDiv").slideDown(400);
		});
		$(".loginBtn3").on('click' , function(){
		$(".loginDiv2").slideDown(400);
		});
		// function to save user data
		$(".btn2").on('click' , function(){
			$("#status").html("Proccessing...");
			//var form = $("#form2").serialize();
			var fname = $("#fname").val();
			
			var mypa = $("#mypa").val();
			var reg = $("#reg").val();
			var email = $("#email").val();
$.post("code/registration.php" , { fname : fname,  mypa : mypa , reg : reg, email : email } , function(r){
				if(r==1)
				{
					$("#status").html("Form submitted successfully");
					$("#fname ,  #reg,#mypa, #email ").val('');
				}
				else
				{
					$("#status").html("Registration failed");
				}
			});
	});

// function to delete user data
$(".btn3").on('click' , function(){
			$("#status").html("Proccessing...");
			//var form = $("#form2").serialize();
			
			var reg = $("#reg").val();
			
$.post("code/del.php" , {  reg : reg } , function(r){
				if(r==1)
				{
					$("#status").html("Delete Record successfully");
					$("#fname ,  #reg, #mypa, #email ").val('');
				}
				else
				{
					$("#status").html("Delete Record failed");
				}
			});
	});

		// function to update user data
		$(".btn4").on('click' , function(){
			$("#status").html("Proccessing...");
			//var form = $("#form2").serialize();
			var fname = $("#fname").val();
		
			var mypa = $("#mypa").val();
			var reg = $("#reg").val();
			var email = $("#email").val();
$.post("code/regupdate.php" , { fname : fname,  mypa : mypa , reg : reg, email : email } , function(r){
				if(r==1)
				{
					$("#status").html("Update successfully");
					$("#fname ,  #reg,#mypa, #email ").val('');
				}
				else
				{
					$("#status").html("Update failed");
				}
			});
	});
	
	// search user record	
	$("#reg").on('blur' , function(){
		var reg = $("#reg").val();
		$("#status").html("Please wait. Loading ... ");
		$.post("code/search.php" , { reg : reg } , function(r){
			if(r==0)
			{
				$("#fname ,  #mypa, #email ").val('');
			
				$("#status").html("Record not found ");
			}
			else
			{
				$("#status").html("Record found ");
				var arr = JSON.parse(r);
				$("#fname").val(arr['fname']);
				$("#email").val(arr['email']);
			}
		});
	});
	
		
	});
	
	
function closeDiv()
{
	$(".loginDiv").slideUp(400);
	$("#username , #password").val('');
}
function closeDiv2()
{
	$(".loginDiv2").slideUp(400);
	$("#username2 , #password2").val('');
}

// resturant login
function login()
{

	var username = $("#username").val();
	var password = $("#password").val();
	
	$.post('code/login.php' , {user : username , pass : password} , function(returnValue){
	
		if(returnValue==1)
		{
			document.location ="dashboard.php";
			
		}
		else
		{
			alert("Login failed. Try again");
		}
	});
}

// user login
function login2()
{

	var username2 = $("#username2").val();
	var password2 = $("#password2").val();
	
	$.post('code/login2.php' , {user : username2 , pass : password2} , function(returnValue){
	
		if(returnValue==1)
		{
			document.location ="dashboarduser.php";
			
		}
		else
		{
			alert("Login failed. Try again");
		}
	});
}



</script>

<style type="text/css">

body{margin:0}
.top{
		width:100%; height:auto; padding: 10px 0 ; background:#1f1f1f; 
		color:#FFF; float:left
	}

.banner{width:90%; height:250px; float:left; background:#0099FF; margin:2% 5%}

.box{width:40%; height:200px; background:#0099FF; float:left; margin:1% 5%}
.box2{width:25%; height:90px;  float:left; margin:1% 3%}

.footer{width:100%; height:100px; padding:10px 0; background:#1f1f1f; 
		color:#FFF; float:left}

.btn2{width:100px; height:auto; background:#0099FF; color:#fff; text-align:center; cursor:pointer; margin:5px; float:left;}
.btn3{width:100px; height:auto; background:#0000FF; color:#fff; text-align:center; cursor:pointer ; margin:5px; float:left; }
.btn4{width:200px; height:auto; background:#00FF00; color:#fff; text-align:center; cursor:pointer ; margin:5px; float:left;}

.logo{
margin:auto  2rem;
color:#fff;
font-size: 20px;
cursor: pointer;
font-weight:500;
}

.content{
width:auto;
position:absolute;
top:30%;
left:50%;
transform:translate(-50%,-50%);
text-align:center;
float:left;

}

.content h1{
color:#fff;
font-size:60px;
font-weight:800;
float:left;

}

.content p{
margin:0.5rem;
color:rgba(255,255,255,0.8);
float:left;
}

button{
width:200px;
margin:1.2rem 1.5rem;
padding:0.8rem 1rem;
border:2px solid #fff;
border-radius:25px;
background-color:transparent;
text-transform: uppercase;
color:#fff;
font-weight:bold;
box-shadow:inset 0 0 0 #009688;
transition:0.6s ease-out;
cursor:pointer;
}

button:hover{
box-shadow: inset 200px 0 0 #009688;
}

.medic{
background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url(images/photo.jpg);
background-position:center;
background-size:cover;
width:100%;
height:100%; float:left;
}


@media only screen and (max-width:600px)
{
	.box{width:90%; height:200px; background:#FF0099; float:left; margin:1% 5%}

.content{
width:auto;
position:absolute;
top:30%;
left:50%;
transform:translate(-50%,-50%);
text-align:center;
float:left;

}
.content h1{
color:#fff;
font-size:30px;
font-weight:800;
float:left;

}
button{
width:80px;
margin:1.2rem 1.5rem;
padding:0.8rem 1rem;
border:2px solid #fff;
border-radius:25px;
background-color:transparent;
text-transform: uppercase;
color:#fff;
font-weight:bold;
box-shadow:inset 0 0 0 #009688;
transition:0.6s ease-out;
cursor:pointer;
}

button:hover{
box-shadow: inset 100px 0 0 #009688;
}
}

@media only print{
 .box{display:none}
}
</style>
</head>

<body>

<div>

	<div class="top" align="center">
<div style="float:left ; margin-left:20px" id="home"> Home </div>
		<div style="float:right; margin-right:20px" id="loginBtn"> Admin </div>
		<div> <marquee> Mobile Food Ordering App for Staff and Students of UWE Bristol</marquee> </div>
	</div>
	
	<div class="banner">
	<div style="float:right; font-size:40; color: #FFFFFF; border: thick">   </div>
	
	</div>
	<div class="content">
<h1> Mobile Food App</h1>
<p> For Staff and Students of UWE Bristol. User - Centered Design Approach</p>

<button class="loginBtn2">Restaurant</button>
<button class="loginBtn3">Users</button>
</div>
</div>
		<div class="box">
		   <form id="form2" name="form2" method="post" action="">
		   <table width="90%" border="0" cellspacing="0" cellpadding="0" style=" background:#FFF; margin:2% 5%">
		   <tr>
                <td height="20" colspan="2" align="center" >User's Sign Up</td>
              </tr>
              <tr>
                <td width="40%" height="30">Phone Number </td>
                <td width="60%" height="30"><input name="reg" type="text" id="reg" required="required" /></td>
              </tr>
			  
			  <tr>
                <td  height="20">User Name</td>
                <td  height="20">
                  <input name="fname" type="text" id="fname" />
                </td>
              </tr>
              
              <tr>
                <td height="20">Password</td>
                <td height="20">
                  <input name="mypa" type="password" id="mypa" />
               </td>
              </tr>
              <tr>
                <td height="20">Email</td>
                <td height="20">
                  <input type="email" name="email" id="email"  required />
                </td>
              </tr>
               <tr>
                <td height="20" colspan="2" align="center" id="status">&nbsp;</td>
              </tr>


              <tr>
                <td height="30" colspan="2" align="center">
					<div class="btn2"> Submit </div>  <div class="btn4"> Change Password</div></td>
              </tr>

			  
</table>
		   </form>
</div>

		<div class="box">
	
		<img src="images/photo.gif" width="100%" height="100%">
		</div>
		
		
	<div class="footer">
	<div class="box2"> <img src="images/ios.jpg" width="100%" height="100%"></div>
	<div class="box2"> <img src="images/android.jpg" width="100%" height="100%"></div>
	<div class="box2"> <img src="images/windows.jpg" width="100%" height="100%"></div>
	</div>
		
</div>
</body>
</html>
<?php
	 include('login.php');
	 include('login2.php');
?>

