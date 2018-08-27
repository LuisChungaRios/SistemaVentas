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
  if ($_SESSION['almacen']==1)
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
                          <h1 class="box-title">Articulo <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)" ><i class="fa fa-plus-circle"></i> Agregar</button> <a  target="_blank" href="../reportes/rptarticulos.php"> <button class="btn btn-info">Reporte</button></a>  </h1>
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
                          <th>Categoria</th>
                          <th>Codigo</th>
                          <th>Stock</th>
                          <th>Imagen</th>                       
                          <th>Estado</th>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                          <th>Opciones</th>
                          <th>Nombre</th>
                          <th>Categoria</th>
                          <th>Codigo</th>
                          <th>Stock</th>
                          <th>Imagen</th>                       
                          <th>Estado</th>
                        </tfoot>
                      </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                       
                                <form class="" id="formulario" name="formulario" action="" method="post">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idarticulo" id="idarticulo" value="">
                            <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" value="" required>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoria(*):</label>
                           <select id="idcategoria" name="idcategoria" class="form-control selectpicker" data-live-search="true" required=""></select>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock(*):</label>
                            
                            <input class="form-control" type="number" name="stock" id="stock" value="" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripcion:</label>

                            <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripcion" value="">
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input class="form-control" type="file" name="imagen" id="imagen" value="">
                            <input type="hidden" name="imagenActual"
                            id="imagenActual">
                            <img src="" width="150px" height="120px" id="imagenMuestra">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" value="" placeholder="codigo de barras">
                            <button class="btn btn-success" type="button" onclick="generarBarcode()" >Generar </button>
                            <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir</button>
                            <div id="print">
                              <svg id="barcode"></svg>
                            </div>
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
   <script type="text/javascript" src="scripts/articulo.js"></script>
   <?php 
   }
   ob_end_flush(); 
   ?>