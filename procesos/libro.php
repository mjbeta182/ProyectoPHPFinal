<?php

include('../clases/conexion.php');
$hCodigo		= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:0);
$txtTitulo		= (isset($_REQUEST['txtTitulo'])?$_REQUEST['txtTitulo']:null);
$txtStock		= (isset($_REQUEST['txtStock'])?$_REQUEST['txtStock']:null);
$txtDescripcion	= (isset($_REQUEST['txtDescripcion'])?$_REQUEST['txtDescripcion']:null);
$txtPalabras	= (isset($_REQUEST['txtPalabras'])?$_REQUEST['txtPalabras']:null);
$txtCosto		= (isset($_REQUEST['txtCosto'])?$_REQUEST['txtCosto']:null);
$archivo		= (isset($_REQUEST['archivo'])?$_REQUEST['archivo']:null);
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);
$slcAutor		= (isset($_REQUEST['slcAutor'])?$_REQUEST['slcAutor']:null);
$slcEditorial	= (isset($_REQUEST['slcEditorial'])?$_REQUEST['slcEditorial']:null);
$slcCategoria	= (isset($_REQUEST['slcCategoria'])?$_REQUEST['slcCategoria']:null);
$accion			= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 

//Funciones de boton guardar
if (isset($_REQUEST['btnGuardar']))
{
	if ($accion=='insert')
	{
		if($_FILES['archivo']["error"] > 0){}
		else
		  {
		  	$url = "../imagenes/portadas/";
			move_uploaded_file($_FILES['archivo']['tmp_name'],$url.$_FILES['archivo']['name']);
			$pathImage = $url.$_FILES['archivo']['name'];
		  }
		if ($hCodigo == 0)
		{
			$tabla		= "tbllibro";
			$campos		= "idEditorial,idCategoria,titulo,stock,descripcion,precioCosto,palabrasClave,imagen";
			$valores	= "$slcEditorial,$slcCategoria,'$txtTitulo',$txtStock,'$txtDescripcion',$txtCosto,'$txtPalabras','$pathImage'";
			$bdConexion->insertarDB($tabla,$campos,$valores);
			$hCodigo	= $bdConexion->retornarId();
		}
	}//fin de accion insertar	
	//Si el codigo de libro existe puede insertar el detalle de autores 
	if($hCodigo>0)
	{
		$tabla		= "tbldetlibroautor";
		$campos		= "idLibro,idAutor";
		$valores	= "$hCodigo,$slcAutor";
		$bdConexion->insertarDB($tabla,$campos,$valores);
	}
}
				
		// if ( $_REQUEST['accion']== 'update')
		// {
		// 	$tabla		= "tblpersona";
		// 	$campos		= "nombre = '$txtNombre',telefono = '$txtTelefono',direccion = '$txtDireccion'";
		// 	$condicion	= "idPersona = $hCodigo";
		// 	$bdConexion->actualizarDB($tabla,$campos,$condicion);
		// 	print 'EDITANDO';
		// 	$tabla		= "tblusuario";
		// 	$campos		= "idTipoUsuario  = $slcTipoUsuario, email = '$txtEmail', contrasena = '$txtContrasena'";
		// 	$condicion	= "idPersona= $hCodigo";
		// 	$bdConexion->actualizarDB($tabla,$campos,$condicion);
		// }

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
{
    $acciones	= 'update';
}
if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar')
{
		$hCodigo	 = 	$_REQUEST['hCodigo'];
		print "ELIMINAR".$hCodigo;
		$tabla		= "tbldetlibroautor";
		$condicion	= "idLibro = $hCodigo" ;
		$bdConexion->eliminarDB($tabla,$condicion);
	if($hCodigo > 0)
	{
		$tabla		= "tbllibro";
		$condicion	= "idLibro =$hCodigo";
		$bdConexion->eliminarDB($tabla,$condicion);	
		unset($_REQUEST['accion']);
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
function mostrarDatos($bdConexion,$hCodigo,$txtTitulo ,$txtStock,$txtDescripcion,$txtPalabras,$archivo,$slcEditorial,$slcCategoria,$slcAutor,$txtBuscar)
{
	$sqlMostrar = "SELECT 
						l.idLibro,
						l.titulo,
						l.stock,
						l.descripcion,
						l.precioCosto,
						l.palabrasClave,
						l.imagen,
						e.idEditorial,
						e.nombreEditorial,
						c.idCategoria,
						c.nombreCategoria
					FROM tbllibro l
					INNER JOIN tbleditorial e
						ON l.idEditorial= e.idEditorial 
					INNER JOIN tblcategoria c
						ON l.idCategoria = c.idCategoria
                                                WHERE
                                                l.idLibro  LIKE '%".$txtBuscar."%' OR 
						l.titulo LIKE '%".$txtBuscar."%' OR 
						l.stock LIKE '%".$txtBuscar."%' OR 
						l.descripcion LIKE '%".$txtBuscar."%' OR 
						l.precioCosto LIKE '%".$txtBuscar."%' OR 
						l.palabrasClave LIKE '%".$txtBuscar."%' OR 
						l.imagen LIKE '%".$txtBuscar."%' OR 
						e.idEditorial LIKE '%".$txtBuscar."%' OR 
						e.nombreEditorial LIKE '%".$txtBuscar."%' OR 
						c.idCategoria LIKE '%".$txtBuscar."%' OR 
						c.nombreCategoria LIKE '%".$txtBuscar."%'
					";			
	
	$rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
	print '	<tr >
				<th ></th>
				<th >Imagen</th>
				<th>Titulo</th>
				<th >Descripcion</th>
				<th >Categoria</th>
				<th>Editorial</th>
				<th >Stock</th>
				<th>Precio Costo</th>
				<th>Palabras Clave</th>
				<th>Autores</th>
				<th >acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
				print "<tr>
				<td>".$fila['idLibro']."</td>
				<td><img width='60' height='80'src=".$fila['imagen']."></td>
				<td>".$fila['titulo']."</td>
				<td>".$fila['descripcion']."</td>
				<td>".$fila['nombreCategoria']."</td>
				<td>".$fila['nombreEditorial']."</td>
				<td>".$fila['stock']."</td>
				<td>".$fila['precioCosto']."</td>
				<td>".$fila['palabrasClave']."</td>
				<td>";
				$idLibro	= $fila['idLibro'];
				$sql 		= "	SELECT autor.nombreAutor FROM tbldetlibroautor a 
								INNER JOIN tblautor autor ON a.idAutor = autor.idAutor  
								WHERE a.idLibro = $idLibro";
				$rs 		= $bdConexion->ejecutarSql($sql);	
				while($fila = mysqli_fetch_array($rs))
					{
				         print $fila['nombreAutor'];
				         print "<br><br>";
				    }  
				print "</td>
				<td align='center'>
					<a href='frmLibros.php?accion=editar&hCodigo=".$fila['idLibro']."&txtTitulo=".$fila['titulo']."&txtStock=".$fila['stock']."&txtDescripcion=".$fila['descripcion']."&txtPalabras=".$fila['palabrasClave']."&slcCategoria=".$fila['idCategoria']."&slcEditorial=".$fila['idEditorial']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>

					<a href='frmLibros.php?accion=eliminar&hCodigo=".$idLibro."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td> 
			   </tr>";
	}//Fin While
}//Fin del metodo mostrar
function mostrarAutores($bdConexion,$hCodigo,$slcAutor)
{
	$sqlMostrar= "SELECT a.idAutor, 
						a.idLibro,
						autor.nombreAutor
						FROM tbldetlibroautor a 
						INNER JOIN tblautor autor ON a.idAutor = autor.idAutor  
						WHERE a.idLibro = $hCodigo";
	
	$rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
	print '	<tr >
				<th>Autores</th>
				<th >acciones</th>
			</tr>';
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tr>
				<td>".$fila['nombreAutor']."</td>
				<td align='center'>
				<a href='frmLibros.php?accion=remove&hCodigo=".$fila['idLibro']."&idautor=".$fila['idAutor']."&slcAutor=".$fila['nombreAutor']."'  onclick='return eliminarItem();'>eliminar
					
					</a>
				</td> 
			   </tr>";
	}//Fin While
}//Fin del metodo mostrar
?>
<!-- <button type='submit' class='btn btn-danger  fa fa-minus-circle'></button> -->
<!-- <td align='center'>
					<a href='frmLibros.php?accion=editar&hCodigo=".$fila['idLibro']."&txtTitulo=".$fila['titulo']."&txtStock=".$fila['stock']."&txtDescripcion=".$fila['descripcion']."&txtPalabras=".$fila['palabrasClave']."&slcCategoria=".$fila['idCategoria']."&slcEditorial=".$fila['idEditorial']."'>
					<button type='submit' class='btn btn-warning  fa fa-edit'></button>
					</a>

					<a href='frmLibros.php?accion=eliminar&hCodigo=".$fila['idLibro']."' onclick='return eliminarItem();'>
					<button type='submit' class='btn btn-danger  fa fa-minus-circle'></button>
					</a>
				</td>  -->