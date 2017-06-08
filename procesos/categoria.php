<?php
include('../clases/conexion.php');
$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtBuscar	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);
$txtCategoria	= (isset($_REQUEST['txtCategoria'])?$_REQUEST['txtCategoria']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		print "INSERTAR";
		$tabla		= "tblcategoria";
		$campos		= "nombreCategoria";
		$valores	= "'$txtCategoria'";
		$bdConexion->insertarDB($tabla,$campos,$valores);

		}
		if ( $_REQUEST['accion']== 'update')
		{
		print 'EDITANDO';
		$tabla		= "tblcategoria";
		$campos		= "nombreCategoria  = '$txtCategoria'";
		$condicion	= "idCategoria = $hCodigo";
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
	$tabla = "tblcategoria";
	$condicion = "idCategoria =".$hCodigo;
	$bdConexion->eliminarDB($tabla,$condicion);
}//Fin de Eliminar

function mostrarDatos($bdConexion,$hCodigo,$txtTipo, $txtBuscar)
{
	$sqlMostrar = "SELECT * FROM tblcategoria 
                       WHERE
                       idCategoria LIKE '%".$txtBuscar."%' OR
                       nombreCategoria LIKE '%".$txtBuscar."%'";
					
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	
	print '	<tr >
				<th >Codigo</th>
				<th>Categoria</th>
				<th >Acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
				<td>".$fila['idCategoria']."</td>
				<td>".$fila['nombreCategoria']."</td>
				<td align='center'>
					<a href='frmCategoria.php?accion=editar&hCodigo=".$fila['idCategoria']."&txtCategoria=".$fila['nombreCategoria']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>
					<a href='frmCategoria.php?accion=eliminar&hCodigo=".$fila['idCategoria']."&txtCategoria=".$fila['nombreCategoria']."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td>
			   </tr>";
	}//Fin While
	
}//Fin del metodo mostrar

?>

