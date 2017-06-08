<?php
include ('../clases/conexion.php');

date_default_timezone_set('America/El_Salvador');

$hCodigo    =   (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);

$sql="select tbllibro.idLibro, tbllibro.titulo, tblautor.nombreAutor,tbllibro.stock,tbllibro.precioCosto from tbllibro 
inner join tbldetlibroautor on tbllibro.idLibro = tbldetlibroautor.idLibro 
inner join tblautor on tbldetlibroautor.idAutor=tblautor.idAutor";

$rsDetalles = $bdConexion->ejecutarSQL($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="../css/styleReport.css"/>
	<title>Reporte de Libros</title>
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
					<th scope="col"><strong>CODIGO</strong></th>
                                        <th scope="col"><strong>TITULO LIBRO</strong></th>
					<th scope="col"><strong>NOMBRE AUTOR</strong></th>
					<th scope="col"><strong>STOCK</strong></th>
                                        <th scope="col"><strong>PRECIO COSTO</strong></th>
				</tr>
				<?php
				while ($detalle = mysqli_fetch_array($rsDetalles)) 
				{
					print "
					<tr>
						<td align='center'>".$detalle['idLibro']."</td>
						<td align='center'>".$detalle['titulo']."</td>
						<td align='center'>".$detalle['nombreAutor']."</td>
						<td align='center'>".$detalle['stock']."</td>
						<td align='center'>".$detalle['precioCosto']."</td>
					</tr>";
				}
				?>
			</table>
		</td>
	</tr>
	</table>
</body>
</html>

