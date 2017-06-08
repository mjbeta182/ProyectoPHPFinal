<?php
include('../clases/conexion.php');
$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$slcNacionalidad = (isset($_REQUEST['slcNacionalidad'])?$_REQUEST['slcNacionalidad']:null);
$txtNombre 	= (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		print "INSERTAR";
		$tabla		= "tblautor";
		$campos		= "idNacionalidad,nombreAutor";
		$valores	= "$slcNacionalidad,'$txtNombre'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
		$hCodigo = $bdConexion->retornarId();
		}
		if ( $_REQUEST['accion']== 'update')
		{

			$tabla		= "tblautor";
			$campos		= "idNacionalidad = $slcNacionalidad, nombreAutor = '$txtNombre'";
			$condicion	= "idAutor = $hCodigo";
			$bdConexion->actualizarDB($tabla,$campos,$condicion);
			print 'EDITANDO';
		}
}//Fin de boton Guardar

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
{
	$accion = 'update';
}

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar')
{
                print "ELIMINAR";
		$tabla = "tblautor";
		$condicion = "idAutor =".$hCodigo;
		$bdConexion->eliminarDB($tabla,$condicion);
                
}//Fin de Eliminar


function mostrarDatos($bdConexion,$hCodigo,$slcTipoUsuario,$txtNombre,$txtBuscar)
{
	$sqlMostrar = "SELECT a.idAutor, n.nombreNacionalidad, 
                a.nombreAutor FROM tblautor a 
                INNER JOIN tblnacionalidad n 
                on a.idNacionalidad = n.idNacionalidad
                Where 
                a.idAutor LIKE '%".$txtBuscar."%' OR 
                n.nombreNacionalidad LIKE '%".$txtBuscar."%' OR 
                a.nombreAutor LIKE '%".$txtBuscar."%'";
        
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);

	
	print '	<tr >
				<th>Codigo</th>
				<th>Nacionalidad</th>
				<th >Nombre</th>
				<th>acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
				<td>".$fila['idAutor']."</td>
				<td>".$fila['nombreNacionalidad']."</td>
				<td>".$fila['nombreAutor']."</td>


				<td align='center'>
					<a href='frmAutor.php?accion=editar&hCodigo=".$fila['idAutor']."&slcNacionalidad=".$fila['nombreNacionalidad']."&txtNombre=".$fila['nombreAutor']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>

					<a href='frmAutor.php?accion=eliminar&hCodigo=".$fila['idAutor']."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td>
			   </tr>";
	}//Fin While
	
}//Fin del metodo mostrar

?>

