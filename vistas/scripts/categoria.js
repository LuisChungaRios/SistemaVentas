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
  $("#idcategoria").val("");
  $("#nombre").val("");
  $("#descripcion").val("");
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
     "Processing":true,//Activamos el procesamiento del datatables
     "ServerSide":true,//Paginacion y filtrado realizados por el servidor
     dom: 'Bfrtip',//Definimos  los elementos del control de tabla
     buttons: [
       'copyHtml5',
       'excelHtml5',
       'csvHtml5',
       'pdf'
     ],
     "ajax": {
       url: '../controlador/categoria.php?op=listar', //De donde voy a traer los datos
       type: "get", // no se modifica nada en el servidor
       dataType: "json",//Tipo de dato que se espera como respuesta
       
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
     url: "../controlador/categoria.php?op=guardaryeditar",
     type: "POST", //se modifica el contenido del servidor
     data: formData,
     contentType: false,//indica a jquery que no se configure nada
     processData: false, //indica si se transforma la opcion data a texto 

     success: function(datos){ //funcion que se ejecuta cuando la peticion se ha realizado de forma correcta
       bootbox.alert(datos);
       mostrarform(false);
       tabla.ajax.reload();
     }
   });
   limpiar();
 }
 function mostrar(idcategoria) {
   $.post("../controlador/categoria.php?op=mostrar",{idcategoria : idcategoria},function(data,status){
     data= JSON.parse(data);
     mostrarform(true);
     $("#nombre").val(data.nombre);
     $("#descripcion").val(data.descripcion);
     $("#idcategoria").val(data.idcategoria);
   })
 }
 //FUNCION PARA DESACTIVAR REGISTROS
 function desactivar(idcategoria){
   bootbox.confirm("Esta seguro de desactivar la categoria?",function(result){
     if (result) {
       $.post("../controlador/categoria.php?op=desactivar",{idcategoria:idcategoria},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
   })
 }
 //FUNCION PARA ACTIVAR REGISTROS
 function activar(idcategoria){
   bootbox.confirm("Esta seguro de activar la categoria?",function(result){
     if (result) {
       $.post("../controlador/categoria.php?op=activar",{idcategoria:idcategoria},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
     })
 }
init();
