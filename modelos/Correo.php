<?php
  require "../config/conexion.php";
  class Correo {
      //IMPLEMENTAMOS NUESTRO CONSTRUCTOR
      public function _construct() {

      }
      //IMPLEMENTAMOS UN METODO PARA  INSERTAR  REGISTROS
      public function insertar ($idpersona,$asunto,$mensaje,$fecha){
        $sql="INSERT INTO correo (idpersona,asunto,mensaje,fecha)
        VALUES ('$idpersona','$asunto','$mensaje','$fecha')";
        return ejecutarConsulta($sql);
      }
        //IMPLEMENTAMOS UN METODO PARA  INSERTAR  REGISTROS
        public function insertarp ($idpersona,$asunto,$mensaje,$fecha){
          $sql="INSERT INTO correo (idpersona,asunto,mensaje,fecha)
          VALUES ('$idpersona','$asunto','$mensaje','$fecha')";
          return ejecutarConsulta($sql);
        }
  
      //IMPLEMENTAR UN METODO PARA LISTAR LOS REGISTROS
      public function listar(){
        $sql="SELECT c.idcorreo,p.idpersona,p.nombre,c.asunto,c.mensaje,c.fecha FROM  correo c INNER JOIN persona p ON c.idpersona=p.idpersona WHERE p.tipo_persona='Cliente'";
        return ejecutarConsulta($sql);

      }
      public function listarp(){
        $sql="SELECT c.idcorreo,p.idpersona,p.nombre,c.asunto,c.mensaje,c.fecha FROM  correo c INNER JOIN persona p ON c.idpersona=p.idpersona WHERE p.tipo_persona='Proveedor'";
        return ejecutarConsulta($sql);

      }

      
     
  }



 ?>
