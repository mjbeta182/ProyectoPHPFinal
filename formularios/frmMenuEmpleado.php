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
  $_SESSION['administrador'] = 2;
  $num = $_SESSION['administrador'];
}else{
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
include('../plantilla/plantillaMantenimiento.php');
include('../procesos/autor.php');
$titulo = 'Bienvenido a Library';
$puntos = '../';
$PantallaCliente = new PantallaMantenimiento($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu($num);
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
<div class="container-fluid">
	<div class="row3">
            <div class='col-md-12' >
		<article>
			<img class='image' style="width: 100%;" src="../imagenes/bg2.jpg">
			<div class='overlay'>
			<div class='text '>
                            <p><?=$usuario?></p>
                        </div> 
 
   			</div>
		</article>		
		</div>
    </div><!--fin de row-->
 </div>
<?php
$bdConexion->desconectar(); 
?>
</html>
