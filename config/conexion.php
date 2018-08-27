<?php
 require_once ("global.php");
 $conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

 //Establecemos la cadena de caracteres (UTF-8)
//mysqli_query(cadena_conenxion,consultaSQL)
 mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');
 //SI TENEMOS UN POSIBLE ERROR EN LA CONEXION LO MOSTRAMOS
 if (mysqli_connect_errno()) {
  echo "Falló la conexión a la base de datos";
  mysqli_connect_error();
  exit();
 }
if (!function_exists('ejecutarConsulta')) {
  function ejecutarConsulta($sql){
    global $conexion;
    $query=$conexion->query($sql);
    return $query;
  }
  function ejecutarConsultaSimpleFila($sql){
    global $conexion;
    $query=$conexion->query($sql);
    $row=$query->fetch_assoc();
    return $row;
  }
  function ejecutarConsulta_retornarID($sql)
  {
    global $conexion;
    $query = $conexion->query($sql);    
    return $conexion->insert_id;      
  }
  function limpiarCadena($str){
    global $conexion;
    //msqly_real_escape_string : quita los caracteres especiales
    $str=mysqli_real_escape_string($conexion,trim($str));
    //htmlspecialchars : convierte caracteres especiales en entidades html
    return htmlspecialchars($str);
  }
}




 ?>
