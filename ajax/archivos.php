<?php
session_start();
$option = $_POST['opcion'];

switch($option)
{
	case 1 : //////Popular Archivos
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="SELECT * FROM archivos where categoria=' $_POST[cat]' order by id  ";
			$result= mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
			//$consulta = $db->consulta(); 
			//while ($row = $db->fetch_assoc($consulta)) {
				echo '<tr>' ;
				echo '<td><a href="archivos/archivos.php?f='.$row["nombre"].'">'.$row["nombre"].'</a></td>';
				echo '<td>'.$row["descripcion"] 	.'</td>';
				if($_SESSION['rol']==1)
				{ 
					echo '<td><a href="javascript:BorrarArchivo('.$row["id"].');">Borrar</a></td>';
  				}
				echo '</tr>';
			}
		break;	
	case 2 : /////Borra Archivo
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
			mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="DELETE FROM archivos where id='$_POST[id]'" ;
			$result= mysql_query($query);
			
		break;
		
}



?>