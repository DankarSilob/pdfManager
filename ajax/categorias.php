<?php

$option = $_POST['opcion'];

switch($option)
{
	case 1 : //////Popular categorias  dropdown
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="SELECT * FROM categorias order by id ";
			$result= mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
			//$consulta = $db->consulta(); 
			//while ($row = $db->fetch_assoc($consulta)) {
				echo '<option value="'.$row["id"].'"';
					if($_POST['catDrop']==$row["id"])
						echo "selected='selected'";
				echo '>';		
				echo $row["categoria"];
				echo '</option>';
			}
		break;	
	case 2 : /////Borra Archivo
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="DELETE FROM categorias where id='$_POST[id]'" ;
			$result= mysql_query($query);
			
		break;
	case 3 : // popular Categorias
			$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="SELECT * FROM categorias order by id  ";
			$result= mysql_query($query);
			while($row=mysql_fetch_assoc($result)){
			//$consulta = $db->consulta(); 
			//while ($row = $db->fetch_assoc($consulta)) {
				echo '<tr>' ;
				echo '<td>'.$row["categoria"].'</td>';

				echo '<td><a href="javascript:BorrarCategoria('.$row["id"].');">Delete</a></td>';
  				echo '</tr>';
			}
		break;	
	case 4 : // Add categoria
		$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
			$query ="Insert INTO categorias(categoria) values ( '$_POST[categoria]')" ;
			$result= mysql_query($query);
		
}



?>