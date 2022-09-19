<?php
include('conne.php');


$pintoken = rand(60000,87000);
$updateid =  $pdo->prepare("update tblverify set token ='$pintoken'");
$updateid->execute();

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
		while($balance = $run->fetch(PDO::FETCH_OBJ))
		{		
$acno = $balance->acc;
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
$phone = $balance->phone;

} 
			 
				 	}
					}
catch(PDOException $e)
			{
					return $e->getMessage();
				
			}
		
		
$recipient = $phone;
$message = "Please enter the token : " . $pintoken;
$sender = 'Mapp';
echo $message;
//header("location: http://www.eventsms.com.ng/index.php?option=com_spc&comm=spc_api&username=citysoft&password=09011690643G&sender=$sender&recipient=$recipient&message=$message");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>

</style></head>

<body>

</body>
</html>
 
