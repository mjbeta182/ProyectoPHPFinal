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
include('../procesos/autor.php');
$titulo = 'Autor';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu($num);
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
<div class="container-fluid">
	<div class="row3">
		 <div class="col-md-4">
          <h3 class=" text-center text-muted" id="heading">
        <strong>AUTOR</strong>
      </h3><form>
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
            <label class="sr-only" for="user">Nombre Autor</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="  fa fa-user-circle"></i></span>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre Autor" value="<?=$txtNombre?>" required="true">
            </div>
            <br>
            <label class="sr-only" for="user">Nacionalidad</label>
            <div class="input-group">
              <?php
                $bdConexion->llenarSelect("slcNacionalidad","SELECT idNacionalidad, nombreNacionalidad FROM tblnacionalidad WHERE idNacionalidad !=''",$slcNacionalidad);
              ?>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-warning" onclick='LimpiarAutor();'>Nuevo</button>
            <button id="btnGuardar" name="btnGuardar" type="submit" class="btn btn-warning" onclick='return actualizarItem();'>Guardar</button>
            <input type="hidden" id="accion" name="accion" value="<?=$accion?>" >
<!--            <button type="submit" class="btn btn-warning">Imprimir Reporte</button>-->
<!--            <button type="submit" class="btn btn-warning">Cancelar</button>-->
          </form>
        </div><!--fin de col-md-4-->
        <div class="col-md-8">  
            <table border="1" class="tabla">
              <?php mostrarDatos($bdConexion,$hCodigo,$txtNombre,$slcNacionalidad,$txtBuscar); ?>
            </table>
      </div>
    </div><!--fin de row-->
  </div>
<?php
$bdConexion->desconectar(); 
?>
</html>
