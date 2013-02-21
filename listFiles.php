<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php header("Content-Type: application/force-download");  ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Untitled Document</title>
 

<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>


</div>


<!-- ADD FILE-->
<div class="navBar">

<div id="menuAdministrador"> 
<?php
session_start();
if($_SESSION['rol']==1)
{ ?>
	<div class="buttonMenu"><a href="javascript:mostrarArchivos()" >Files</a></div>
    <div class="buttonMenu"><a href="javascript:mostrarUsuarios()">Users</a></div>
    <div class="buttonMenu"><a href="javascript:mostrarCategorias()">Categories</a></div>
<?php }?>
    <div id="selCategoria" class="dropdown">
	<div id="CategoriasDrop">
    Category:
    <select id="ddlCategoria" onchange="populaArchivos()"> 
    	
    </select>
    <input type="hidden" value="<?php echo $_GET['cat']  ?>" id="catDrop"  >
    </div>
</div>

</div>
</div>
<div id="opcionesAdministrador"> 

 <?php
if($_SESSION['rol']==1)
{ ?>
 <div class="buttonPdf" onclick="javascript:AgregarDoc();"><img src="pdf.png" width="18" height="18" align="absmiddle"/> Add</div>
<div id="formAgregar" class="addfileForm">

	<form enctype="multipart/form-data" action="addArchivo.php" method="POST" id="myForm" target="addArchivo" >
    <div class="linea1">File Descriptions: <input type="text" name="descripcion" class="input2" /></div>
    <div class="linea1">Archivo: <input type="file" name="archivo" /></div>
    <div class="lineaDropdown">Category:<select id="CategoriaAdd"  name="CategoriaAdd">  </select></div>
    <input class="buttonVerde" type="submit" value="Submit File" />
    <input type="hidden" value="1" name="alta" />
  </form>
</div>
</div>
<?php }?>
<!--GRID-->
	<div style="padding-top:15px;" id="listFilesArchivos">
    
    <table border="0" cellpadding="0" cellspacing="0" class="tablesorter" id="myTable"  > 
		<thead> 
			<tr> 
              <th>File</th> 
              <th>File Description</th> 
			  <?php
				if($_SESSION['rol']==1)
			 { ?>
              <th>Action</th> 
			<?php } ?>
			</tr> 
	  </thead> 
		<tbody id="tablaArchivos"> 
 		</tbody> 
	</table> 

 <iframe name="addArchivo" id="addArchivo" src="addArchivo.php"  frameborder="0" style=" text-align:center;  " width="400px"  >
</iframe>
</div>

<div id="listFile"></div>
</body>
</html>
<script>
 
$(document).ready(function() { 
        popularCategorias();

}); 
function populaArchivos(){
	cat = $("#ddlCategoria option:selected").val();
	$("#tablaArchivos").empty();
	$("#tablaArchivos").load("ajax/archivos.php",{ opcion:1, cat:cat},function(data){
		  
		  $("table") 
    		.tablesorter({widgets: ['zebra']})
		});	
}    

function AgregarDoc(){
	 $("#formAgregar").slideDown("slow");
}

function BorrarArchivo(id){
	var catAdd = $("#CategoriaAdd").val();
	$.post("ajax/archivos.php",{opcion:2,id:id},function(data){
	     	 $("#content").load('listFiles.php?cat='+catAdd);
	})
		
}

function mostrarCategorias() {
	 CerrarForm();
	$("#listFile").load("listFileCategorias.php");
}

function mostrarUsuarios(){
	CerrarForm();
	$("#listFile").load("listUsers.php");
	}

function CerrarForm(){
	$("#formAgregar").hide();
	$("#listFilesArchivos").hide();
	$("#CategoriasDrop").hide();
	
	
}
function popularCategorias(){
	popularCategoriasAdd();
	var catDrop = $("#catDrop").val();
	$("#ddlCategoria").load("ajax/categorias.php",{ opcion:1,catDrop:catDrop},function(data){
			populaArchivos();
		});
}

function popularCategoriasAdd(){
	var catDrop = $("#catDrop").val();
	$("#CategoriaAdd").load("ajax/categorias.php",{ opcion:1,catDrop:catDrop},function(data){
			populaArchivos();
		});
}

function mostrarArchivos(){
	$("#formAgregar").show();
	$("#listFilesArchivos").show();
	$("#listFile").empty();
	popularCategoriasAdd();
	popularCategorias();
	$("#CategoriasDrop").show();
	}
   
</script>
 