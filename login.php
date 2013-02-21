<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> 
<link media="print, projection, screen" type="text/css" href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<style type="text/css">
body {
	background-color: #FFF;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #333;
}
.fieldset_container
{
	width:300px;
	height:auto;
	background-color:#333;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	padding:30px;
	margin-top: 50px;
	margin-right: auto;
	margin-left: auto;
}
fieldset
{
	border:none
	}
.title
{
	color: #FFFFFF;
    font-size: 16px;
    text-shadow: 1px 1px 1px #111111;
}
.input1
{
	width:250px;
	height:20px;
	padding:5px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border: 1px solid #EFEFEF;
	font-size:14px;
		
	}
	
.containerFields	
{
	margin-bottom:10px;
	width:250px;
}
.button
{
	background-color:#06F;
	width:auto;
	height:30px;
	color: #FFF;
	padding:5px;
	border: none;
	float:right;
	cursor:pointer;
	margin:3px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	-webkit-box-shadow: 1px 1px 1px 1px #333;
    -moz-box-shadow: 1px 1px 1px 1px #333;
    box-shadow: 1px 1px 1px 1px #333;
	}
	.button2
{
	background-color:#06F;
	width:auto;
	height:30px;
	color: #FFF;
	padding:5px;
	border: none;
	float:left;
	cursor:pointer;
	margin:3px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	-webkit-box-shadow: 1px 1px 1px 1px #333;
    -moz-box-shadow: 1px 1px 1px 1px #333;
    box-shadow: 1px 1px 1px 1px #333;
	}

</style>
<div id="formLogin" class="fieldset_container">

  <fieldset>
    <div class="containerFields"><label for="login" class="title">User</label>
    <input type="text" id="login" name="login" class="input1"/>
    <div class="clear"></div>
    </div>
    <div class="containerFields">
    <label for="password" class="title">Contraseña</label>
    <input type="password" id="password" name="password" class="input1"/>
    <div class="clear"></div>
    </div>
    <div class="containerFields">
    <span id="mensajeError" style="display:none; color:red">Acceso Denegado</span> <br />
    <input type="button"  class="button"  value="Send" onClick="login();"/>
    </div>
  </fieldset>
</div>
<div id="content">
</div>
</body>
</html>

<script>
$(document).keypress(function(e) {
    if(e.which == 13) {
        login();
    }
});

	function login(){
		 
		user = $("#login").val();
		pass = $("#password").val();
		$.post("ajax/login.php",{ username: user ,password : pass },function(data){
  		if(data==1){
     	  $("#content").load("listFiles.php"); 
		  $("#formLogin").hide();
		}
		else{
		  $("#mensajeError").show();
		  $("#loading").hide();
                  
		}
 		 });	
	} 
</script>