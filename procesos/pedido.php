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
print $idusuario;
if (isset($_REQUEST['btnCrear']))
{
	#Validando si el campo FACTURAID es mayor de cero.
	# Si es cero indica que es la primera insercion que se realizara
	if ($hCodigo == 0)
	{
            print 'insertando datos ';
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
    print 'id Codigo :'.$hCodigo;
   
   
    if($hCodigo>0)
	{
                print 'insertando detalle ';
        	$sqlMostrar = "SELECT l.precioCosto FROM tbllibro l WHERE l.idLibro = $hCodigo ";				
                $rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
	while($fila = mysqli_fetch_array($rsMostrar))
	{
                $precio = $fila['precioCosto'];
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
		$idAutor	 = 	$_REQUEST['idautor'];
		print $idAutor;
		$tabla		= "tbldetlibroautor";
		$condicion	= "idAutor = ".$idAutor ;
		$bdConexion->eliminarDB($tabla,$condicion);
		unset($_REQUEST['accion']);
}
//function mostrarDetalle($bdConexion,$hCodigo,$txtNombre,$txtCantidad,$txtFecha,$txtEntrega,$hora,$slcEditorial,$slcLibro)
//{
//	$sqlMostrar = "SELECT 
//						l.idLibro,
//						l.titulo,
//						det.total
//						l.precioCosto,
//						l.palabrasClave,
//						l.imagen,
//						e.idEditorial,
//						e.nombreEditorial,
//						c.idCategoria,
//						c.nombreCategoria
//					FROM tbllibro l
//					INNER JOIN tbleditorial e
//						ON l.idEditorial= e.idEditorial 
//					INNER JOIN tblcategoria c
//						ON l.idCategoria = c.idCategoria
//					";			
//	
//	$rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
//	print '	<tr >
//				<th ></th>
//				<th >Imagen</th>
//				<th>Titulo</th>
//				<th >Descripcion</th>
//				<th >Categoria</th>
//				<th>Editorial</th>
//				<th >Stock</th>
//				<th>Precio Costo</th>
//				<th>Palabras Clave</th>
//				<th>Autores</th>
//				<th >acciones</th>
//			</tr>';
//	//Monstran detalle de registros
//	while($fila = mysqli_fetch_array($rsMostrar))
//	{
//				print "<tr>
//				<td>".$fila['idLibro']."</td>
//				<td><img width='60' height='80'src=".$fila['imagen']."></td>
//				<td>".$fila['titulo']."</td>
//				<td>".$fila['descripcion']."</td>
//				<td>".$fila['nombreCategoria']."</td>
//				<td>".$fila['nombreEditorial']."</td>
//				<td>".$fila['stock']."</td>
//				<td>".$fila['precioCosto']."</td>
//				<td>".$fila['palabrasClave']."</td>
//				<td>";
//				$idLibro	= $fila['idLibro'];
//				$sql 		= "	SELECT autor.nombreAutor FROM tbldetlibroautor a 
//								INNER JOIN tblautor autor ON a.idAutor = autor.idAutor  
//								WHERE a.idLibro = $idLibro";
//				$rs 		= $bdConexion->ejecutarSql($sql);	
//				while($fila = mysqli_fetch_array($rs))
//					{
//				         print $fila['nombreAutor'];
//				         print "<br><br>";
//				    }  
//				print "</td>
//				<td align='center'>
//					<a href='frmLibros.php?accion=editar&hCodigo=".$fila['idLibro']."&txtTitulo=".$fila['titulo']."&txtStock=".$fila['stock']."&txtDescripcion=".$fila['descripcion']."&txtPalabras=".$fila['palabrasClave']."&slcCategoria=".$fila['idCategoria']."&slcEditorial=".$fila['idEditorial']."'>
//					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
//					</a>
//
//					<a href='frmLibros.php?accion=eliminar&hCodigo=".$idLibro."' onclick='return eliminarItem();'>
//					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
//					</a>
//				</td> 
//			   </tr>";
//	}//Fin While
//}//Fin del metodo mostrar
//function mostrarAutores($bdConexion,$hCodigo,$slcAutor)
//{
//	$sqlMostrar= "SELECT a.idAutor, 
//						a.idLibro,
//						autor.nombreAutor
//						FROM tbldetlibroautor a 
//						INNER JOIN tblautor autor ON a.idAutor = autor.idAutor  
//						WHERE a.idLibro = $hCodigo";
//	
//	$rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
//	print '	<tr >
//				<th>Autores</th>
//				<th >acciones</th>
//			</tr>';
//	//Monstran detalle de registros
//	while($fila = mysqli_fetch_array($rsMostrar))
//	{
//		print "<tr>
//				<td>".$fila['nombreAutor']."</td>
//				<td align='center'>
//				<a href='frmLibros.php?accion=remove&hCodigo=".$fila['idLibro']."&idautor=".$fila['idAutor']."&slcAutor=".$fila['nombreAutor']."'  onclick='return eliminarItem();'>eliminar
//					
//					</a>
//				</td> 
//			   </tr>";
//	}//Fin While
//}//Fin del metodo mostrar
?>

