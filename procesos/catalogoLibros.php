
<?php
include('../clases/conexion.php');
function catalogo($bdConexion,$categoria)
{
        if($categoria>0)
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
                                    ON l.idCategoria = c.idCategoria WHERE l.idCategoria = $categoria";
        }else
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
                                    ON l.idCategoria = c.idCategoria";
        }
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	//Monstran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "
		<div class='col-md-2'>
		<article>
			<img class='image' src=".$fila['imagen'].">
			<div class='overlay'>
			<div class='col-sm-12 ' style='font-size:10px;color:white;margin-top:15px;text-align:justify; '>
    			<p>".$fila['titulo']."</p>
    			<p>".$fila['descripcion']."</p>
                        
    		</div> 
                <a class='agregar' href='perfil.php?&btnAgregar=agregar&idLibro=".$fila['idLibro']."'>Agregar		
		</a>
   		</div>
		</article>		
		</div>
	";
		
	}//Fin While
}//Fin del metodo mostrar
?>
