<style type="text/css">
.loginDiv{
				width:300px; height:auto; position:fixed; background:#FFF; 
				color:#000; padding:5px; border:1px solid #CCC; top:10%;
				left:50%; margin-left:-150px; display:none;
			}

.loginHeader{
				width:100%; height:auto; 
				padding:10px 0 ; float:left; 
				background:#6600FF; color:#FFF
			}
.label{width:30%; float:left; padding:5px 0; border:0px solid #CCC ; margin:5px 0}
.txt{width:65%; height:32px; padding:5px 3px; float:left; border:1px solid #CCC; margin:5px 0}
.btn{width:100%; height:auto; padding:10px 0; background:#6600FF; color:FFF; float:left; cursor:pointer}
</style>
<div style="" class="loginDiv">
<form name="form1" id="login" target="_blank">
<div class="loginHeader" align="center"> <span style="float:left"> Restaurant's Login</span> <span style="float:right" onClick="closeDiv()"> Close </span></div>
	<div class="label"> Username </div>
	<input type="text" class="txt" id="username" />
	<div class="label"> Password </div>
	<input type="password" class="txt" id="password" />
	<div class="btn" align="center" onClick="login()"> Login</div>
</form>
</div>