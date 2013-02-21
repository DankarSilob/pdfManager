<?php


$username = $_POST['username']; 
$password= $_POST['password']; 

$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
$query = "SELECT * from usuarios where usuario='$username' and pass='$password' ";

$result = mysql_query($query);
$acceso = mysql_num_rows($result);

if($acceso==0){
	echo "acceso denegado";
}
else{
	session_start();
	$row=mysql_fetch_assoc($result);
	$_SESSION['rol']=$row['rol'];
echo  1;
}

?>