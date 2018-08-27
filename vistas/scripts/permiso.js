var tabla;

//FUNCION QUE SE EJECUTA AL INICIO
function init(){
  mostrarform(false);
  listar();
 
}

//FUNCION MOSTRAR FORMULARIO
 function mostrarform(flag){
  // limpiar();
   if(flag){
     $("#listadoregistros").hide();
     $("#formularioregistros").show();
     $("#btnGuardar").prop("disabled",false);
      $("#btnagregar").hide();
   }
   else {
     $("#listadoregistros").show();
     $("#formularioregistros").hide();
      $("#btnagregar").hide();
   }
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
       url: '../controlador/permiso.php?op=listar',
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
 
init();
