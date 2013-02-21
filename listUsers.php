<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php header("Content-Type: application/force-download");  ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Untitled Document</title>
 
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="formAgregar" class="addfileForm" >
    <div class="linea1">Username: <input type="text" name="categoria" id="username" class="input2" /></div>
    <div class="linea1">Password: <input type="text" name="password" id="password" class="input2" /></div>
    <div class="lineaDropdown">User Type: <select id="ddlUserRol"></select></div>
    <div style="float:left"><input class="buttonVerde" type="submit" value="Submit User" onclick="agregarUsuario()" /></div>
    <input type="hidden" value="1" name="alta" />
</div>

<div class="panes">
	<div>
	<table border="0" cellpadding="0" cellspacing="0" class="tablesorter" id="myTable"   > 
		<thead> 
			<tr> 
              <th>Username</th>
              <th>Password</th>
              <th>User Type</th>
              <th></th> 
			</tr> 
		</thead> 
		<tbody id="tablaCategorias"> 
 		</tbody> 
	</table> 
 	</div>
 </div> 
</div>
</body>
</html>
<script>
$(document).ready(function() { 
		popularDropUsers();
		populaUsuarios();

}); 
function populaUsuarios(){
	$("#tablaCategorias").load("ajax/usuarios.php",{ opcion:1},function(data){
		  $("table") 
    		.tablesorter({ widgets: ['zebra']})
			$(".popup").fancybox({
			'width': '50%',
			'height': '50%',
			'autoscale': false,
			'onClosed': function() {
				 $("#listFile").load("listUsers.php");
     	      },
			'type': 'iframe'
		});
		});	
}   

function popularDropUsers(){
	$("#ddlUserRol").load("ajax/usuarios.php",{ opcion:3},function(data){
		});
}

function agregarUsuario() {
	var username = $("#username").val();
	var password = $("#password").val();
	rol = $("#ddlUserRol option:selected").val();	
	$.post("ajax/usuarios.php",{opcion:4,username:username,password:password,rol:rol},function(data){
	     	 $("#listFile").load("listUsers.php");
	})
		

}
function BorrarUser(id) {
	var categoria = $("#categoria").val();
	$.post("ajax/usuarios.php",{opcion:2,id:id},function(data){
		
	})
		

}

	  
</script>