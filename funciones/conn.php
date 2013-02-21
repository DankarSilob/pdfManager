<?php
class MySQL{
 private $conexion;
 private $total_consultas;
 public function MySQL(){
  if(!isset($this->conexion)){
  $this->conexion = (mysqli_connect('mysql2905.mydomainwebhost.com','u1069918_daniel','4321')) or die(mysql_error());
  mysqli_select_db($this->conexion,'db1069918_nelson') or die(mysql_error());
  }
  }
 public function consulta($consulta){
  $this->total_consultas++;
  $resultado = mysqli_query($this->conexion,$consulta);
  if(!$resultado){
  echo 'MySQL Error: ' . mysqli_error();
  exit;
  }
  return $resultado; 
  }
  
  public function ejecutar($consulta){
  return mysqli_query($consulta);
  }
 public function fetch_assoc($consulta){ 
  return mysqli_fetch_assoc($consulta);
  }
 public function num_rows($consulta){ 
  return mysqli_num_rows($consulta);
  }
 public function getTotalConsultas(){
  return $this->total_consultas;
  }
}

?>
