var tabla;

//FUNCION QUE SE EJECUTA AL INICIO
function init(){
  mostrarform(false);
  listar();
  $("#formulario").on("submit",function(e){
    guardaryeditar(e);
  })

  //CARGAMOS LOS ITEMS AL SELECT Cliente
  $.post("../controlador/correo_proveedor.php?op=selectProveedor",function (r){
    $("#idpersona").html(r);
    $("#idpersona").selectpicker('refresh');
  });



}
//FUNCION LIMPIAR
function limpiar() {

  $("#asunto").val("");
  $("#mensaje").val("");

  $("#idcorreo").val();


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
       url: '../controlador/correo_proveedor.php?op=listar',
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
     url: "../controlador/correo_proveedor.php?op=guardaryeditar",
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
 
init();
