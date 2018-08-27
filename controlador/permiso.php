<?php
  require_once "../modelos/Permiso.php";
  $permiso= new Permiso();

  switch ($_GET['op']) {
    case 'listar':
    $respuesta=$permiso->listar();
    // declaramos un array
    $data=Array();
      while ($registro=$respuesta->fetch_object()) {
        $data[]=array(
         
          "0"=>$registro->nombre,
          
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
