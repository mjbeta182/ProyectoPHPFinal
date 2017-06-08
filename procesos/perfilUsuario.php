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
function mostrarPrestamos($bdConexion,$idusuario)
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
	
}//Fin del metodo mostrarPrestamos		

?>