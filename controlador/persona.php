<?php
  require_once "../modelos/Persona.php";
  $persona= new Persona();
  $idpersona=isset($_POST['idpersona'])? limpiarCadena($_POST['idpersona']):"";
  $tipo_persona=isset($_POST['tipo_persona'])? limpiarCadena($_POST['tipo_persona']):"";
  $nombre=isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
  $tipo_documento=isset($_POST['tipo_documento'])? limpiarCadena($_POST['tipo_documento']):"";
  $num_documento=isset($_POST['num_documento'])? limpiarCadena($_POST['num_documento']):"";
  $direccion=isset($_POST['direccion'])? limpiarCadena($_POST['direccion']):"";
  $telefono=isset($_POST['telefono'])? limpiarCadena($_POST['telefono']):"";
  $email=isset($_POST['email'])? limpiarCadena($_POST['email']):"";

  switch ($_GET['op']) {
    case 'guardaryeditar':
      if (empty($idpersona)) {
        $respuesta=$persona->insertar($tipo_persona,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email);
        echo $respuesta? "persona registrado ":"persona no registrado";
      }
      else {
        $respuesta=$persona->editar($idpersona,$tipo_persona,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email);
        echo $respuesta? "persona actualizado ":"persona no se pudo actualizar";
      }
      break;
    case 'eliminar':
    $respuesta=$persona->eliminar($idpersona);
    echo $respuesta? "persona eliminado ":"persona no se puede eliminar";
    break;
    case 'mostrar':
      $respuesta=$persona->mostrar($idpersona);
      //codificamos el resultado utilizando json
      echo json_encode($respuesta);
    break;
    case 'listarp':
    $respuesta=$persona->listarp();
    // declaramos un array
    $data=Array();
      while ($registro=$respuesta->fetch_object()) {
        $data[]=array(
          "0"=>'<button class="btn btn-warning" onclick="mostrar('.$registro->idpersona.')"><i class="fa fa-pencil"></i> </button>'.
          ' <button class="btn btn-danger" onclick="eliminar('.$registro->idpersona.')"><i class="fa fa-trash"></i> </button>',
          "1"=>$registro->nombre,
          "2"=>$registro->tipo_documento,
          "3"=>$registro->num_documento,
          "4"=>$registro->telefono,
          "5"=>$registro->email
          
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

     case 'listarc':
    $respuesta=$persona->listarc();
    // declaramos un array
    $data=Array();
      while ($registro=$respuesta->fetch_object()) {
        $data[]=array(
          "0"=>'<button class="btn btn-warning" onclick="mostrar('.$registro->idpersona.')"><i class="fa fa-pencil"></i> </button>'.
          ' <button class="btn btn-danger" onclick="eliminar('.$registro->idpersona.')"><i class="fa fa-trash"></i> </button>',
          "1"=>$registro->nombre,
          "2"=>$registro->tipo_documento,
          "3"=>$registro->num_documento,
          "4"=>$registro->telefono,
          "5"=>$registro->email
          
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

  }

 ?>
