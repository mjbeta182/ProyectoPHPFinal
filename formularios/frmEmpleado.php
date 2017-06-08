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
  print 'sesion exitosa';
  print $usuario;
}else{
  print 'fail la sesion';
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
include('../plantilla/plantillaMantenimiento.php');
include('../procesos/empleado.php');
$titulo = 'Empleado';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
<div class="container-fluid">
	<div class="row3">
		 <div class="col-md-4">
          <h3 class=" text-center text-muted" id="heading">
        <strong>EMPLEADO</strong>
      </h3>
            <form>
                <div class="input-group" id="busqueda">
              <input type="text" class="form-control" id="Buscar" name="Buscar" placeholder="Buscar" value="<?=$Buscar?>">
               <span class="input-group-addon" id="spanSearch">
                   <button type="submit" class="fa fa-search" onclick=""></button>
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
            <label class="sr-only" for="user">Nombre Completo</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-user-circle"></i></span>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" value="<?=$txtNombre?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Telefono</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono" value="<?=$txtTelefono?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Direccion</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" value="<?=$txtDireccion?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Tipo de Usuario</label>
            <div class="input-group"><span class="input-group-addon"><i class="fa fa-male"></i></span>
              <?php
                $bdConexion->llenarSelect("slcTipoUsuario","SELECT idTipoUsuario,nombreUsuario FROM tbltipousuario WHERE idTipoUsuario != 3 ",$slcTipoUsuario);
              ?>
            </div>
            <br>
             <label class="sr-only" for="user">Email</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" value="<?=$txtEmail?>" required="true">
            </div>
            <br>
                        <label class="sr-only" for="user">Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="text" class="form-control" id="txtContrasena" name="txtContrasena" placeholder="Contraseña" value="<?=$txtContrasena?>" required="true">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-warning" onclick='LimpiarEmpleado();'>Nuevo</button>
            <button id="btnGuardar" name="btnGuardar" type="submit" class="btn btn-warning" onclick='return actualizarItem();'>Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
            <button type="submit" class="btn btn-warning" onclick="javascript:frmImprimir();">Imprimir Reporte</button>
            <button type="submit" class="btn btn-warning">Cancelar</button>
          </form>
        </div><!--fin de col-md-4-->
        <div class="col-md-8">  
            <table border="1" class="tabla">
              <?php mostrarDatos($bdConexion,$hCodigo,$txtNombre,$txtDireccion,$txtTelefono,$slcTipoUsuario,$txtEmail,$txtContrasena,$Buscar); ?>
            </table>
      </div>
    </div><!--fin de row-->
  </div>
<?php
$bdConexion->desconectar(); 
?>
</html>
