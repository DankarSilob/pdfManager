<?php
require_once("conn.php");

function checarLogin($username,$password){
	 
	 $db = new MySQL();
	 $consulta = $db->consulta("SELECT id FROM usuarios WHERE usuario='$username' AND pass='$password'"); 
	 if($db->num_rows($consulta)>0){  
	 $acceso=1;
	 return $acceso;
	 }
	 else{
		 $acceso=0;

		return $acceso; 
	 }
}
function ejecutar_query($query){
	  $db = new MySQL();  
		 $consulta = $db->ejecutar($query); 

}
function escribirRenglones(){
	$db = new MySQL();  
}
?>