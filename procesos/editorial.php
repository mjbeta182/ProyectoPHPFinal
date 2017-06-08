<?php
include ('../clases/conexion.php');

$hCodigo                = (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNombreEditorial	= (isset($_REQUEST['txtNombreEditorial'])?$_REQUEST['txtNombreEditorial']:null);
$txtDireccion           = (isset($_REQUEST['txtDireccion'])?$_REQUEST['txtDireccion']:null);
$txtTelefono            = (isset($_REQUEST['txtTelefono'])?$_REQUEST['txtTelefono']:null);
$txtEmail               = (isset($_REQUEST['txtEmail'])?$_REQUEST['txtEmail']:null);
$txtBuscar               = (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);
$accion                 = (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert');

//Boton Guardar
if (isset($_REQUEST['btnGuardar'])) 
{
    if ($accion=='insert')
    {
        print "INSERTAR";
		$tabla		= "tbleditorial";
		$campos		= "nombreEditorial,direccion,telefono,email";
		$valores	= "'$txtNombreEditorial','$txtDireccion','$txtTelefono','$txtEmail'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
    }
    if ( $_REQUEST['accion']== 'update')
    {
        print 'EDITANDO';
                $tabla		= "tbleditorial";
		$campos		= "nombreEditorial  = '$txtNombreEditorial', direccion = '$txtDireccion', telefono = '$txtTelefono',email = $txtEmail";
		$condicion	= "idEditorial = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
    }//fin de boton Guardar
}
    //Editar
    if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
    {
	$accion = 'update';
    }//fin editar
    
    //Boton Eliminar
    if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar')
    {
	print "ELIMINAR";
	$tabla = "tblEditorial";
	$condicion = "idEditorial =".$hCodigo;
	$bdConexion->eliminarDB($tabla,$condicion);
    }//Fin de Eliminar
    
    //Mostrar Datos
    function mostrarDatos($bdConexion,$hCodigo,$txtNombreEditorial,$txtDireccion,$txtTelefono,$txtEmail,$txtBuscar)
    {
	$sqlMostrar = "SELECT * FROM tbleditorial
                       WHERE 
                       idEditorial LIKE '%".$txtBuscar."%' OR
                       nombreEditorial LIKE '%".$txtBuscar."%' OR
                       direccion LIKE '%".$txtBuscar."%' OR
                       telefono LIKE '%".$txtBuscar."%' OR
                       email LIKE '%".$txtBuscar."%'";
					
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	
	print '	<tr >
				<th >Codigo</th>
				<th>Nombre Editorial</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Email</th>
				<th >Acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
			<td>".$fila['idEditorial']."</td>
			<td>".$fila['nombreEditorial']."</td>
                        <td>".$fila['direccion']."</td>
                        <td>".$fila['telefono']."</td>
                        <td>".$fila['email']."</td>
                            <td align='center'>
				<a href='frmEditorial.php?accion=editar&hCodigo=".$fila['idEditorial']."&txtNombreEditorial=".$fila['nombreEditorial']."&txtDireccion=".$fila['direccion']."&txtTelefono=".$fila['telefono']."&txtEmail=".$fila['email']."'>
				<button type='submit' class='btn btn-warning  fa fa-edit'></button>
				</a>
				<a href='frmEditorial.php?accion=eliminar&hCodigo=".$fila['idEditorial']."&txtNombreEditorial=".$fila['nombreEditorial']."&txtDireccion=".$fila['direccion']."&txtTelefono=".$fila['telefono']."&txtEmail=".$fila['email']."' onclick='return eliminarItem();'>
				<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
				</a>
                            </td>
                        </tr>";
	}//Fin While
	
    }//Fin del metodo mostrar
    


?>