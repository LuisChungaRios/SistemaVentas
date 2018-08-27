var tabla;

//FUNCION QUE SE EJECUTA AL INICIO
function init(){
  mostrarform(false);
  listar();
  $("#formulario").on("submit",function(e){
    guardaryeditar(e);
  })

  //CARGAMOS LOS ITEMS AL SELECT CATEGORIA
  $.post("../controlador/articulo.php?op=selectCategoria",function (r){
    $("#idcategoria").html(r);
    $("#idcategoria").selectpicker('refresh');
  });

  //LA IMAGEN NO ESTA VISIBLE
  $("#imagenMuestra").hide();

}
//FUNCION LIMPIAR
function limpiar() {

  $("#codigo").val("");
  $("#nombre").val("");
  $("#descripcion").val("");
  $("#stock").val("");
  $("#imagenMuestra").attr("src","");
  $("#imagenActual").val("");
  $("#print").hide();
  $("#idarticulo").val();


}
//FUNCION MOSTRAR FORMULARIO
 function mostrarform(flag){
   limpiar();
   if(flag){
     $("#listadoregistros").hide();
     $("#formularioregistros").show();
     $("#btnGuardar").prop("disabled",false);
     $("#btnagregar").hide();
   }
   else {
     $("#listadoregistros").show();
     $("#formularioregistros").hide();
     $("#btnagregar").show();
   }
 }
 //funcion cancelar formularioregistros
 function cancelarform(){
   limpiar();
   mostrarform(false);
 }
 //FUNCION LISTAR
 function listar() {
   tabla=$('#tbllistado').dataTable({
     "aProcessing":true,//Activamos el procesamiento del datatables
     "aServerSide":true,//Paginacion y filtrado realizados por el servidor
     dom: 'Bfrtip',//Definimos  los elementos del control de tabla
     buttons: [
       'copyHtml5',
       'excelHtml5',
       'csvHtml5',
       'pdf'
     ],
     "ajax": {
       url: '../controlador/articulo.php?op=listar',
       type: "get",
       dataType: "json",
       error: function(e){
         console.log(e.responseText);
       }
     },
     "bDestroy": true,
     "iDisplayLength": 5,//Paginacion
     "order":[[0,"desc"]]//ordenar(columna,orden)

   }).DataTable();
 }
 //FUNCION PARA GUARDAR O editar
 function guardaryeditar(e) {
   e.preventDefault(); //NO SE ACTIVARA LA ACCION PREDETERMINADA DEL EVENTO
   $("#btnGuardar").prop("disabled",true);
   var formData = new FormData($("#formulario")[0]);
   $.ajax({
     url: "../controlador/articulo.php?op=guardaryeditar",
     type: "POST",
     data: formData,
     contentType: false,
     processData: false,

     success: function(datos){
       bootbox.alert(datos);
       mostrarform(false);
       tabla.ajax.reload();
     }
   });
   limpiar();
 }
 function mostrar(idarticulo) {
   $.post("../controlador/articulo.php?op=mostrar",{idarticulo : idarticulo},function(data,status){
     data= JSON.parse(data);
     mostrarform(true);
      $("#idcategoria").val(data.idcategoria);
      $("#idcategoria").selectpicker('refresh');
      $("#codigo").val(data.codigo);
      $("#nombre").val(data.nombre);
      $("#stock").val(data.stock);
      $("#descripcion").val(data.descripcion);
      $("#imagenMuestra").show();
      $("#imagenMuestra").attr("src","../files/articulos/"+data.imagen);
      $("#imagenActual").val(data.imagen);
      $("#idarticulo").val(data.idarticulo);
    generarBarcode();
   })
 }
 //FUNCION PARA DESACTIVAR REGISTROS
 function desactivar(idarticulo){
   bootbox.confirm("Esta seguro de desactivar el articulo?",function(result){
     if (result) {
       $.post("../controlador/articulo.php?op=desactivar",{idarticulo:idarticulo},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
   })
 }
 //FUNCION PARA ACTIVAR REGISTROS
 function activar(idarticulo){
   bootbox.confirm("Esta seguro de activar el articulo?",function(result){
     if (result) {
       $.post("../controlador/articulo.php?op=activar",{idarticulo:idarticulo},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
   })
 }

//FUNCION PARA GENERAR CODIGO DE BARRAS
function generarBarcode() {
  codigo=$("#codigo").val();
  JsBarcode("#barcode",codigo);
  $("#print").show();
}

//FUNCION PARA IMPRIMIR CODIGO DE BARRAS

  function imprimir() {
    $("#print").printArea();
  }

init();
