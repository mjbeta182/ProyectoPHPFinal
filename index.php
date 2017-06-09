<!DOCTYPE>
<html lang="en">
<?php
session_start();
if ((isset($_SESSION['persona'])) && (isset($_SESSION['id']))) {

	$idusuario = $_SESSION['id'];
	$usuario = $_SESSION['persona'];
	$dir = 'formularios/perfil.php';
}else{
	$usuario = 'Acceder Registrarse';
	$dir = 'formularios/frmAcceder.php';
}
include('plantilla/plantillaCliente.php');
$titulo = 'LIBRARY';
$puntos = '';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
$PantallaCliente->slide();
$PantallaCliente->presentacion();
$PantallaCliente->footer();

?>
</html>