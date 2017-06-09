<?php
include('../clases/conexion.php');
function mostrarDatos($bdConexion,$idusuario)
{
	$sqlMostrar = "SELECT 
	p.idPersona,
	p.nombre,
	p.telefono,
	p.direccion,
	u.idPersona,
	u.email 
	FROM tblpersona p 
	INNER JOIN tblusuario u 
	ON p.idPersona = u.idPersona AND u.idPersona = $idusuario";
					
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
					<td>Nombre : </td>
					<td>".$fila['nombre']."</	td>
				</tr>
				<tr>
					<td>Direccion : </td>
					<td>".$fila['direccion']."</	td>
				</tr>
				<tr>
					<td>Telefono : </td>
					<td>".$fila['telefono']."</	td>
				</tr>
				<tr>
					<td>Email : </td>
					<td>".$fila['email']."</	td>
				</tr> ";
	}//Fin While
	
}//Fin del metodo mostrar Prestamos de cliente
function mostrarPrestamos($bdConexion,$hCodigo,$idlibro,$idusuario)
{
	$sqlMostrar = "SELECT 
                    l.imagen,
                    l.idLibro,
                    l.titulo,
                    l.precioCosto,
                    det.idLibro,  
                    det.cantidad,
                    det.total
            FROM tbllibro l
            INNER JOIN tbldetpedido det
                    ON l.idLibro=det.idLibro AND det.idPedido = $hCodigo AND det.eliminado = 0
            ";			
if($hCodigo >0){
	$rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
	print '	<tr >
                                <th>Codigo Libro</th>
				<th >Imagen</th>
				<th>Titulo</th>
				<th >Precio</th>
				<th >Cantidad</th>
				<th>Total</th>
				<th>Acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
				print "<tr>
				<td>".$fila['idLibro']."</td>
				<td><img width='60' height='80'src=".$fila['imagen']."></td>
				<td>".$fila['titulo']."</td>
				<td>".$fila['precioCosto']."</td>
				<td>".$fila['cantidad']."</td>
				<td>".$fila['total']."</td>
                                <td>
                                    <a href='frmPedido.php?accion=remove&hCodigo=".$hCodigo
                                        ."&idLibro=".$fila['idLibro']."'  
                                        onclick='return eliminarItem();' class=' fa fa-minus-circle'></a>
                                </td>
			   </tr>";
	}//Fin While
	
}//Fin del metodo mostrar Prestamos de cliente
}
?>