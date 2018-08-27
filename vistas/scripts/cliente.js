var tabla;

//FUNCION QUE SE EJECUTA AL INICIO
function init(){
  mostrarform(false);
  listar();
  $("#formulario").on("submit",function(e){
    guardaryeditar(e);
  })
}
//FUNCION LIMPIAR
function limpiar() {
  $("#nombre").val("");
  $("#num_documento").val("");
  $("#direccion").val("");
  $("#telefono").val("");
  $("#email").val("");
  $("#idpersona").val("");
  
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
       url: '../controlador/persona.php?op=listarc',
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
     url: "../controlador/persona.php?op=guardaryeditar",
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
 function mostrar(idpersona) {
   $.post("../controlador/persona.php?op=mostrar",{idpersona : idpersona},function(data,status){
     data= JSON.parse(data);
     mostrarform(true);
    $("#nombre").val(data.nombre);
    $("#tipo_documento").val(data.tipo_documento);
    $("#tipo_documento").selectpicker('refresh');
    $("#num_documento").val(data.num_documento);
    $("#direccion").val(data.direccion);
    $("#telefono").val(data.telefono);
    $("#email").val(data.email);
    $("#idpersona").val(data.idpersona);
 
   })
 }
 //FUNCION PARA ELIMINAR REGISTROS
 function eliminar(idpersona){
   bootbox.confirm("Esta seguro de eliminar el Cliente?",function(result){
     if (result) {
       $.post("../controlador/persona.php?op=eliminar",{idpersona:idpersona},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
   })
 }

init();
