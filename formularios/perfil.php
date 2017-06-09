<!DOCTYPE>
<html lang="es">
    <meta charset="UTF-8">
<?php
session_start(); 
if ((isset($_SESSION['persona'])) && (isset($_SESSION['id'])))
{
  $idusuario = $_SESSION['id'];
  $usuario = $_SESSION['persona'];
  $dir = 'formularios/perfil.php';
  $hCodigo = (isset($_SESSION['idPedido'])?$_SESSION['idPedido']:0);
  print $hCodigo;
}else{
  $usuario = 'Acceder Registrarse';
  $dir = 'index.php';
}
//Archivo que tiene la pantalla y estilo por parte del cliente
include('../plantilla/plantillaCliente.php');
include('../procesos/perfilUsuario.php');
$titulo = 'Acceder / Registrarse';
$puntos = '../';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
	<div class="row3">
		<div class="col-md-12">
			<h3 class="text-center text-muted" id="heading">
				<strong>MI PERFIL </strong>
			</h3>
		</div>
	</div>
  <div class="row3">
     <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Datos Personales</a></li>
        <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Prestamos</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
          <h3>DATOS PERSONALES</h3>
          <hr>  
            <div class="col-md-12">  
            <table border="1" class="tabla" style="width:100%;">
              <?php mostrarDatos($bdConexion,$idusuario); ?>
            </table>
           </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="register">
          <h3>PRESTAMOS</h3>
          <hr>
          <div class="col-md-12">  
              <form action="#" method="POST">
            <table border="1" class="tabla" style="width:100%;"> 
              <input type="text" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
              <input type="text" class="form-control" id="txtFecha" name="txtFecha" placeholder="Fecha" value="<?= date("Y-m-d"); ?>">
              <input type="text" class="form-control" id="btnCraer" name="txtNombre" placeholder="" value="<?=$usuario?>" required="true">
              <input type="text" class="form-control" id="txtidusuario" name="txtidusuario" value="<?=$idusuario?>">
              <input type="text" class="form-control" id="txtHora" name="txtHora" placeholder="Hora" value="<?php  $time = time(); echo date("h:i:s", $time) ?>" required="true">
              <input type="hidden" class="form-control" id="txtEntrega" name="txtEntrega" placeholder="entrega" value="<?= date("2017-06-30"); ?>" required="true">   
              <?php
                    $titu = null;
                  $idlibro        = (isset($_REQUEST['idLibro'])?$_REQUEST['idLibro']:0);
                 $sqlMostrar = "SELECT l.precioCosto, l.titulo FROM tbllibro l WHERE l.idLibro = $idlibro ";				
                            $rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
                             while($fila = mysqli_fetch_array($rsMostrar))
                    {
                            $precio = $fila['precioCosto'];  
                            $titu= $fila['titulo']; 
                    }
              ?>
              <br><h3>LIBRO</h3><br>
              <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" value="<?= $titu ?>"readonly="true" >   
              <input type="text" class="form-control" id="txtCantidad" name="txtCantidad"  placeholder="Cantidad" >
                <?php
                $hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:0);
                $txtFecha	= (isset($_REQUEST['txtFecha'])?$_REQUEST['txtFecha']:null);
                $txtEntrega	= (isset($_REQUEST['txtEntrega'])?$_REQUEST['txtEntrega']:null);
                $txtNombre	= (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
                $hora           = (isset($_REQUEST['txtHora'])?$_REQUEST['txtHora']:null);
                $idlibro        = (isset($_REQUEST['idLibro'])?$_REQUEST['idLibro']:null);
                $txtCantidad	= (isset($_REQUEST['txtCantidad'])?$_REQUEST['txtCantidad']:null);
                if(isset($_REQUEST['btnMas']))
                {
                    if ($hCodigo == 0)
                    {
                        $tabla		= "tblpedido";
                        $campos		= "idUsuario,fechaPedido,fechaEntrega,horaPedido,total";
                        $valores	= "$idusuario,'$txtFecha','$txtEntrega','$hora',0";
                        $bdConexion->insertarDB($tabla,$campos,$valores);
                        $_SESSION['idPedido'] = $bdConexion->retornarId();
                      
                    }
                       $hCodigo =   $_SESSION['idPedido'];
                    if($hCodigo>0)
                    {
                            $sqlMostrar = "SELECT l.precioCosto, l.titulo FROM tbllibro l WHERE l.idLibro = $idlibro ";				
                            $rsMostrar= $bdConexion->ejecutarSql($sqlMostrar);
                             while($fila = mysqli_fetch_array($rsMostrar))
                    {
                            $precio = $fila['precioCosto'];    
                    }
            
                    $tabla		= "tbldetpedido";
                    $campos		= "idPedido,idLibro,cantidad,total,eliminado,estado";
                    $valores	= "$hCodigo,$idlibro,$txtCantidad,$txtCantidad*$precio,0,'En proceso'";
                    $bdConexion->insertarDB($tabla,$campos,$valores);

                    $tabla	= "tblPedido";
                    $campos	= "total = (SELECT SUM(total) FROM tbldetpedido WHERE idPedido=$hCodigo and eliminado=0)";
                    $condicion	= "idPedido = $hCodigo";
                    $bdConexion->actualizarDB($tabla,$campos,$condicion);
                    }
                }
                 mostrarPrestamos($bdConexion,$hCodigo,$idlibro,$idusuario); 
              ?>   
              <br>
              <button name="btnMas" type="submit" value="Crear Pedido" class="btn btn-primary" id="btnMas" >Agregar Libro</button>
              <br>
            </table>
              </form>
           </div>
        </div>
      </div>
    </div>
  </div>
<?php
$PantallaCliente->footer();
?>
</html>
