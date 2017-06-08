<!DOCTYPE>
<html lang="es">
    <meta charset="UTF-8">
<?php
//Archivo que tiene la pantalla y estilo por parte del cliente
include('../plantilla/plantillaCliente.php');
include('../procesos/acceder.php');
$titulo = 'Acceder / Registrarse';
$puntos = '../';
$usuario= 'Acceder  Registrarse';
$dir = 'index.php';
$PantallaCliente = new PantallaCliente($titulo,$puntos,$usuario,$dir);
$PantallaCliente->header();
$PantallaCliente->barraMenu();
?>
<!--///////////FORMULARIO DE LOGIN Y REGISTRO////////////-->
	<div class="row3">
		<div class="col-md-12">
			<h3 class="text-center text-muted" id="heading">
				<strong>ACCEDER / REGISTRARSE</strong>
			</h3>
		</div>
	</div>
	<div class="row3">
		 <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Acceder</a></li>
        <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Registrarse</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
          <h3>Ingrese a su cuenta</h3>
          <hr>
          <form role="form" method="POST" action="#">
            <label class="sr-only" for="user">Email</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?=$txtEmail?>" placeholder="Email" required="true">
              <input type="hidden" id="cod" name="cod" value="<?=$cod?>" >
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="txtClave" name="txtClave" placeholder="Contraseña" value="<?=$txtClave?>" required="true">
            </div>
            <button type="submit" class="btn btn-warning" name="btnIngresar" id="btnIngresar" >Ingresar</button>
          </form>
        </div>
        <!---->
        <div role="tabpanel" class="tab-pane" id="register">
          <h3>Crear una cuenta nueva</h3>
          <hr>
          <form role="form" action="#" method="GET">
            <label class="sr-only" for="user">Nombre</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="txtNombre" placeholder="Nombre Completo" name="txtNombre" value="<?=$txtNombre?>">
               <input type="hidden" class="form-control" id="hCodigo" name="hCodigo" placeholder="Codigo" readonly="" value="<?=$hCodigo?>">
            </div>
            <br>
            <label class="sr-only" for="user">Direccion</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" value="<?=$txtDireccion?>">
            </div>
            <br>
            <label class="sr-only" for="user">Telefono</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?=$txtTelefono?>" >
            </div>
            <br>
            <label class="sr-only" for="email">Email</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Email" value="<?=$txtCorreo?>">
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="txtContrasena" name="txtContrasena" placeholder="Contraseña" value="<?=$txtContrasena?>">
            </div>
            <br>
             <label class="sr-only" for="inputPassword">Confirme Contraseña</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="txtContrasena2" name="txtContrasena2" placeholder="Confirmar Contraseña" value="<?=$txtContrasena2?>">
            </div>
            <br>
            <button type="submit" class="btn btn-warning" name="btnRegistrarse">Registrarse</button>
          </form>
        </div>
      </div>
    </div>
	</div>
<?php
$PantallaCliente->footer();
?>
</html>