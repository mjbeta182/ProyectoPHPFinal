<?php

include("../clases/conexion.php");

date_default_timezone_set("America/El_Salvador");

$hCodigo	=	(isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);

$sql = "select * from tbleditorial";

	$rsDetalles = $bdConexion->ejecutarSQL($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="../css/styleReport.css"/>
	<title>Reporte de Editorial</title>
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
                            Generado:<?=date("d/M/Y")?><br>
			</div>
                        <div style="float: right;">
                                <?php $time = time(); echo date("g:i a", $time)?>
			</div>
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<th scope="col"><strong>CODIGO EDITORIAL</strong></th>
                                        <th scope="col"><strong>NOMBRE EDITORIAL</strong></th>
					<th scope="col"><strong>DIRECCION</strong></th>
                                        <th scope="col"><strong>TELEFONO</strong></th>
					<th scope="col"><strong>EMAIL</strong></th>
				</tr>
				<?php
				while ($detalle = mysqli_fetch_array($rsDetalles)) 
				{
					print "
					<tr>
						<td align='center'>".$detalle['idEditorial']."</td>
						<td align='center'>".$detalle['nombreEditorial']."</td>
						<td align='center'>".$detalle['direccion']."</td>
                                                <td align='center'>".$detalle['telefono']."</td>
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

