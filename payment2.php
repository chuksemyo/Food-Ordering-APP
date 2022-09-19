<?php
include('conne.php');
session_start();
if(isset($_SESSION['na']))
{

 $na=$_SESSION['na'] ;
 $ph =$_SESSION['ph'] ;
 $ema =$_SESSION['ema'] ;
$dt = date('Y-m-d');
$amount =0;
$amount2 =0;
$count =0;
$display = "";
$remove = "";

$welcome = $na;

try{
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
	$query = "select * from tbl_order where user = ? and status = 'a' ";
	$run = $pdo->prepare($query);
	$run->execute([$na]);

	$response = $run->rowCount();
	if( $response > 0)
	{			
	 $k= 0;
	$amount =0;
$count =0;
		while($detail = $run->fetch(PDO::FETCH_OBJ))
		{		
	$price = $detail->price;
	$amount+=$price;
	  $id = $detail->id;
	$count++;
} 
		 
				 	}
					
					
					}
				
				catch(PDOException $e)
			{
					return $e->getMessage();
				
			}	
	
	
try{
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
	$query = "select * from tblverify  ";
	$run = $pdo->prepare($query);
	$run->execute();

	$response = $run->rowCount();
	if( $response > 0)
	{			
	 $k= 0;
		while($actcheck = $run->fetch(PDO::FETCH_OBJ))
		{		
$acno = $actcheck->acc;
$amt = $actcheck->amount;
$bal = $actcheck->balance;

} 
			 
				 	}
					}
catch(PDOException $e)
			{
					return $e->getMessage();
				
			}
	try{
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
	$query = "select * from ecard where cardnumber = ?  ";
	$run = $pdo->prepare($query);
	$run->execute([$acno]);

	$response = $run->rowCount();
	if( $response > 0)
	{			
	 $k= 0;
		while($balance = $run->fetch(PDO::FETCH_OBJ))
		{		
$fn = $balance->firstname;
$ln = $balance->lastname;
} 
			 
				 	}
					}
catch(PDOException $e)
			{
					return $e->getMessage();
				
			}		

if(isset($_POST['Submit']) )
{

if($bal >= $amt)
{

$tbal = $bal - $amt;
$updateid =  $pdo->prepare("update ecard set amount =?  where cardnumber = ? ");
$updateid->execute([$tbal, $acno]);

$updateid =  $pdo->prepare("update tbl_order set status = 'p' where user  = ? ");
$updateid->execute([$na]);


header("Location: index.php");	
			 	}
	else
	{
	$remove = "Insufficient Fund";
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
<title></title>
<script type="text/javascript" src="jQuery.js"></script>
<script type="text/javascript" src="js.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #9933CC;
}
-->
</style>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #343031}
a:link {
	color: #4A1414;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #4E3921;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style2 {font-size: 9px}
.style3 {background-repeat: repeat; height: 18px; font-family:"Bodoni MT"; font-weight: bold; color: #FFFFFF; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; width: 70px; cursor:pointer; text-align: center; vertical-align: middle; background-image: url(images/btn_bg.jpg);}
.style4 {font-size: 14}
.style5 {color: #990000}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" bgcolor="#9900FF">
  <tr>
    <td height="3" align="center" valign="top"><table width="90%" height="3" border="0">
      <tr>
        <td height="50" align="left"><table width="90%" height="50" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="70">&nbsp;</td>
            <td width="20%" align="center" valign="bottom" class="smallfont">Welcome <?php echo $welcome ?> ! <a href="index.php?status=logout">logout</a><a href="index.php"></a><a href="#"></a> </td>
            <td align="right"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="40" align="left" valign="middle" bgcolor="#E1E1E1"></td>
      </tr>
      <tr>
        <td height="270" align="left"><table width="90%" height="270" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="20%" align="left" valign="top" bgcolor="#000000"><table width="90%" height="270" border="0" cellpadding="3" cellspacing="1" bgcolor="#E1E1E1">
              <tr>
                <td height="25" bgcolor="#f9f9f9" class="smallfont "><a href="#" onclick="orderTransfer('product.php');">Product</a></td>
              </tr>
              
              <tr>
                <td height="25" bgcolor="#f1f1f1" class="smallfont "><a href="#" onclick="orderTransfer('view_cart.php');">View cart </a></td>
              </tr>
              
              <tr>
                <td><form id="orderForm" name="orderForm" method="post" action="">
                  <input name="username" type="hidden" id="username" value="<?php echo $na ?>" />
                  <input name="password" type="hidden" id="password" value="<?php echo $ph ?>" />
                </form></td>
              </tr>
            </table></td>
            <td width="60%"><img src="images/photo.gif" width="100%" height="270" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#F3F3F3"></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#F3F3F3"><form id="form2" name="form2" method="post" action="" onsubmit="validatePassword(this); return submitF;">
          <br />
          <table width="60%" border="0" cellpadding="2" cellspacing="2" bgcolor="#F1F1F1">
            <tr>
              <td height="25" colspan="3" align="center" class="smallfont">eCard Payment </td>
            </tr>
            <tr>
              <td width="149" height="25" align="left" class="smallfont">Firstname</td>
              <td colspan="2" align="left"><label>
                <input name="firstname" type="text" id="firstname" value="<?php echo $fn?>" />
                <input name="username2" type="hidden" id="username2" value="<?php echo $na ?>" />
              </label></td>
            </tr>
            <tr>
              <td height="25" align="left" class="smallfont">Lasname</td>
              <td colspan="2" align="left"><label>
                <input name="lastname" type="text" id="lastname" value="<?php echo $ln?>" />
                <input name="password2" type="hidden" id="password2" value="<?php echo $ph ?>" />
              </label></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#F1F1F1" class="smallfont">Cardnumber</td>
              <td width="148" align="left" bgcolor="#F1F1F1"><input name="cardnumber" type="password" id="cardnumber" value="<?php echo $acno?>" /></td>
              <td width="133" align="left" bgcolor="#F1F1F1">&nbsp;</td>
            </tr>
            
            <tr>
              <td align="left" bgcolor="#F1F1F1" class="smallfont">Total sum (&#8358) </td>
              <td height="25" colspan="2" align="left" bgcolor="#F1F1F1"><label>
                <input name="amount" type="text" id="amount" value="<?php echo $amount?>" readonly="true" />
              </label></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#F1F1F1" class="smallfont">Number of items </td>
              <td height="20" colspan="2" align="left" bgcolor="#F1F1F1"><?php echo $count ?></td>
            </tr>
            <tr>
              <td bgcolor="#F1F1F1">&nbsp;</td>
              <td height="30" colspan="2" align="left" bgcolor="#F1F1F1"><input name="Submit" type="submit" id="Submit" value="Complete Transaction" /></td>
            </tr>
            <tr>
              <td height="20" colspan="3" align="center" bgcolor="#E1E1E1"><span class="style5">
                <label class="smallfont">
                <div id="response"><?php  print $remove ; ?></div>
                </label>
              </span></td>
            </tr>
          </table>
        </form></td>
      </tr>
      <tr>
        <td align="center" class="smallfont style4">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" class="smallfont">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
