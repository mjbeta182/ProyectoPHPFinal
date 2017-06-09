<!DOCTYPE>
<html lang="es">
    <meta charset="UTF-8">
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
include('../procesos/editorial.php');
$titulo = 'Editorial';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu($num);
?>
    
<div class="container-fluid">
	<div class="row3">
		 <div class="col-md-4">
          <h3 class=" text-center text-muted" id="heading">
        <strong> EDITORIAL</strong>
      </h3>
          <form>
          <div class="input-group" id="busqueda">
                  <input type="text" class="form-control" id="txtBuscar" name="txtBuscar" placeholder="Buscar" value="<?=$txtBuscar?>">
               <span class="input-group-addon" id="spanSearch">
               <button type="submit" class="fa fa-search"></button>
               </span>
            </div>
          </form>
          <form role="form" class="formulario" action="#" method="post">
          <label class="sr-only" for="user">Codigo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-lock"></i></span>
              <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
            </div>
            <br>
            <label class="sr-only" for="user">Nombre Editorial</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="txtNombreEditorial" name="txtNombreEditorial" placeholder="Nombre Editorial" value="<?=$txtNombreEditorial?>" required="true"">
            </div>
            <br>
            <label class="sr-only" for="user">Direccion</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" value="<?=$txtDireccion?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Telefono</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?=$txtTelefono?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Email</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo Electronico" value="<?=$txtEmail?>" required="true">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-warning" onclick='LimpiarEditorial();'>Nuevo</button>
            <button id="btnGuardar" name="btnGuardar" type="submit" class="btn btn-warning" onclick='return actualizarItem();'>Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
            <button type="submit" class="btn btn-warning">Imprimir Reporte</button>
            <button type="submit" class="btn btn-warning">Cancelar</button>
          </form>
        </div><!--fin de col-md-4-->
        <div class="col-md-8">  
            <table border="1" class="tabla">
              <?php mostrarDatos($bdConexion,$hCodigo,$txtNombreEditorial,$txtDireccion,$txtTelefono,$txtEmail,$txtBuscar); ?>
            </table>
      </div>
    </div><!--fin de row-->
  </div>
<?php
$bdConexion->desconectar(); 
?>
</html>

