<?php
  require "../config/conexion.php";
  class Persona {
      //IMPLEMENTAMOS NUESTRO CONSTRUCTOR
      public function _construct() {

      }
      //IMPLEMENTAMOS UN METODO PARA  INSERTAR  REGISTROS
      public function insertar ($tipo_persona,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email){
        $sql="INSERT INTO persona (tipo_persona,nombre,tipo_documento,num_documento,direccion,telefono,email)
        VALUES ('$tipo_persona','$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email')";
        return ejecutarConsulta($sql);
      }
      //IMPLEMENTAMOS UN METODO PARA EDITAR REGISTROS
      public function editar($idpersona,$tipo_persona,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email){
        $sql="UPDATE persona SET tipo_persona='$tipo_persona',nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email'
        WHERE idpersona='$idpersona'";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAMOS UN METODO PARA ELIMINAR REGISTROS
      public function eliminar($idpersona){
        $sql="DELETE FROM persona WHERE idpersona='$idpersona'";
        return ejecutarConsulta($sql);

      }
     
      //IMPLEMENTAR UN METODO PARA MOSTRAR LOS DATOS DE UN REGISTRO O MODIFICAR
      public function mostrar($idpersona){
        $sql="SELECT * FROM  persona  WHERE idpersona='$idpersona'";
        return ejecutarConsultaSimpleFila($sql);

      }
      //IMPLEMENTAR UN METODO PARA LISTAR LOS PROVEEDORES
      public function listarp(){
        $sql="SELECT * FROM  persona WHERE tipo_persona='Proveedor' ORDER BY idpersona DESC";
        return ejecutarConsulta($sql);

      }
       //IMPLEMENTAR UN METODO PARA LISTAR LOS CLIENTES
      public function listarc(){
        $sql="SELECT * FROM  persona WHERE tipo_persona='Cliente' ORDER BY idpersona DESC";
        return ejecutarConsulta($sql);

      }
     
  }



 ?>
