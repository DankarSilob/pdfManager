<?php

$option = $_POST['opcion'];

switch($option)
{
	case 1 : //////Popular USuarios
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="SELECT u.id AS id, u.usuario AS usuario, u.pass as pass, r.rol
					FROM usuarios u
					LEFT JOIN roles r ON r.id = u.rol
					ORDER BY u.id";
			$result= mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
			//$consulta = $db->consulta(); 
			//while ($row = $db->fetch_assoc($consulta)) {
				echo '<tr>' ;
				echo '<td>'.$row["usuario"].'</td>';
				echo '<td>'.$row["pass"].'</td>';
				echo '<td>'.$row["rol"] 	.'</td>';
				echo '<td><a  href="javascript:BorrarUser('.$row["id"].');">Delete</a> - <a class="popup" href="updUser.php?id='.$row["id"].'">Update</a> </td>';
  				echo '</tr>';
			}
		break;	
	case 2 : /////Borra Archivo
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="DELETE FROM usuarios where id='$_POST[id]'" ;
			$result= mysql_query($query);
			
		break;
		
	case 3 : //////Popular usuarios dropdown
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="SELECT * from roles ORDER BY id";
			$result= mysql_query($query);
			while($row=mysql_fetch_assoc($result)){

				echo '<option value="'.$row["id"].'">';		
				echo $row["rol"];
				echo '</option>';
			}
		break;
	case 4 : //// Agregar Usuario
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="Insert INTO usuarios (usuario,pass,rol) values ( '$_POST[username]','$_POST[password]','$_POST[rol]')" ;
			$result= mysql_query($query);
		break;
	
	case 5 : // Actualizar usuario
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query =" UPDATE usuarios set usuario= '$_POST[username]', pass='$_POST[password]', rol='$_POST[rol]'   WHERE id='$_POST[id]'" ;
			$result= mysql_query($query);
			break;

}



?>