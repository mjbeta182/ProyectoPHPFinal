<?php
if(!isset($_SESSION)){
    session_start();
}
include('../clases/conexion.php');
$cod	= (isset($_REQUEST['cod'])?$_REQUEST['cod']:null);
$txtEmail	= (isset($_REQUEST['txtEmail'])?$_REQUEST['txtEmail']:null);
$txtClave   	= (isset($_REQUEST['txtClave'])?$_REQUEST['txtClave']:null); 

$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNombre 	= (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$txtDireccion	= (isset($_REQUEST['txtDireccion'])?$_REQUEST['txtDireccion']:null);
$txtTelefono	= (isset($_REQUEST['txtTelefono'])?$_REQUEST['txtTelefono']:null);
$txtCorreo 	= (isset($_REQUEST['txtCorreo'])?$_REQUEST['txtCorreo']:null);
$txtContrasena 	= (isset($_REQUEST['txtContrasena'])?$_REQUEST['txtContrasena']:null);
$txtContrasena2 = (isset($_REQUEST['txtContrasena2'])?$_REQUEST['txtContrasena2']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert'); 

//CUANDO INICIE SESION YA NO PODRA TENER HABILITADO EL REGISTRARSE
if (isset($_REQUEST['btnIngresar']))
{
                $_SESSION['persona']  = 'Acceder Registrarse';
                $idTipo = 0;
		print "CONSULTANDO DATOS DE USUARIO";
		 $sqlConsulta = "SELECT * FROM tblusuario 
		 WHERE email ='$txtEmail' AND contrasena='$txtClave'";
		  $resultado =  $bdConexion->ejecutarSql($sqlConsulta);
                    while($fila = mysqli_fetch_array($resultado))
                    {
                            $idTipo = $fila['idTipoUsuario'];
                            $idUsuario = $fila['idUsuario'];
                            $idPersona = $fila['idPersona'];
                            $_SESSION['usuario'] = $txtEmail;
                            $_SESSION['id'] = $idUsuario;
                            print $idTipo;
                    }
                    if ($idTipo == 0 )
                    {
                        
                        print 'usuario no existe';
                    }else{
                        
                        $sqlConsulta = "SELECT nombre FROM tblpersona 
			 WHERE idPersona =$idPersona";
			 $resultado =  $bdConexion->ejecutarSql($sqlConsulta);
			while($fila = mysqli_fetch_array($resultado))
			{
				$nombre = $fila['nombre'];
				$_SESSION['persona'] = $nombre;
			}
                    }
                 
                if($idTipo ==1 || $idTipo ==2){
                   header("location:../formularios/frmLibros.php");
                }
		else if($idTipo == 3)
		{
			 
			header("location:../index.php");
		}else
                {
                    print 'id tipo no existe';
                }
		
}//Fin de boton Registrar


if (isset($_REQUEST['btnRegistrarse']))
{
if($txtContrasena == $txtContrasena2)
    {
         print "INSERTAR";
		$tabla		= "tblpersona";
		$campos		= "nombre,telefono,direccion";
		$valores	= "'$txtNombre','$txtTelefono','$txtDireccion'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
		$hCodigo = $bdConexion->retornarId();
                $_SESSION['id'] = $hCodigo;
                if($hCodigo>0)
                {
                        $tabla		= "tblusuario";
                        $campos		= "idTipoUsuario,idPersona,contrasena,email";
                        $valores	= "3,$hCodigo,'$txtContrasena','$txtCorreo'";
                        $bdConexion->insertarDB($tabla,$campos,$valores);
                }
              
              $_SESSION['persona'] = $txtNombre;
              header("location:../index.php");  
    
    }
               
}//Fin de boton registrar


?>
