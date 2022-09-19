<?php
$ms = "";
include('conne.php');
session_start();
if(isset($_SESSION['na']))
{

 $na=$_SESSION['na'] ;
 $ph =$_SESSION['ph'] ;
 $ema =$_SESSION['ema'] ;
$id = $_GET['id'];
$dt = date('Y-m-d');
try{
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
	$query = "select * from foodmenu where snum = ? ";
	$run = $pdo->prepare($query);
	$run->execute([$id]);

	$response = $run->rowCount();
	if( $response > 0)
	{			
	 $k= 0;
	
		while($product_price = $run->fetch(PDO::FETCH_OBJ))
		{		
	
$price = $product_price->price;
$productName = $product_price->description;
} 
			
			
				 
				 
				 	}}
				
				
				
				
				catch(PDOException $e)
			{
					return $e->getMessage();
				
			}	
			
			try {

   $pdo->beginTransaction();
    $query  = "insert into tbl_order (id, user, dates ,price, product)  values (?,?,?,?,?)";
	$run = $pdo->prepare($query);
	$run->execute(array($id, $na, $dt,  $price, $productName));

$msg = "Order was successful.";

    $pdo->commit();

} catch(Exception $e) {
{$msg = "Order failed. try again";}
    $pdo->rollback();
    throw $e;
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
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" bgcolor="#9900CC">
  <tr>
    <td height="341" align="center" valign="top"><table width="90%" height="309" border="0">
      <tr>
        <td height="50" align="left"><table width="90%" height="50" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="20%">&nbsp;</td>
            <td width="20%" align="center" valign="bottom" class="smallfont">Welcome <?php echo $na ?> ! <a href="index.php?status=logout">logout</a><a href="index.php"></a><a href="#"></a> </td>
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
            <td width="20%" align="left" valign="top" bgcolor="#000000"><table width="90%" height="270" border="0" cellpadding="3" cellspacing="1" bgcolor="#E1E1E1 ">
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
                                                </form>                </td>
              </tr>
            </table></td>
            <td width="70%"><img src="images/photo.gif" width="100%" height="270" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#F3F3F3"><table width="90%" border="0" cellspacing="5" bgcolor="#F3F3F3">
          <tr>
            <td width="20%" align="left" class="titles"></td>
            <td width="20%" align="left" class="titles"> Shop safely </td>
            <td width="20%" align="left" class="titles"> </td>
            <td width="10%">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#F3F3F3">
		<?php echo $msg ?>
		<a href="javascript:history.back(1);"></a></td>
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