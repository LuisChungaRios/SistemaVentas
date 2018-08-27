<?php
  require_once "../modelos/Usuario.php";
  $usuario= new Usuario();
  $idusuario=isset($_POST['idusuario'])? limpiarCadena($_POST['idusuario']):"";
  $nombre=isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
  $tipo_documento=isset($_POST['tipo_documento'])? limpiarCadena($_POST['tipo_documento']):"";
  $num_documento=isset($_POST['num_documento'])? limpiarCadena($_POST['num_documento']):"";
  $direccion=isset($_POST['direccion'])? limpiarCadena($_POST['direccion']):"";
  $telefono=isset($_POST['telefono'])? limpiarCadena($_POST['telefono']):"";
  $email=isset($_POST['email'])? limpiarCadena($_POST['email']):"";
  $cargo=isset($_POST['cargo'])? limpiarCadena($_POST['cargo']):"";
  $login=isset($_POST['login'])? limpiarCadena($_POST['login']):"";
  $clave=isset($_POST['clave'])? limpiarCadena($_POST['clave']):"";
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
        $imagen= round(microtime(true)).'.'.end($ext);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/".$imagen);
      }
    }

    //HASH SHA256 EN LA CONTRASEÑA 
    $clavehash=hash("SHA256", $clave);
      if (empty($idusuario)) {
        $respuesta=$usuario->insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);
        echo $respuesta? "usuario registrado ":"No se pudieron registrar todos los datos del usuario";
      }
      else {
        $respuesta=$usuario->editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);
        echo $respuesta? "usuario actualizado ":"usuario no se pudo actualizar";
      }
      break;
    case 'desactivar':
    $respuesta=$usuario->desactivar($idusuario);
    echo $respuesta? "usuario desactivado ":"usuario no se puede desactivar";
    break;
    case 'activar':
    $respuesta=$usuario->activar($idusuario);
    echo $respuesta? "usuario activado ":"usuario no se puede activar";
    break;
    case 'mostrar':
      $respuesta=$usuario->mostrar($idusuario);
      //codificamos el resultado utilizando json
      echo json_encode($respuesta);
    break;
    case 'listar':
    $rspta=$usuario->listar();
    //Vamos a declarar un array
    $data= Array();

    while ($reg=$rspta->fetch_object()){
      $data[]=array(
        "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
          ' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
          '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
          ' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
        "1"=>$reg->nombre,
        "2"=>$reg->tipo_documento,
        "3"=>$reg->num_documento,
        "4"=>$reg->telefono,
        "5"=>$reg->email,
        "6"=>$reg->login,
        "7"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
        "8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
        '<span class="label bg-red">Desactivado</span>'
        );
    }
    $results = array(
      "sEcho"=>1, //Información para el datatables
      "iTotalRecords"=>count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);

  break;

    case 'permisos':
           //OBTENER TODOS LOS PERMISOS DE LA TABLA PERMISOS 
         require_once "../modelos/Permiso.php";
         $permiso= new Permiso();
         $respuesta= $permiso->listar();

         //OBTENER LOS PERMISOS ASIGANDOS

         $id=$_GET['id'];
         $marcados= $usuario->listarmarcados($id);

         //DECLARAMOS EL ARRAY PARA ALMACENAR TODOS LOS PEMISOS MARCADOS
         $valores = array();

         //Almacenar los permisos asignados al usuario en el array
         while ($per = $marcados->fetch_object()) 
         {
           array_push($valores, $per->idpermiso);
         }

         //MOSTRAMOS LA LISTA DE PERMISOS EN LA VISTA Y SI ESTAN O NO MARCADOS
         while ($registro=$respuesta->fetch_object()) {

           $sw=in_array($registro->idpermiso, $valores)?'checked':'';
            echo '<li><input type="checkbox" '.$sw.' name="permiso[]" value="'.$registro->idpermiso.'">'.$registro->nombre.'</li>';
         }
           break;
    case 'verificar':
        $logina=$_POST['logina'];
          $clavea=$_POST['clavea'];

          //Hash SHA256 en la contraseña
        $clavehash=hash("SHA256",$clavea);

        $rspta=$usuario->verificar($logina, $clavehash);

        $fetch=$rspta->fetch_object();

        if (isset($fetch))
          {
              //Declaramos las variables de sesión
              $_SESSION['idusuario']=$fetch->idusuario;
              $_SESSION['nombre']=$fetch->nombre;
              $_SESSION['imagen']=$fetch->imagen;
              $_SESSION['login']=$fetch->login;
              
              //Obtenemos los permisos del usuario
            $marcados = $usuario->listarmarcados($fetch->idusuario);

            //Declaramos el array para almacenar todos los permisos marcados
          $valores=array();

          //Almacenamos los permisos marcados en el array
          while ($per = $marcados->fetch_object())
            {
              array_push($valores, $per->idpermiso);
            }

          //Determinamos los accesos del usuario
          in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
          in_array(2,$valores)?$_SESSION['almacen']=1:$_SESSION['almacen']=0;
          in_array(3,$valores)?$_SESSION['compras']=1:$_SESSION['compras']=0;
          in_array(4,$valores)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
          in_array(5,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
          in_array(6,$valores)?$_SESSION['consultac']=1:$_SESSION['consultac']=0;
          in_array(7,$valores)?$_SESSION['consultav']=1:$_SESSION['consultav']=0;
          in_array(8,$valores)?$_SESSION['mensajeria']=1:$_SESSION['mensajeria']=0;

          }
          echo json_encode($fetch);
  break;

  case 'salir':
    //Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

  break;

  }

 ?>
 
