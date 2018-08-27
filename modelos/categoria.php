<?php
  require "../config/conexion.php";
  class Categoria {
      //IMPLEMENTAMOS NUESTRO CONSTRUCTOR
      public function _construct() {

      }
      //IMPLEMENTAMOS UN METODO PARA  INSERTAR  REGISTROS
      public function insertar ($nombre,$descripcion){
        $sql="INSERT INTO categoria (nombre,descripcion,condicion)
        VALUES ('$nombre','$descripcion','1')";
        return ejecutarConsulta($sql);
      }
      //IMPLEMENTAMOS UN METODO PARA EDITAR REGISTROS
      public function editar($idcategoria,$nombre,$descripcion){
        $sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion'
        WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAMOS UN METODO PARA DESACTIVAR CATEGORIAS
      public function desactivar($idcategoria){
        $sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAMOS UN METODO PARA ACTIVAR CATEGORIAS
      public function activar($idcategoria){
        $sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAR UN METODO PARA MOSTRAR LOS DATOS DE UN REGISTRO O MODIFICAR
      public function mostrar($idcategoria){
        $sql="SELECT * FROM  categoria  WHERE idcategoria='$idcategoria'";
        return ejecutarConsultaSimpleFila($sql);

      }
      //IMPLEMENTAR UN METODO PARA LISTAR LOS REGISTROS
      public function listar(){
        $sql="SELECT * FROM  categoria ORDER BY idcategoria DESC";
        return ejecutarConsulta($sql);

      }
        //IMPLEMENTAR UN METODO PARA LISTAR LOS REGISTROS Y MOSTRAR EN EL SELECT
        public function select(){
        $sql="SELECT * FROM  categoria WHERE condicion=1";
        return ejecutarConsulta($sql);

      }
  }



 ?>
