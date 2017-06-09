<!DOCTYPE>
<html lang="en">
    <script>url="rptPedidoEmpleados.php"</script>
<?php
session_start();
if ((isset($_SESSION['usuario'])) && (isset($_SESSION['persona'])) && (isset($_SESSION['id'])))
{
  $idusuario = $_SESSION['id'];
  $usuario = $_SESSION['persona'];
  $dir = 'formularios/perfil.php';
  $num = $_SESSION['administrador'];
}else{
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
include('../plantilla/plantillaMantenimiento.php');
include('../procesos/pedido.php');
$titulo = 'Pedido';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu($num);
date_default_timezone_set("America/El_Salvador"); 
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
<div class="container-fluid">
	<div class="row3" >
		 <div class="col-md-6">
          <h3 class=" text-center text-muted" id="heading">
        <strong>PEDIDO</strong>
      </h3>
                     <form role="form" class="formulario" action="#" method="post" enctype="multipart/form-data" style="text-align: center;">
          
          <div class="input-group">
               <button type="submit" class="btn btn-warning fa fa-new" style="margin-top: 10%;"  onclick='LimpiarPedido();'>Nuevo Pedido</button>
              <button type="submit" class="btn btn-danger fa fa-times" title="Eliminar Pedido" name="btnEliminar" style="margin-top: 10%;"  >Cancelar Pedido</button>
              <button type="submit" class="btn btn-warning fa fa-print" style="margin-top: 10%;"  onclick="javascript:frmImprimir(url);">Imprimir Reporte</button>
          </div>
            <br>    
          <label class="sr-only" for="user">Codigo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-lock"></i></span>
              <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
            </div>
            <br>
            <label class="sr-only" for="user">Fecha de Pedido</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-edit"></i></span>
              <input type="text" class="form-control" id="txtFecha" name="txtFecha" placeholder="Fecha" value="<?= date("Y-m-d"); ?>" required="true" readonly="true">
            </div>
            <br>
             <label class="sr-only" for="user">Realiza el pedido:</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-edit"></i></span>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="" value="<?=$usuario?>" required="true">
              <input type="hidden" class="form-control" id="txtidusuario" name="txtidusuario" value="<?=$idusuario?>">
            </div>
            <br>
              <label class="sr-only" for="user">Hora:</label>
            <div class="input-group">
              <span class="input-group-addon"><i class=" fa fa-clock-o"></i></span>
              <input type="text" class="form-control" id="txtHora" name="txtHora" placeholder="Hora" value="<?php  $time = time(); echo date("h:i:s", $time) ?>" required="true">
            </div>
              <br>
              <input type="hidden" class="form-control" id="txtEntrega" name="txtEntrega" placeholder="entrega" value="<?= date("2017-06-30"); ?>" required="true">   
            <br>
            <label class="sr-only" for="user"  >Agregar Editorial</label>
            <div class="input-group"style="width:100%;" >
              <?php
                $bdConexion->llenarSelect("slcEditorial","SELECT * FROM tblEditorial ",
                  $slcEditorial);
              ?> 
            </div>
            <br>
            <button name="btnCrear" type="submit" value="Crear Pedido" style="width:100%;"
            		class="btn btn-warning" id="btnCrear" title="Crea pedido para ingresar libros" >Crear Pedido
            </button>
             <br>
           
            <br>
             <h3>Agregar Libros</h3>
            <div class="input-group" style="margin:auto;" >
              <?php
                $bdConexion->llenarSelect("slcLibro","SELECT * FROM tbllibro WHERE idEditorial=$slcEditorial",
                  $slcLibro);
              ?> 
                <label class="sr-only" for="user">Cantidad</label>
            
              <input type="text" class="form-control" id="txtCantidad" name="txtCantidad" placeholder="Cantidad" value="<?=$txtCantidad?>" >
           
            </div>
            
            <br>
            <br>
            <br>
            <button id="btnAgregar" name="btnAgregar" type="submit" class="btn btn-warning">Agregar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
          </form>    
        </div><!--fin de col-md-4-->
            <div class="col-md-6">  
            <table border="1" class="tabla" style="font-size:12px;">
              <?php mostrarDetalle($bdConexion,$hCodigo,$txtNombre,$txtCantidad,$txtFecha,$txtEntrega,$hora,$slcEditorial,$slcLibro); ?>
            </table>
      </div>
    </div><!--fin de row-->
  </div>
<?php
$bdConexion->desconectar(); 
?>
</html>
