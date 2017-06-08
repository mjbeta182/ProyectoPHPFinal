<?php
include('../clases/conexion.php');
$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtTipo	= (isset($_REQUEST['txtTipo'])?$_REQUEST['txtTipo']:null);
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		print "INSERTAR";
		$tabla		= "tbltipousuario";
		$campos		= "nombreUsuario";
		$valores	= "'$txtTipo'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
		}
		if ( $_REQUEST['accion']== 'update')
		{
		print 'EDITANDO';
		$tabla		= "tbltipousuario";
		$campos		= "nombreUsuario  = '$txtTipo'";
		$condicion	= "idTipoUsuario = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
		}
}//Fin de boton Guardar

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
{
	$accion = 'update';
}

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar')
{
	print "ELIMINAR";
	$tabla = "tbltipousuario";
	$condicion = "idTipoUsuario =".$hCodigo;
	$bdConexion->eliminarDB($tabla,$condicion);
}//Fin de Eliminar

function mostrarDatos($bdConexion,$hCodigo,$txtTipo,$txtBuscar)
{
	$sqlMostrar = "SELECT * FROM tbltipousuario
                       where 
                       idTipoUsuario LIKE '%".$txtBuscar."%' OR 
                       nombreUsuario LIKE '%".$txtBuscar."%'";
					
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	
	print '	<tr >
				<th >Codigo</th>
				<th>Nombre</th>
				<th >Acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
				<td>".$fila['idTipoUsuario']."</td>
				<td>".$fila['nombreUsuario']."</td>
				<td align='center'>
					<a href='frmTipoUsuario.php?accion=editar&hCodigo=".$fila['idTipoUsuario']."&txtTipo=".$fila['nombreUsuario']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>
					<a href='frmTipoUsuario.php?accion=eliminar&hCodigo=".$fila['idTipoUsuario']."&txtTipo=".$fila['nombreUsuario']."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td>
			   </tr>";
	}//Fin While
	
}//Fin del metodo mostrar

?>