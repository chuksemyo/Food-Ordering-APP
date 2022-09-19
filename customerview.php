<?php


include('conne.php');


?>
<style type="text/css">
.cusDiv{
				width:90%; height:auto; position:absolute; background:#FFF; 
				color:#000; padding:1px; border:1px solid #CCC; top:10%;
				left:10%; margin-left:50px; display:none;
			}

.appvHeader{
				width:90%; height:auto; 
				padding:10px 0 ; float:left; 
				background:#6600FF; color:#FFF;
			}
.label{width:30%; float:left; padding:5px 0; border:0px solid #CCC ; margin:5px 0}
.txt{width:60%; height:32px; padding:5px 3px; float:left; border:1px solid #CCC; margin:5px 0}
.btn{width:90%; height:auto; padding:10px 0; background:#6600FF; color:FFF; float:left; cursor:pointer}
@media only screen and (max-width:600px)
{
.cusDiv{
				width:90%; height:auto; background:#FFF; 
				color:#000; padding:1px; border:1px solid #CCC; top:10%;
				left:10%; margin-left:20px; 
			}

.appvHeader{
				width:90%; height:auto; 
				padding:10px 0 ; float:left; 
				background:#6600FF; color:#FFF;
			}
.label{width:40%; float:left; padding:5px 0; border:0px solid #CCC ; margin:5px 0}
.txt{width:60%; height:32px; padding:5px 3px; float:left; border:1px solid #CCC; margin:5px 0}

}
</style>
<div  class="cusDiv">
<form name="form1" id="menuv" target="_blank">
<div class="appvHeader" align="center"> <span style="float:left"> Customers </span> <span style="float:right" onClick="closeDivcusv()"> Close </span></div>
	<div > 
	<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0">
               <tr>
                          
							<td width="30%" ><div align="center" class="style7"><span class="style5">Username</span></div></td>
							  <td width="20%" ><div align="center" class="style7"><span class="style5">Phone</span></div></td>
                            <td width="20%" ><div align="center" class="style7"><span class="style5">Email</span></div></td>
						   </tr>
						  
						  
						 
						  
					<?php

try{
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
	$query = "select * from admin_login where level = 2  ";
	$run = $pdo->prepare($query);
	$run->execute();

	$response = $run->rowCount();
	if( $response > 0)
	{			
	 $k= 0;
	
		while($display = $run->fetch(PDO::FETCH_OBJ))
		{		
	
		

$k++;

		  ?>	  
			  
                          <tr>
						 
                            <td class="style5"><div align="center"><?php echo $display->username; ?></div></td>
                            <td class="style5"><div align="left"><?php echo $display->phone; ?></div></td>
							<td class="style5"><div align="left"><?php echo $display->email; ?></div></td>
							
                            </tr>
						  <?php
						    } 
			
			
				 
				 
				 	}}
				
				
				
				
				catch(PDOException $e)
			{
					return $e->getMessage();
				
			}	
						  ?>
          
         </table>
	</div>
	
	
</div>
