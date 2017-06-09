<?php

include("../clases/conexion.php");

date_default_timezone_set("America/El_Salvador");

$hCodigo	=	(isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);

$sql = "select tbldetpedido.idPedido, tbllibro.titulo, tbldetpedido.cantidad,tbllibro.precioCosto, tbldetpedido.total from tbldetpedido
inner join tbllibro on tbldetpedido.idLibro=tbllibro.idLibro and tbldetpedido.idPedido = $hCodigo";

	$rsDetalles = $bdConexion->ejecutarSQL($sql);
        
?>
<!--Mostrar nombre del empleado en factura-->
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
?> <!--Fin de mostrar empleado-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="../css/styleReport.css"/>
	<title>Reporte de Pedidos</title>
</head>
<body onload="window.print();">
	<table border="0" align="center" style="margin-top:10px; width:500px;">
	<tr style="background-color: white;">
		<td>
			<div>
				<img src="../imagenes/1.jpg" height="8%" width="200">
			</div>
			<div style="width: 500px;">
				<strong>
					LYBRARY "DESIGN YOUR WORLD"<BR>
					FACTURA COMERCIAL
				</strong>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div style="float: left;">
                            Empleado: <?=$usuario?><br>
                            Generado:<?=date("d/M/Y")?><br>
			</div>
                        <div style="float: right;">
                                <?php $time = time(); echo date("g:i a", $time)?>
			</div>
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<th scope="col"><strong>CODIGO PEDIDO</strong></th>
                                        <th scope="col"><strong>NOMBRE LIBRO</strong></th>
					<th scope="col"><strong>CANTIDAD LIBROS</strong></th>
                                        <th scope="col"><strong>PRECIO COSTO</strong></th>
					<th scope="col"><strong>TOTAL</strong></th>
				</tr>
				<?php
				while ($detalle = mysqli_fetch_array($rsDetalles)) 
				{
					print "
					<tr>
						<td align='center'>".$detalle['idPedido']."</td>
						<td align='center'>".$detalle['titulo']."</td>
						<td align='center'>".$detalle['cantidad']."</td>
                                                <td align='center'>".$detalle['precioCosto']."</td>
						<td align='center'>".$detalle['total']."</td>
					</tr>";
				}
				?>
			</table>
		</td>
	</tr>
	</table>
</body>
</html>