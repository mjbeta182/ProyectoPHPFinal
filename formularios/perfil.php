<!DOCTYPE>
<html lang="es">
    <meta charset="UTF-8">
<?php
session_start(); 
if ((isset($_SESSION['persona'])) && (isset($_SESSION['id'])))
{
  $idusuario = $_SESSION['id'];
  $usuario = $_SESSION['persona'];
  $dir = 'formularios/perfil.php';
  print 'sesion exitosa';
  print $idusuario;
}else{
  print 'fail la sesion';
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
//Archivo que tiene la pantalla y estilo por parte del cliente
include('../plantilla/plantillaCliente.php');
include('../procesos/perfilUsuario.php');
$titulo = 'Acceder / Registrarse';
$puntos = '../';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
	<div class="row3">
		<div class="col-md-12">
			<h3 class="text-center text-muted" id="heading">
				<strong>MI PERFIL </strong>
			</h3>
		</div>
	</div>
  <div class="row3">
     <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Datos Personales</a></li>
        <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Prestamos</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
          <h3>DATOS PERSONALES</h3>
          <hr>  
            <div class="col-md-12">  
            <table border="1" class="tabla" style="width:100%;">
              <?php mostrarDatos($bdConexion,$idusuario); ?>
            </table>
           </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="register">
          <h3>PRESTAMOS</h3>
          <hr>
          <div class="col-md-12">  
            <table border="1" class="tabla" style="width:100%;">
              <?php mostrarPrestamos($bdConexion,$idusuario); ?>
            </table>
           </div>
        </div>
      </div>
    </div>
  </div>
<?php
$PantallaCliente->footer();
?>
</html>
