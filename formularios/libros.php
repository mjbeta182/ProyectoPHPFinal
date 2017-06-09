<!DOCTYPE>
<html lang="es">
    <meta charset="UTF-8">
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
if(isset($_REQUEST['idCat'])?$_REQUEST['idCat']:0){
    $categoria = $_REQUEST['idCat'];
    switch ($categoria)
    {
    case 1: $HEADING = 'TECNOLOGÍA'; break;
    case 2: $HEADING = 'DRAMA'; break;
    case 3: $HEADING = 'LIRICA'; break;
    case 4: $HEADING = 'SALUD'; break;
    case 5: $HEADING = 'CIENCIA'; break;
    case 6: $HEADING = 'THRILLER'; break;
    case 7: $HEADING = 'ROMANCE'; break;
    case 8: $HEADING = 'AVENTURA'; break;
    case 9: $HEADING = 'TERROR'; break;
    case 10: $HEADING = 'CIENCIA FICCION'; break;
    case 11: $HEADING = 'INVESTIGACION'; break;
    case 12: $HEADING = 'INFANTIL'; break;
    case 13: $HEADING = 'AUTOAYUDA'; break;
    case 14: $HEADING = 'COCINA'; break;
    case 15: $HEADING = 'DEPORTES'; break;
    default : $HEADING = 'RECOMENDADOS'; break;
    }
}
include('../plantilla/plantillaCliente.php');
include('../procesos/catalogoLibros.php');
$titulo = 'LIBRARY';
$puntos = '../';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
$PantallaCliente->slide();
?>
<!--///////////CATALOGO DE LIBROS ////////////-->
	<div class="row3">
		<div class="col-md-12">
			<h3 class="text-center text-muted" id="heading">
				<strong><?=$HEADING?></strong>
			</h3>
		</div>
	</div>
	<div class="row3">
		<div class="col-md-12">
			<?php catalogo($bdConexion,$categoria); ?>
		</div>
	</div>
<?php
$PantallaCliente->presentacion();
$PantallaCliente->footer();
?>
</html>