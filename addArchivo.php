<?php 
error_reporting(E_ALL);
if(isset($_POST['alta'])){
	$descripcion =$_POST['descripcion'];
	$foto = $_FILES['archivo']['name'];
	$categoria = $_POST['CategoriaAdd'];
//die( );

	$link =mysql_connect("localhost","nelsonc2_admin","nelson2701") or die(mysql_error());
mysql_select_db("nelsonc2_pdf") or die(mysql_error());
	$query ="INSERT INTO archivos (nombre,descripcion,categoria) values('$foto','$descripcion',$categoria)";
	mysql_query($query);

	if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    
		if(move_uploaded_file($_FILES['archivo']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/pdfmanager/archivos/".$_FILES['archivo']['name']))
		{
		
		}
		else{
			echo "negativo";
		}
	} 
	else {
   		echo "Possible file upload attack. Filename: " . $_FILES['archivo']['name'];
	}	 

$bandera=1;
}
?>


<body <?php if(isset($bandera)){ ?> onLoad="cargaContent();" <?php } ?>>
<input type="hidden" value="<?php echo $categoria  ?>" id="cat"  >
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
function cargaContent( ){
	var cat = $("#cat").val();
	$ = window.parent.$;
	$("#content", parent.document).load('listFiles.php?cat='+cat);
}
</script>