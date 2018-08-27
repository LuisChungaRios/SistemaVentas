<?php
  require "../config/conexion.php";
  class Permiso {
      //IMPLEMENTAMOS NUESTRO CONSTRUCTOR
      public function _construct() {

      }
     
      //IMPLEMENTAR UN METODO PARA LISTAR LOS REGISTROS
      public function listar(){
        $sql="SELECT * FROM  permiso";
        return ejecutarConsulta($sql);

      }
    
  }



 ?>
