<?php
include('../clases/conexion.php');
$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNacionalidad= (isset($_REQUEST['txtNacionalidad'])?$_REQUEST['txtNacionalidad']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert');
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		print "INSERTAR";
		$tabla		= "tblnacionalidad";
		$campos		= "nombreNacionalidad";
		$valores	= "'$txtNacionalidad'";
		$bdConexion->insertarDB($tabla,$campos,$valores);

		}
		if ( $_REQUEST['accion']== 'update')
		{
		print 'EDITANDO';
		$tabla		= "tblnacionalidad";
		$campos		= "nombreNacionalidad  = '$txtNacionalidad'";
		$condicion	= "idNacionalidad = $hCodigo";
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
	$tabla = "tblnacionalidad";
	$condicion = "idNacionalidad =".$hCodigo;
	$bdConexion->eliminarDB($tabla,$condicion);
}//Fin de Eliminar

function mostrarDatos($bdConexion,$hCodigo,$txtTipo,$txtBuscar)
{
	$sqlMostrar = "SELECT * FROM tblnacionalidad
                        WHERE
                        idNacionalidad LIKE '%".$txtBuscar."%' OR 
                        nombreNacionalidad LIKE '%".$txtBuscar."%'
                        ";
                
					
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	
	print '	<tr >
				<th >Codigo</th>
				<th>Nacionalidad</th>
				<th >Acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
				<td>".$fila['idNacionalidad']."</td>
				<td>".$fila['nombreNacionalidad']."</td>
				<td align='center'>
					<a href='frmNacionalidad.php?accion=editar&hCodigo=".$fila['idNacionalidad']."&txtNacionalidad=".$fila['nombreNacionalidad']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>
					<a href='frmNacionalidad.php?accion=eliminar&hCodigo=".$fila['idNacionalidad']."&txtNacionalidad=".$fila['nombreNacionalidad']."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td>
			   </tr>";
	}//Fin While
	
}//Fin del metodo mostrar

?>

