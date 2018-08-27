<?php
  //Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.php");
}
else
{
  require 'header.php';
  if ($_SESSION['acceso']==1)
   {
    
  
 ?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Usuario <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"  id="listadoregistros">
                      <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Opciones</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Número</th>
                          <th>Telefono</th>
                          <th>Email</th>                       
                          <th>Login</th>
                          <th>Foto</th>
                          <th>Estado</th>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                          <th>Opciones</th>
                          <th>Nombre</th>
                          <th>Documento</th>
                          <th>Número</th>
                          <th>Telefono</th>
                          <th>Email</th>                       
                          <th>Login</th>
                          <th>Foto</th>
                          <th>Estado</th>
                        </tfoot>
                      </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                       
                    <form class="" id="formulario" name="formulario" action="" method="post">
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idusuario" id="idusuario" value="">
                            <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" value="" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Documento(*):</label>
                            <select class="form-control select-picker " name="tipo_documento" >
                              
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>
                              <option value="CEDULA">CEDULA</option>

                            </select>  
                          
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Número(*):</label>
                            
                            <input class="form-control" type="text" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento" value="" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direccion:</label>
                            
                            <input class="form-control" type="text" name="direccion" id="direccion" maxlength="70" placeholder="Direccion" value="" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono:</label>
                            
                            <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="Telefono" value="" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Email:</label>                            
                            <input class="form-control" type="email" name="email" id="email" maxlength="50" placeholder="Email" value="" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Cargo:</label>
                            
                            <input class="form-control" type="text" name="vendedor" id="vendedor" maxlength="20" placeholder="Cargo" value="" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Login(*):</label>
                            
                            <input class="form-control" type="text" name="login" id="login" maxlength="20" placeholder="Login" value="" required="">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Clave(*):</label>
                            
                            <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave" value="" required="">
                          </div>
                   
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Permisos: </label>
                            <ul id="permisos" style="list-style: none;">
                              
                            </ul>

                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input class="form-control" type="file" name="imagen" id="imagen" value="">
                            <input type="hidden" name="imagenActual"
                            id="imagenActual">
                            <img src="" width="150px" height="120px" id="imagenMuestra">
                          </div>
                        
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" id="btnGuardar" type="submit"  name="btnGuardar"> <i class="fa fa-save"></i>Guardar</button>
                            <button class="btn btn-danger" type="button" onclick="cancelarform()" name="button"> <i class="fa fa-arrow-circle-left"></i>Cancelar </button>

                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
 <?php
  }
  else 
  {
    require 'noacceso.php';
  }
   require 'footer.php';
   ?>
   <script type="text/javascript" src="scripts/usuario.js">

   </script>
   <?php 
   }
   ob_end_flush(); 
   ?>
