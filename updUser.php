<?php
$id = $_GET['id'];
$link =mysql_connect("mysql2905.mydomainwebhost.com","u1069918_daniel","4321");
mysql_select_db("db1069918_nelson");
$query ="SELECT u.id AS id, u.usuario AS usuario, u.pass as pass, r.rol
					FROM usuarios u
					LEFT JOIN roles r ON r.id = u.rol
					WHERE u.id=$id";
$result= mysql_query($query);
$row=mysql_fetch_assoc($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="js/jquery.js"></script>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="popcontainer">
    <div class="spacepop">Username: <input type="text" name="categoria" id="username" class="input2" value="<?php echo $row['usuario']; ?>"/></div>
    <div class="spacepop">Password:&nbsp; <input type="text" name="password" id="password" class="input2" value="<?php echo $row['pass']; ?>" /></div>
    <div class="spacepop">User Type: <select id="UserRol"></select></div>
    <div class="buttonpos"><input class="buttonVerde" type="submit" value="Submit" onclick="updateUsuario()" /></div>
    <input type="text"  id="identificador" value="<?php echo $id ?>"  style="display:none"/>
 </div>   
    
</body>
</html>

<script>

$(document).ready(function() { 
		$("#UserRol").load("ajax/usuarios.php",{ opcion:3},function(data){});	
		
});

function updateUsuario(){
	username = $("#username").val();
	password = $("#password").val();
	id = $("#identificador").val();
	rol = $("#UserRol option:selected").val();
	$.post("ajax/usuarios.php",{opcion:5,username:username,password:password,rol:rol,id:id},function(data){
	     	parent.$.fancybox.close();
			
	});	
}
</script>