var tabla;

//FUNCION QUE SE EJECUTA AL INICIO
function init(){  
  mostrarform(false);
  listar();
  $("#formulario").on("submit",function(e){
    guardaryeditar(e);
  })

  //LA IMAGEN NO ESTA VISIBLE
  $("#imagenMuestra").hide();

  //MOSTRAMOS LOS PERMISOS 
  $.post("../controlador/usuario.php?op=permisos&id=",function(r){
    $("#permisos").html(r);
  });

}
//FUNCION LIMPIAR
function limpiar() {
  $("#nombre").val(""); 
  $("#num_documento").val("");
  $("#direccion").val("");
  $("#telefono").val("");
  $("#email").val("");
  $("#cargo").val("");
  $("#login").val("");
  $("#clave").val("");
  $("#imagenMuestra").attr("src","");
  $("#imagenActual").val("");
  $("#permisos").val("");
  $("#idusuario").val("");


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
       url: '../controlador/usuario.php?op=listar',
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
     url: "../controlador/usuario.php?op=guardaryeditar",
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
 function mostrar(idusuario) {
   $.post("../controlador/usuario.php?op=mostrar",{idusuario : idusuario},function(data,status){
     data= JSON.parse(data);
     mostrarform(true);
     
      $("#nombre").val(data.nombre);
      $("#tipo_documento").val(data.tipo_documento);
      $("#tipo_documento").selectpicker('refresh');
      $("#num_documento").val(data.num_documento);
      $("#direccion").val(data.direccion);
      $("#telefono").val(data.telefono);
      $("#email").val(data.email);
      $("#cargo").val(data.cargo);
      $("#login").val(data.login);
      $("#clave").val(data.clave);
      $("#imagenMuestra").show();
      $("#imagenMuestra").attr("src","../files/usuarios/"+data.imagen);
      $("#imagenActual").val(data.imagen);
      $("#idusuario").val(data.idusuario);

      
   });
    $.post("../controlador/usuario.php?op=permisos&id="+idusuario,function(r){
    $("#permisos").html(r);
  })
 }
 //FUNCION PARA DESACTIVAR REGISTROS
 function desactivar(idusuario){
   bootbox.confirm("Esta seguro de desactivar el usuario?",function(result){
     if (result) {
       $.post("../controlador/usuario.php?op=desactivar",{idusuario:idusuario},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
   })
 }
 //FUNCION PARA ACTIVAR REGISTROS
 function activar(idusuario){
   bootbox.confirm("Esta seguro de activar el usuario?",function(result){
     if (result) {
       $.post("../controlador/usuario.php?op=activar",{idusuario:idusuario},function(e){
         bootbox.alert(e);
         tabla.ajax.reload();
       });
     }
   })
 }



init();
