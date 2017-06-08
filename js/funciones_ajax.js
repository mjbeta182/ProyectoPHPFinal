/*Funcion usada para aceptar solo numeros*/
function decimal(e)
{
	if(window.event)
		var keynum = e.keyCode
	else if(e.which)

	var keynum = e.which
	if (keynum > 33 && (keynum < 48 || keynum > 57) && keynum!=46)
	return false;
}
//************************************************************************************************
function soloLetras(e) {
    
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-zñÑ]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
    
}
//************************************************************************************************
function soloNumeros(e)
{
	if(window.event)
		var keynum = e.keyCode
	else if(e.which)

	var keynum = e.which
	if (keynum < 48 || keynum > 57)
	return false;
}
//************************************************************************************************
function validarTel(e){
  tecla = (document.all) ? e.keyCode : e.which;
  tecla = String.fromCharCode(tecla)
  return /^[0-9\-]+$/.test(tecla);
}
//************************************************************************************************
function confirmar()
{
  //Confirmacion de la acción a realizar.
  var confirmacion = confirm ("Finalizar Factura");
  
  if (confirmacion)
  {
	  window.location.href="index.php";
  }

  return false;
}//Fin de función

//************************************************************************************************
function eliminarItem()
{
	return confirm("¿Desea eliminar el registro seleccionado?")
}//function
//************************************************************************************************
function actualizarItem()
{
	var accion =	$('#accion').val();
  
  if (accion == "update")
  {
	 return confirm("¿Desea actualizar el registro seleccionado?")
  }
}//function

//************************************************************************************************
function frmImprimir()
{
    var id	=	$('#hfacturaId').val();
	window.open('../reportes/rptFactura.php?facturaId='+id,'Vista');
}
//************************************************************************************************
function LimpiarTipoUsuario()
{
   accion	=   $('#accion').val("insert");
   codigo       =   $('#hCodigo').val(null);
   tipo		=   $('#txtTipo').val(null);

}
function LimpiarEmpleado()
{
   accion	=	$('#accion').val("insert");
   codigo   	=	$('#hCodigo').val(null);
   nombre	=	$('#txtNombre').val(null);
   telefono	=	$('#txtTelefono').val(null);
   direccion	=	$('#txtDireccion').val(null);
   email	=	$('#txtEmail').val(null);
   contrasena	=	$('#txtContrasena').val(null);
   
}
//***************************************************************************************************
function LimpiarCategoria()
{
    
   accion   =	$('#accion').val("insert");
   codigo   =	$('#hCodigo').val(null);
   categoria=	$('#txtCategoria').val(null);
   
}
//***************************************************************************************************
function LimpiarEditorial()
{
    
   accion               =   $('#accion').val("insert");
   codigo               =   $('#hCodigo').val(null);
   txtNombreEditorial   =   $('#txtNombreEditorial').val(null);
   txtDireccion         =   $('#txtDireccion').val(null);
   txtTelefono          =   $('#txtTelefono').val(null);
   txtEmail             =   $('#txtEmail').val(null);
   
}
//***************************************************************************************************
function LimpiarLibro()
{
    
   accion           =   $('#accion').val("insert");
   codigo               =   $('#hCodigo').val(null);
   txtTitulo        =   $('#txtTitulo').val(null);
   txtStock         =   $('#txtStock').val(null);
   txtDescripcion   =   $('#txtDescripcion').val(null);
   txtPalabras      =   $('#txtPalabras').val(null);
   txtCosto         =   $('#txtCosto').val(null);
   archivo          =   $('#archivo').val(null);
   slcAutor         =   $('#slcAutor').val(null);
   slcEditorial     =   $('#slcEditorial').val(null);
   slcCategoria     =   $('#slcCategoria').val(null);
   
}
//***************************************************************************************************
function LimpiarNacionalidad()
{
    
   accion           =   $('#accion').val("insert");
   codigo           =   $('#hCodigo').val(null);
   txtNacionalidad  =   $('#txtNacionalidad').val(null);
   
}
//***************************************************************************************************
function LimpiarAutor()
{
    
   accion           =   $('#accion').val("insert");
   codigo           =   $('#hCodigo').val(null);
   slcNacionalidad  =   $('#slcNacionalidad').val(null);
   txtNombre        =   $('#txtNombre').val(null);
   
}
//***************************************************************************************************
function frmImprimir(url)
{
    var id	=	$('#hCodigo').val();
	window.open('../reportes/'+url+'?hCodigo='+id,'Vista');
}
//***************************************************************************************************
//function existeFecha (fecha) {
//	  var fechaf = fecha.split("/");
//	  var d = fechaf[0];
//	  var m = fechaf[1];
//	  var y = fechaf[2];
//	  return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
//
//
//function validarFechaMenorActual(date){
//	var x=new Date();
//	var fecha = date.split("/");
//	x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
//	var today = new Date();
//
//	if (x >= today)
//	  return false;
//	else
//	  return true;
//}
