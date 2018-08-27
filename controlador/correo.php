<?php
  require_once "../modelos/Correo.php";
  $correo= new Correo();
  $idcorreo=isset($_POST['idcorreo'])? limpiarCadena($_POST['idcorreo']):"";
  $idpersona=isset($_POST['idpersona'])? limpiarCadena($_POST['idpersona']):"";
  $asunto=isset($_POST['asunto'])? limpiarCadena($_POST['asunto']):"";
  $mensaje=isset($_POST['mensaje'])? limpiarCadena($_POST['mensaje']):"";
  $fecha = date('Y-m-d');

  switch ($_GET['op']) {
    case 'guardaryeditar':
 
      if (empty($idcorreo)) {
        $respuesta=$correo->insertar($idpersona,$asunto,$mensaje,$fecha);
        require_once "../modelos/Persona.php";
        $persona= new Persona();
        $respuesta=$persona->mostrar($idpersona);
        $correo=$respuesta['email'];
        
        $from="De: luischungar7@gmail.com";
        // $cabecera="De $from";
        $result=mail($correo,$asunto,$mensaje,$from);
        if($result){
        echo $respuesta? "correo enviado correctamente ":"correo no se pudo enviar";
      }
    }
      else {
        $respuesta=$correo->editar($idcorreo,$idpersona,$asunto,$mensaje);
        echo $respuesta? "correo actualizado ":"correo no se pudo actualizar";
      }
      break;
    
    case 'mostrar':
      $respuesta=$correo->mostrar($idcorreo);
      //codificamos el resultado utilizando json
      echo json_encode($respuesta);
    break;
    case 'listar':
    $respuesta=$correo->listar();
    // declaramos un array
    $data=Array();
      while ($registro=$respuesta->fetch_object()) {
        $data[]=array(
          "0"=>$registro->nombre,
          "1"=>$registro->asunto,
          "2"=>$registro->mensaje,
         
          "3"=>$registro->fecha,
         
        );
      }
    $resultados=array(
      "sEcho"=>1,//INFORMACION PARA EL DATATABLE
      "iTotalRecords"=>count($data), //ENVIAMOS EL TOTAL DE REGISTRO AL DATATABLE
      "iTotalDisplayRecords"=>count($data),//ENVIAMOS EL TOTAL DE REGISTROS A VISUALIZAR
      "aaData"=>$data
    );
    echo json_encode($resultados);
    break;

    case 'selectPersona':
       require_once "../modelos/Persona.php";
       $persona = new Persona();
       $respuesta = $persona->listarc();
       while ($registro=$respuesta->fetch_object()) {
         echo '<option value='.$registro->idpersona.'>'.$registro->nombre.'</option>';
       }
      break;

  }

 ?>
