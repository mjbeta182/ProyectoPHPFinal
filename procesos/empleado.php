<?php
include('../clases/conexion.php');
$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNombre 	= (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$txtDireccion	= (isset($_REQUEST['txtDireccion'])?$_REQUEST['txtDireccion']:null);
$txtTelefono	= (isset($_REQUEST['txtTelefono'])?$_REQUEST['txtTelefono']:null);
$slcTipoUsuario = (isset($_REQUEST['slcTipoUsuario'])?$_REQUEST['slcTipoUsuario']:null);
$txtEmail	= (isset($_REQUEST['txtEmail'])?$_REQUEST['txtEmail']:null);
$txtContrasena 	= (isset($_REQUEST['txtContrasena'])?$_REQUEST['txtContrasena']:null);
$Buscar         = (isset($_REQUEST['Buscar'])?$_REQUEST['Buscar']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		print "INSERTAR";
		$tabla		= "tblpersona";
		$campos		= "nombre,telefono,direccion";
		$valores	= "'$txtNombre','$txtTelefono','$txtDireccion'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
		$hCodigo = $bdConexion->retornarId();
			if($hCodigo>0)
			{
				$tabla		= "tblusuario";
				$campos		= "idTipoUsuario,idPersona,contrasena,email";
				$valores	= "$slcTipoUsuario,$hCodigo,'$txtContrasena','$txtEmail'";
				$bdConexion->insertarDB($tabla,$campos,$valores);
			}
		}
		if ( $_REQUEST['accion']== 'update')
		{

			$tabla		= "tblpersona";
			$campos		= "nombre = '$txtNombre',telefono = '$txtTelefono',direccion = '$txtDireccion'";
			$condicion	= "idPersona = $hCodigo";
			$bdConexion->actualizarDB($tabla,$campos,$condicion);
			print 'EDITANDO';
			$tabla		= "tblusuario";
			$campos		= "idTipoUsuario  = $slcTipoUsuario, email = '$txtEmail', contrasena = '$txtContrasena'";
			$condicion	= "idPersona= $hCodigo";
			$bdConexion->actualizarDB($tabla,$campos,$condicion);
		}
}//Fin de boton Guardar

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
{
	$accion = 'update';
}

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar' and isset($_REQUEST['idUsuario']))
{
		$delete = $_REQUEST['idUsuario'];
		$tabla = "tblusuario";
		$condicion = "idUsuario = $delete ";
		$bdConexion->eliminarDB($tabla,$condicion);

		$hCodigo = $_REQUEST['hCodigo'];
		$tabla = "tblpersona";
		$condicion = "idPersona =$hCodigo";
		$bdConexion->eliminarDB($tabla,$condicion);
		
}//Fin de Eliminar


function mostrarDatos($bdConexion,$hCodigo,$txtNombre,$txtDireccion,$txtTelefono,$slcTipoUsuario,$txtEmail,$txtContrasena,$Buscar)
{
	$sqlMostrar = "SELECT 
						p.idPersona,
						p.nombre,
						p.telefono,
						p.direccion,
						u.email,
						u.contrasena,
						u.idUsuario,
						tu.idTipoUsuario AS idTipo,
						tu.nombreUsuario AS  TipoUsuario
					FROM tblusuario u
					INNER JOIN tblpersona p
						ON u.idPersona = p.idPersona 
					INNER JOIN tbltipousuario tu
						ON u.idTipoUsuario = tu.idTipoUsuario
                                                WHERE 
                                                p.idPersona LIKE '%".$Buscar."%' OR 
						p.nombre LIKE '%".$Buscar."%' OR
						p.telefono LIKE '%".$Buscar."%' OR
						p.direccion LIKE '%".$Buscar."%' OR
						u.email LIKE '%".$Buscar."%' OR
						u.contrasena LIKE '%".$Buscar."%' OR
						u.idUsuario LIKE '%".$Buscar."%' OR
						tu.idTipoUsuario LIKE '%".$Buscar."%' OR
						tu.nombreUsuario LIKE '%".$Buscar."%'";			
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);

	
	print '	<tr >
				<th ></th>
				<th>Nombre</th>
				<th >Telefono</th>
				<th>Direccion</th>
				<th >Tipo de Usuario</th>
				<th >Email</th>
				<th>Contrasena</th>
				<th>acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
				<td>".$fila['idPersona']."</td>
				<td>".$fila['nombre']."</td>
				<td>".$fila['telefono']."</td>
				<td>".$fila['direccion']."</td>
				<td>".$fila['TipoUsuario']."</td>
				<td>".$fila['email']."</td>
				<td>".$fila['contrasena']."</td>

				<td align='center'>
					<a href='frmEmpleado.php?accion=editar&hCodigo=".$fila['idPersona']."&txtNombre=".$fila['nombre']."&txtDireccion=".$fila['direccion']."&txtTelefono=".$fila['telefono']."&slcTipoUsuario=".$fila['idTipo']."&txtEmail=".$fila['email']."&txtContrasena=".$fila['contrasena']."&idUsuario=".$fila['idUsuario']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>

					<a href='frmEmpleado.php?accion=eliminar&hCodigo=".$fila['idPersona']."&idUsuario=".$fila['idUsuario']."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td>
			   </tr>";
	}//Fin While
	
}//Fin del metodo mostrar

?>