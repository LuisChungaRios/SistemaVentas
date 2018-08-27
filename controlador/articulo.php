<?php
  require_once "../modelos/Articulo.php";
  $articulo= new Articulo();
  $idarticulo=isset($_POST['idarticulo'])? limpiarCadena($_POST['idarticulo']):"";
  $idcategoria=isset($_POST['idcategoria'])? limpiarCadena($_POST['idcategoria']):"";
  $codigo=isset($_POST['codigo'])? limpiarCadena($_POST['codigo']):"";
  $nombre=isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
  $stock=isset($_POST['stock'])? limpiarCadena($_POST['stock']):"";
  $descripcion=isset($_POST['descripcion'])? limpiarCadena($_POST['descripcion']):"";
  $imagen=isset($_POST['imagen'])? limpiarCadena($_POST['imagen']):"";

  switch ($_GET['op']) {
    case 'guardaryeditar':
    if(!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
      $imagen=$_POST['imagenActual'];
    }
    else {
      $ext=explode(".",$_FILES['imagen']['name']);
      if($_FILES['imagen']['type']=="image/jpg" || $_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png")
      {
        $imagen= round(microtime(true)). '.' .end($ext);
       move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
      }
    }
      if (empty($idarticulo)) {
        $respuesta=$articulo->insertar($idcategoria,$codigo,$nombre,$stock,$descripcion,$imagen);
        echo $respuesta? "articulo registrada ":"articulo no registrada";
      }
      else {
        $respuesta=$articulo->editar($idarticulo,$idcategoria,$codigo,$nombre,$stock,$descripcion,$imagen);
        echo $respuesta? "articulo actualizada ":"articulo no se pudo actualizar";
      }
      break;
    case 'desactivar':
    $respuesta=$articulo->desactivar($idarticulo);
    echo $respuesta? "articulo desactivada ":"articulo no se pudo desactivar";
    break;
    case 'activar':
    $respuesta=$articulo->activar($idarticulo);
    echo $respuesta? "articulo activada ":"articulo no se pudo activar";
    break;
    case 'mostrar':
      $respuesta=$articulo->mostrar($idarticulo);
      //codificamos el resultado utilizando json
      echo json_encode($respuesta);
    break;
    case 'listar':
    $respuesta=$articulo->listar();
    // declaramos un array
    $data=Array();
      while ($registro=$respuesta->fetch_object()) {
        $data[]=array(
          "0"=>($registro->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$registro->idarticulo.')"><i class="fa fa-pencil"></i> </button>'.
          ' <button class="btn btn-danger" onclick="desactivar('.$registro->idarticulo.')"><i class="fa fa-close"></i> </button>':
          '<button class="btn btn-warning" onclick="mostrar('.$registro->idarticulo.')"><i class="fa fa-pencil"></i> </button>'.
          ' <button class="btn btn-primary" onclick="activar('.$registro->idarticulo.')"><i class="fa fa-check"></i> </button>',
          "1"=>$registro->nombre,
          "2"=>$registro->categoria,
          "3"=>$registro->codigo,
          "4"=>$registro->stock,
          "5"=>"<img src='../files/articulos/".$registro->imagen."' height='50px' width='50px' >",
          "6"=>($registro->condicion)?'<span class="label bg-green">Activado</span>':
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

    case 'selectCategoria':
       require_once "../modelos/categoria.php";
       $categoria = new categoria();
       $respuesta = $categoria->select();
       while ($registro=$respuesta->fetch_object()) {
         echo '<option value='.$registro->idcategoria.'>'.$registro->nombre.'</option>';
       }
      break;

  }

 ?>
