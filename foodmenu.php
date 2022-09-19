<?php
include('conne.php');
session_start();
if(isset($_SESSION['na']))
{

 $na=$_SESSION['na'] ;
 $ph =$_SESSION['ph'] ;
 $ema =$_SESSION['ema'] ;
$ret  =$_SESSION['ret'] ;

  $ms ="";
  if(isset($_POST['Submit']) )
{
  
$des = $_POST['des'];
$price = $_POST['price'];
$catg = $_POST['catg'];


if ($des !=""  && $price != "" )
{ 

$picImage=$_FILES['file']['name'];

$uploaddir = './food/'; 
$dt = 	date('dmy');
$tm = strftime('%H%M%S');
$new_file = $dt . $tm . $_FILES['file']['name'];
//print $new_file;
$fileName = $uploaddir . basename($_FILES['file']['name']); 
if (move_uploaded_file($_FILES['file']['tmp_name'], $fileName)) 
{ 
	$imgUrl = $uploaddir . $new_file;
	$res = @rename($fileName , $imgUrl);
}

try {

   $pdo->beginTransaction();
   $query  = "insert into foodmenu (description, price, pic, catg, Restaurant)  values (?,?,?, ?,?)";
	$run = $pdo->prepare($query);
	$run->execute(array( $des , $price , $imgUrl,$catg, $ret));

$ms = "Successfully. ";

    $pdo->commit();
print 1;
} catch(Exception $e) {

    $pdo->rollback();
    throw $e;
	
}

}

}
}
else
{
header('location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mobile Food Ordering App</title>
<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

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

<button class="loginBtn2">Menu</button>

</div>
</div>
		<div class="box">
		   <form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
		   <table width="90%" border="0" cellspacing="0" cellpadding="0" style=" background:#FFF; margin:2% 5%">
		   <tr>
                <td height="20" colspan="2" align="center" >Upload Food Menu </td>
             </tr>
              <tr>
                <td width="40%" height="30">Menu Description  </td>
                <td width="60%" height="30"><input name="des" type="text" id="des" required="required" /></td>
              </tr>
			  
			  <tr>
                <td  height="20">Price</td>
                <td  height="20">
                  <input name="price" type="text" id="price" />
                </td>
              </tr>
              
              <tr>
                <td height="20">Image</td>
                <td height="20"><label>
                  <input type="file" name="file" />
                </label></td>
              </tr>
              <tr>
                <td height="20">Category</td>
                <td height="20"><label>
                  <select name="catg" id="catg">
                    <option>Sea Food</option>
                    <option>Afican Dish</option>
                    <option>Continental Dish</option>
                    <option>Chinese Food</option>
                    <option>English Food</option>
                  </select>
                </label></td>
              </tr>
               <tr>
                <td height="20" colspan="2" align="center" id="status"><?php echo $ms; ?></td>
              </tr>


              <tr>
                <td height="30" colspan="2" align="center">
					<div > 
					  <label>
					  <input type="submit" name="Submit" value="Submit" />
					  </label>
</div>  
				
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