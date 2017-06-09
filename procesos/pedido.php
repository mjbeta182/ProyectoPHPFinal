<?php

include('../clases/conexion.php');
$hCodigo		= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$slcEditorial	= (isset($_REQUEST['slcEditorial'])?$_REQUEST['slcEditorial']:0);
$slcLibro	= (isset($_REQUEST['slcLibro'])?$_REQUEST['slcLibro']:null);
$txtFecha	= (isset($_REQUEST['txtFecha'])?$_REQUEST['txtFecha']:null);
$txtEntrega	= (isset($_REQUEST['txtEntrega'])?$_REQUEST['txtEntrega']:null);
$txtNombre	= (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$hora           = (isset($_REQUEST['txtHora'])?$_REQUEST['txtHora']:null);
$txtCantidad	= (isset($_REQUEST['txtCantidad'])?$_REQUEST['txtCantidad']:null);
$accion		= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 
if (isset($_REQUEST['btnCrear']))
{
	
	if ($hCodigo == 0)
	{
		$tabla		= "tblpedido";
		$campos		= "idUsuario,fechaPedido,fechaEntrega,horaPedido,total";
		$valores	= "$idusuario,'$txtFecha','$txtEntrega','$hora',0";
		$bdConexion->insertarDB($tabla,$campos,$valores);
		$hCodigo = $bdConexion->retornarId();
	}
        
//	
}
if(isset($_REQUEST['btnAgregar']))
{
    if($hCodigo>0)
	{
                print 'insertando detalle ';
        	$sqlMostrar = "SELECT l.precioCosto FROM tbllibro l WHERE l.idLibro = $slcLibro ";				
                $rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
	while($fila = mysqli_fetch_array($rsMostrar))
	{
                $precio = $fila['precioCosto'];
                print 'Precio costo:'.$precio;
        }
            
		$tabla		= "tbldetpedido";
		$campos		= "idPedido,idLibro,cantidad,total,eliminado,estado";
		$valores	= "$hCodigo,$slcLibro,$txtCantidad,$txtCantidad*$precio,0,'En proceso'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
			
		$tabla	= "tblPedido";
		$campos	= "total = (SELECT SUM(total) FROM tbldetpedido WHERE idPedido=$hCodigo and eliminado=0)";
		$condicion	= "idPedido = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
	}
}

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='remove')
{
		$eliminar	 = 	$_REQUEST['idLibro'];
		
		$tabla		= "tbldetpedido";
                $campos		= "eliminado= 1 ";
		$condicion	= "idLibro = ".$eliminar ;
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
                $tabla		= "tblpedido";
                $campos		= "total = (SELECT SUM(total) FROM tbldetpedido WHERE idPedido=$hCodigo and eliminado=0) ";
		$condicion	= "idPedido = ".$hCodigo ;
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
                
                $eliminar = 0;
		unset($_REQUEST['accion']);
}
function mostrarDetalle($bdConexion,$hCodigo,$txtNombre,$txtCantidad,$txtFecha,$txtEntrega,$hora,$slcEditorial,$slcLibro)
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
    }

}//Fin del metodo
