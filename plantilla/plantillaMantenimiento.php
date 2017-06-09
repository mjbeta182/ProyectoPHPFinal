<?php

 class PantallaMantenimiento
 {
 	private $titulo;
 	private $puntos;
 	private $usuario ;
 	private $dir;
 	function __construct($titulo,$puntos,$usuario,$dir)
 	{
 		$this->titulo = $titulo;
 		$this->puntos = $puntos;
 		$this->usuario = $usuario;
 		$this->dir = $dir;
 	}

 	function header(){
 		print '
		  <!--////////////HEADER////////////-->
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>'.$this->titulo.'</title>
		    <link href="'.$this->puntos.'css/bootstrap.min.css" rel="stylesheet">
		    <link href="'.$this->puntos.'css/stylefrm.css" rel="stylesheet">
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                    <script src="'.$this->puntos.'js/jquery.min.js"></script>
                    <script src="'.$this->puntos.'js/mascara.js" type="text/javascript"></script>
                    <script src="'.$this->puntos.'js/validar.js" type="text/javascript"></script>
		    <script src="'.$this->puntos.'js/scripts.js"></script>
		    <script src="'.$this->puntos.'js/funciones_ajax.js"></script>
		  </head>
 		';
 	}
 	function barraMenu($num){
            if($num ==1)
            {
               print '
			<!--////////////BARRA DE MENU ADMINISTRADOR////////////-->
			  <body>
			    <div class="container-fluid">
				<div class="row1">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li>
								<a href="frmMenuAdministrador.php" class="breadc"><i class="fa fa-home" style="font-size:24px"></i></a> 
							</li>
							<li>
								<a href="frmMenuEmpleado.php" class="breadc"><i class="fa fa-user" style="font-size:24px">'.' '.$this->usuario.'</i></a>
							</li>
							<li>
								<a href="'.$this->puntos.'procesos/cerrarsesion.php" class="breadc"><i class="fa fa-home" style="font-size:24px">Cerrar Sesion</i></a> 
							</li>
						</ul>
					</div>
				</div>
							<div class="row2">
							<div class="col-md-12">
							<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								 
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
								</button> <a class="navbar-brand" href="#">LIBRARY</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
										<li class="dropdown">
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown">EMPLEADOS<strong class="caret"></strong></a>
										<ul class="dropdown-menu">
											<li>
												<a href="frmEmpleado.php">Gestionar Empleados</a>
											</li>
											<li>
												<a href="frmTipoUsuario.php">Tipo de Usuario</a>
											</li>
										</ul>
									</li>
									<li class="dropdown">
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown">MANTENIMIENTO DE BIBLIOTECA<strong class="caret"></strong></a>
										<ul class="dropdown-menu">
											<li>
												<a href="frmAutor.php">Autores</a>
											</li>
											<li>
												<a href="frmNacionalidad.php">Nacionalidad</a>
											</li>
											<li>
												<a href="frmLibros.php">Libros</a>
											</li>
                                                                                        <li>
												<a href="frmEditorial.php">Editorial</a>
											</li>
                                                                                        <li>
												<a href="frmCategoria.php">Categoria</a>
											</li>
										</ul>
                                                                        <li>
										<a href="frmPedido.php">PEDIDO</a>
									</li>
									</li>
								</ul>
							</div>
						</nav>
							</div>
						</div>
	'; 
            }else{
                print '
			<!--////////////BARRA DE MENU////////////-->
			  <body>
			    <div class="container-fluid">
				<div class="row1">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li>
								<a href="#" class="breadc"><i class="fa fa-home" style="font-size:24px"></i></a> 
							</li>
							<li>
								<a href="#" class="breadc"><i class="fa fa-user" style="font-size:24px">'.' '.$this->usuario.'</i></a>
							</li>
							<li>
								<a href="'.$this->puntos.'procesos/cerrarsesion.php" class="breadc"><i class="fa fa-home" style="font-size:24px">Cerrar Sesion</i></a> 
							</li>
						</ul>
					</div>
				</div>
							<div class="row2">
							<div class="col-md-12">
							<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								 
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
								</button> <a class="navbar-brand" href="#">LIBRARY</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li class="dropdown">
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown">MANTENIMIENTO DE BIBLIOTECA<strong class="caret"></strong></a>
										<ul class="dropdown-menu">
											<li>
												<a href="frmAutor.php">Autores</a>
											</li>
											<li>
												<a href="frmNacionalidad.php">Nacionalidad</a>
											</li>
											<li>
												<a href="frmLibros.php">Libros</a>
											</li>
                                                                                        <li>
												<a href="frmEditorial.php">Editorial</a>
											</li>
                                                                                        <li>
												<a href="frmCategoria.php">Categoria</a>
											</li>
										</ul>
                                                                        <li>
										<a href="frmPedido.php">PEDIDO</a>
									</li>
									</li>
								</ul>
							</div>
						</nav>
							</div>
						</div>
	';
            }
 		
 	}
 	function footer(){
 		print '
	<!--////////////////footer/////////////////////-->
	<div class="row6">
		<div class="col-md-12" id="footer">	 
			<footer>
				 <strong>Derechos Reservados</strong>
			</footer>
		</div>
	</div>
</div>
</div>
  </body>
 		';
 	}
 }
?>