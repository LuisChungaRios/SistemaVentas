<?php
session_start();
  require "../config/conexion.php";
  class Usuario {
      //IMPLEMENTAMOS NUESTRO CONSTRUCTOR
      public function _construct() {

      }
      //IMPLEMENTAMOS UN METODO PARA  INSERTAR  REGISTROS
      public function insertar ($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos){
        
        $sql="INSERT INTO usuario (nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,condicion)
        VALUES ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','1')";
        //return ejecutarConsulta($sql);

        //REGISTRAR LOS PERMISOS

        $idusuarionew= ejecutarConsulta_retornarID($sql);
        $num_elementos=0;
        $sw=true;
        while ($num_elementos<count($permisos)) {

        $sql_detalle="INSERT INTO usuario_permiso(idusuario,idpermiso) VALUES ('$idusuarionew','$permisos[$num_elementos]')";

          ejecutarConsulta($sql_detalle) or $sw = false;
          $num_elementos+=1;

        }
        return $sw;
      }
      //IMPLEMENTAMOS UN METODO PARA EDITAR REGISTROS
      public function editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos){
        $sql="UPDATE usuario SET nombre='$nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen'
        WHERE idusuario='$idusuario'";
         ejecutarConsulta($sql);

          //Eliminamos todos los permisos asignados para volverlos a registrar
    $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
    ejecutarConsulta($sqldel);

    $num_elementos=0;
    $sw=true;

    while ($num_elementos < count($permisos))
    {
      $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
      ejecutarConsulta($sql_detalle) or $sw = false;
      $num_elementos=$num_elementos + 1;
    }

    return $sw;



         

      }
      //IMPLEMENTAMOS UN METODO PARA DESACTIVAR usuarioS
      public function desactivar($idusuario){
        $sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAMOS UN METODO PARA ACTIVAR usuarioS
      public function activar($idusuario){
        $sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAR UN METODO PARA MOSTRAR LOS DATOS DE UN REGISTRO O MODIFICAR
      public function mostrar($idusuario){
        $sql="SELECT * FROM  usuario  WHERE idusuario='$idusuario'";
        return ejecutarConsultaSimpleFila($sql);

      }
      //IMPLEMENTAR UN METODO PARA LISTAR LOS REGISTROS
      public function listar(){
        $sql="SELECT * FROM  usuario ORDER BY idusuario DESC";
        return ejecutarConsulta($sql);

      }
      //IMPLEMENTAMOS UN METODO PARA LISTAR LOS PERMISOS MARCADOS
      public function listarmarcados($idusuario)
       {
       $sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
    return ejecutarConsulta($sql);
      }
       
     //Función para verificar el acceso al sistema
      public function verificar($login,$clave)
        {
          $sql="SELECT idusuario,nombre,tipo_documento,num_documento,telefono,email,cargo,imagen,login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'"; 
          return ejecutarConsulta($sql);  
        }
}
  

 
 ?>
     
