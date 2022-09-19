<?php
$ms = "";
include('conne.php');
session_start();
if(isset($_SESSION['na']))
{

 $na=$_SESSION['na'] ;
 $ph =$_SESSION['ph'] ;
 $ema =$_SESSION['ema'] ;


}
else
{
header('location: index.php');
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User's Dashboard</title>
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css" />
<script type="text/javascript">
$(document).ready(function(){

$(".has-sub").on('click' , function(){
		var title = this.title;
		$("." + title).slideToggle(300 , function(){
			var v = $('.sub_menu').is(":visible");
			if(v)
			{
		$("#" + title + " i ").removeClass("fa-plus").addClass("fa-minus");
			}
			else
			{
				$("#" + title + " i ").removeClass("fa-minus").addClass("fa-plus");
			}
			
		});
	});
	
		
		
		$("#regBtn2").on('click' , function(){
		$(".regDiv").slideDown(400);
		});
	
	$("#appBtn2").on('click' , function(){
		$(".appDiv").slideDown(400);
		});
	
		$("#appvBtn2").on('click' , function(){
		$(".appvDiv").slideDown(400);
		});
	});
	
	
function closeDivreg()
{
	$(".regDiv").slideUp(400);
	
}

function closeDivapp()
{
	$(".appDiv").slideUp(400);
	
}

function closeDivappv()
{
	$(".appvDiv").slideUp(400);
	
}
// patient registration
function patientreg()
{
 
  var surname = $("#surname").val();
  var firstname = $("#firstname").val();
  var lastname = $("#lastname").val();
  var age = $("#age").val();
  var dob =$("#dob").val();
  var sex = $("#sex").val();
  var mstatus = $("#mstatus").val();
  var religion = $("#religion").val();
  var st= $("#st").val();
  var lga= $("#lga").val();
  var nationality = $("#nationality").val();
  var haddress = $("#haddress").val();
  var phone = $("#phone").val();
  var Occupation = $("#Occupation").val();
  var email = $("#email").val();
  var oaddress = $("#oaddress").val();
  var Kin = $("#Kin").val();
  var Kinphone = $("#Kinphone").val();
  var Kinaddress = $("#Kinaddress").val();
  var relationship = $("#relationship").val();
  var patientid = $("#patientid").val();


	$.post('code/patientreg.php' , {surname : surname, firstname : firstname, lastname : lastname, age : age, dob : dob, sex : sex, mstatus : mstatus,  religion : religion, st : st, lga : lga, nationality : nationality, haddress : haddress, phone : phone, Occupation : Occupation, email : email, oaddress : oaddress,   patientid : patientid,   Kin : Kin, Kinaddress : Kinaddress , Kinphone : Kinphone, relationship : relationship} , function(returnValue2){
	
		if(returnValue2==1)
		{
		$("#surname, #firstname, #lastname, #age, #dob, #sex, #mstatus,  #religion, #st, #lga, #nationality, #haddress, #phone, #Occupation, #email, #oaddress,   #patientid,  #Kin, #Kinaddress , #Kinphone, #relationship").val('');
		
			alert("Registration Successful");
			
		}
		else if(returnValue2==2)
		{
			alert("Registration already exist. ");
		}
		else 
		{
			alert("Registration failed. ");
		}
	});
}


// patient book appointment
function patientapp()
{
 
  var surnamep = $("#surnamep").val();
  var firstnamep = $("#firstnamep").val();
  var lastnamep = $("#lastnamep").val();
  var dob =$("#dob").val();
  
  var doctor = $("#doctor").val();
  var purpose = $("#purpose").val();
  var patientidp = $("#patientidp").val();

  $.post('code/bookappointment.php' , {surnamep : surnamep, firstnamep : firstnamep, lastnamep : lastnamep, dob : dob, doctor : doctor, purpose : purpose,   patientidp : patientidp} , function(returnValue3){
	
		if(returnValue3==1)
		{
		$("#surnamep, #firstnamep, #lastnamep,  #dob, #doctor, #purpose,  #patientid").val('');
		
			alert("Appointment Booking Successful");
			
		}
		else 
		{
			alert("Appointment Booking failed. ");
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

.box{width:20%; height:400px; background:#0099FF; float:left; margin:1% 5%}
.box3{width:60%; height:400px; background:#0099FF; float:left; margin:1% 5%}

.box2{width:25%; height:90px;  float:left; margin:1% 3%}

.footer{width:100%; height:100px; padding:10px 0; background:#1f1f1f; 
		color:#FFF; float:left}

.btn2{width:100px; height:auto; background:#0099FF; color:#fff; text-align:center; cursor:pointer; margin:5px; float:left;}
.btn3{width:100px; height:auto; background:#0000FF; color:#fff; text-align:center; cursor:pointer ; margin:5px; float:left; }
.btn4{width:200px; height:auto; background:#00FF00; color:#fff; text-align:center; cursor:pointer ; margin:5px; float:left;}

.menu{width:100%; height:auto; background:#000000;  float:left;}
.sub_menu{width:100%; height:auto; padding:5px 0; text-align:center; background:#FFF; border-bottom:1px solid #CCCC; display:none  ; float:left;}
.sub_menu div{width:100%; border-bottom:1px solid #CCC; padding:10px 0 ; float:left;}
.top_menu{width:100%; height:auto; padding:5px 0; text-align:center; background:#0099FF; border-bottom:1px solid #CCCC; float:left;}

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
	.box{width:90%; height:300px; background:#0099FF; float:left; margin:1% 5%}
		.box3{width:90%; height:400px; background:#0099FF; float:left; margin:1% 5%}


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
width:150px;
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
}

@media only print{
 .box{display:none}
}
</style>
</head>

<body>

<div>

	<div class="top" align="center">
		<div style="float:right; margin-right:20px" id="loginBtn"> Log Out </div>
		<div> <marquee> Mobile Food Ordering App for Staff and Students of UWE Bristol</marquee> </div>
	</div>
	
	<div class="banner">
	<div style="float:right; font-size:40; color: #FFFFFF; border: thick">   </div>
	
	</div>
	<div class="content">
<h1> Mobile Food App</h1>
<p> For Staff and Students of UWE Bristol. User - Centered Design Approach</p>

<button>User's Dashboard</button>

</div>
</div>
		<div class="box">
		<div class="menu">
	<div id="home" class="top_menu"> Home </div>
	<div id="about" class="top_menu has-sub" title="about"> <i class="fa-plus fa"></i> Menu </div>
		<div class="sub_menu about">
		<div id="enct" ><a href="product.php" target="_blank"> Place Order</a></div>
		
			<div id="enct" ><a href="myorder.php" target="_blank"> View Order</a></div>
		  
		</div>
		
	<div id="lout" class="top_menu"><a href="index.php"> Log Out  </a></div>
</div>
</div>

		<div class="box3">
	
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
	 include('patientreg.php');
	 include('bookappointment.php');
	 include('viewappointment.php');
?>