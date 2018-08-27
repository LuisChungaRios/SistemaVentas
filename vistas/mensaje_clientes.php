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
  if ($_SESSION['mensajeria']==1)
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
                          <h1 class="box-title">Mensajes Cliente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)" ><i class="fa fa-plus-circle"></i> Agregar</button>  </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"  id="listadoregistros">
                      <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        
                          <th>Cliente</th>
                          <th>Asunto</th>
                          <th>Mensaje</th>
                          <th>Fecha</th>
                                           
                          <!-- <th>Estado</th> -->
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                       
                          <th>Cliente</th>
                          <th>Asunto</th>
                          <th>Mensaje</th>
                          <th>Fecha</th>
                           
                        </tfoot>
                      </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                       
                                <form class="" id="formulario" name="formulario" action="" method="post">
                         
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cliente(*):</label>
                           <select id="idpersona" name="idpersona" class="form-control selectpicker" data-live-search="true" required=""></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Asunto(*):</label>
                            
                            <input class="form-control" type="text" name="asunto" id="asunto" maxlength="100" placeholder="Asunto" value="" required>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Mensaje(*):</label>
                           
                            <textarea name="mensaje" id="mensaje" cols="120" rows="5"></textarea>
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
  <script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
   <script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
   <script type="text/javascript" src="scripts/correo.js"></script>
   <?php 
   }
   ob_end_flush(); 
   ?>