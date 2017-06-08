<?php

include("../clases/conexion.php");

date_default_timezone_set("America/El_Salvador");

$hCodigo	=	(isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);

$sql = "select tblpersona.idPersona,tblpersona.nombre,tblpersona.direccion,tbltipousuario.nombreUsuario,tblusuario.email from tblpersona 
inner join tblusuario on tblpersona.idPersona = tblusuario.idPersona 
inner join tbltipousuario on tbltipousuario.idTipoUsuario = tblusuario.idTipoUsuario";

	$rsDetalles = $bdConexion->ejecutarSQL($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Reporte de Empleados</title>
</head>
<body onload="window.print();">
	<table border="0" align="center" style="margin-top:10px; width:500px;">
	<tr>
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
			<div style="float: right;">
				<p align="right">Generando:<?=date("d/m/y g:i a")?></p>
			</div>
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<th scope="col"><strong>CODIGO</strong></th>
                                        <th scope="col"><strong>NOMBRE</strong></th>
					<th scope="col"><strong>DIRECCION</strong></th>
					<th scope="col"><strong>USUARIO</strong></th>
					<th scope="col"><strong>EMAIL</strong></th>
				</tr>
				<?php
				while ($detalle = mysqli_fetch_array($rsDetalles)) 
				{
					print "
					<tr>
						<td align='center'>".$detalle['idPersona']."</td>
						<td align='center'>".$detalle['nombre']."</td>
						<td align='center'>".$detalle['direccion']."</td>
						<td align='center'>".$detalle['nombreUsuario']."</td>
						<td align='center'>".$detalle['email']."</td>
					</tr>";
				}
				?>
			</table>
		</td>
	</tr>
	</table>
</body>
</html>

