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
   <div class="linea1">Category: <input type="text" name="categoria" id="categoria" class="input2" /></div>
   <input class="buttonVerde" type="submit" value="Submit Category" onclick="agregarCategoria()" />
    <input type="hidden" value="1" name="alta" />
</div>
<div class="panes">
	<div>
	<table border="0" cellpadding="0" cellspacing="0" class="tablesorter"   > 
		<thead> 
			<tr> 
              <th>Name</th> 
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
		populaArchivos();
}); 
function populaArchivos(){
	$("#tablaCategorias").load("ajax/categorias.php",{ opcion:3},function(data){
		  $("table") 
    		.tablesorter({ widgets: ['zebra']})
		});	
}   
function agregarCategoria() {
	var categoria = $("#categoria").val();
	$.post("ajax/categorias.php",{opcion:4,categoria:categoria},function(data){
	     	 $("#listFile").load("listFileCategorias.php");
	})
		

}
function BorrarCategoria(id) {
	var categoria = $("#categoria").val();
	$.post("ajax/categorias.php",{opcion:2,id:id},function(data){
	     	 $("#listFile").load("listFileCategorias.php");
	})
		

}
</script>