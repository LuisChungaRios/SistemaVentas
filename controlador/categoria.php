<?php
  require_once "../modelos/categoria.php";
  $categoria= new Categoria();
  $idcategoria=isset($_POST['idcategoria'])? limpiarCadena($_POST['idcategoria']):"";
  $nombre=isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
  $descripcion=isset($_POST['descripcion'])? limpiarCadena($_POST['descripcion']):"";

  switch ($_GET['op']) {
    case 'guardaryeditar':
      if (empty($idcategoria)) {
        $respuesta=$categoria->insertar($nombre,$descripcion);
        echo $respuesta? "Categoria registrada ":"Categoria no registrada";
      }
      else {
        $respuesta=$categoria->editar($idcategoria,$nombre,$descripcion);
        echo $respuesta? "Categoria actualizada ":"Categoria no se pudo actualizar";
      }
      break;
    case 'desactivar':
    $respuesta=$categoria->desactivar($idcategoria);
    echo $respuesta? "Categoria desactivada ":"Categoria no se pudo desactivar";
    break;
    case 'activar':
    $respuesta=$categoria->activar($idcategoria);
    echo $respuesta? "Categoria activada ":"Categoria no se pudo activar";
    break;
    case 'mostrar':
      $respuesta=$categoria->mostrar($idcategoria);
      //codificamos el resultado utilizando json
      echo json_encode($respuesta);
    break;
    case 'listar':
    $respuesta=$categoria->listar();
    // declaramos un array
    $data=Array();
      while ($registro=$respuesta->fetch_object()) {
        $data[]=array(
          "0"=>($registro->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$registro->idcategoria.')"><i class="fa fa-pencil"></i> </button>'.
          ' <button class="btn btn-danger" onclick="desactivar('.$registro->idcategoria.')"><i class="fa fa-close"></i> </button>':
          '<button class="btn btn-warning" onclick="mostrar('.$registro->idcategoria.')"><i class="fa fa-pencil"></i> </button>'.
          ' <button class="btn btn-primary" onclick="activar('.$registro->idcategoria.')"><i class="fa fa-check"></i> </button>',
          "1"=>$registro->nombre,
          "2"=>$registro->descripcion,
          "3"=>($registro->condicion)?'<span class="label bg-green">Activado</span>':
          '<span class="label bg-red">Desactivado</span>',
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
