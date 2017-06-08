<?php

 class PantallaCliente 
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
		    <link href="'.$this->puntos.'css/style.css" rel="stylesheet">
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
		    <script src="'.$this->puntos.'js/jquery.min.js"></script>
                    <script src="'.$this->puntos.'js/jquery.js" type="text/javascript"></script>
                    <script src="'.$this->puntos.'js/mascara.js" type="text/javascript"></script>
                    <script src="'.$this->puntos.'js/validar.js" type="text/javascript"></script>    
                    <script src="'.$this->puntos.'js/bootstrap.min.js"></script>
		    <script src="'.$this->puntos.'js/scripts.js"></script>
                    <script src="'.$this->puntos.'js/funciones_ajax.js"></script>
		  </head>
 		';
 	}
        //Agregar formulario Libro y mandar como parametro el value nombre de categoria 
 	function barraMenu(){
 		print '
			<!--////////////BARRA DE MENU////////////-->
			  <body>
			    <div class="container-fluid">
				<div class="row1">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li>
								<a href="'.$this->puntos.'index.php" class="breadc"><i class="fa fa-home" style="font-size:24px"></i></a> 
							</li>
							<li>
								<a href="'.$this->puntos.$this->dir.'" class="breadc" ><i class="fa fa-user" style="font-size:24px">'.' '.$this->usuario.'</i></a>
							</li>
							<li>
								<a href="'.$this->puntos.'procesos/cerrarsesion.php" class="breadc">Cerrar Sesion</a>
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
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<strong class="caret"></strong></a>
										<ul class="dropdown-menu">
                                                                                        <li><a href="'.$this->puntos.'formularios/libros.php?idCat=1">Tecnologia</a></li>
                                                                                        <li><a href="'.$this->puntos.'formularios/libros.php?idCat=2">Drama</a></li>
                                                                                         <li><a href="'.$this->puntos.'formularios/libros.php?idCat=3">Lirica</a></li>
                                                                                         <li><a href="'.$this->puntos.'formularios/libros.php?idCat=4">Salud</a></li>
                                                                                         <li><a href="'.$this->puntos.'formularios/libros.php?idCat=5">Ciencia</a></li>
                                                                                         <li><a href="'.$this->puntos.'formularios/libros.php?idCat=6">Thriller</a></li>
                                                                                        <li><a href="'.$this->puntos.'formularios/libros.php?idCat=7">Romance</a></li>
											<li><a href="'.$this->puntos.'formularios/libros.php?idCat=8">Aventura</a></li>                                                                          
											<li><a href="'.$this->puntos.'formularios/libros.php?idCat=9">Terror</a></li>
											<li><a href="'.$this->puntos.'formularios/libros.php?idCat=10">Ciencia Ficcion</a></li>
                                                                                        <li><a href="'.$this->puntos.'formularios/libros.php?idCat=11">Investigacion</a></li>
											<li><a href="'.$this->puntos.'formularios/libros.php?idCat=12">Infantil</a></li>
											<li><a href="'.$this->puntos.'formularios/libros.php?idCat=13">Autoayuda</a></li>
                                                                                        <li><a href="'.$this->puntos.'formularios/libros.php?idCat=14">Cocina</a></li>
											<li><a href="'.$this->puntos.'formularios/libros.php?idCat=15">Deportes</a></li>
										</ul>
									</li>
	
									<li>
										<a href="#">Contactanos</a>
									</li>
									<li class="dropdown">
										 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Otros Recursos<strong class="caret"></strong></a>
										<ul class="dropdown-menu">
											<li>
												<a href="#">Action</a>
											</li>
											<li>
												<a href="#">Another action</a>
											</li>
											<li>
												<a href="#">Something else here</a>
											</li>
										</ul>
									</li>
								</ul>
								<form class="navbar-form navbar-left" role="search">
									<div class="form-group">
										<input type="text" class="form-control" style="width:400px;">
									</div> 
									<button type="submit" class="btn btn-default">
										Buscar
									</button>
								</form>
							</div>
						</nav>
							</div>
						</div>
	';
 	}

 	function slide(){
 		print '
			<!--////////////SLIDER////////////-->		
	<div class="row1">
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-474903" data-ride="carousel">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-474903">
					</li>
					<li data-slide-to="1" data-target="#carousel-474903">
					</li>
					<li data-slide-to="2" data-target="#carousel-474903">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="Carousel Bootstrap First" src="'.$this->puntos.'imagenes/slide1.jpg">
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Second" src="'.$this->puntos.'imagenes/slide2.jpg">
						<div class="carousel-caption">
							<!--<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.
							</p>-->
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Third" src="'.$this->puntos.'imagenes/slide3.jpg">
						<div class="carousel-caption">
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-474903" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-474903" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div><!--fin carousel-->
		</div>
	</div>
 		';
 	}
 	function presentacion(){
 		print '
 			<!--/////////////PRESENTACION///////////////-->
			<div class="row5">
		<div class="col-md-4">
			<h4 class="text-center text-muted">
				<strong>SOBRE NOSOTROS</strong>
			</h4>
			<hr>
			<p >
				Library es un nuevo portal en Internet que da acceso a todo un 
                                universo literario.<br>
                                El catálogo de libros de organiza por temáticas o categorias donde encontraras una gran cantidad de libros a tu disposicion.<br><br>
				<strong>Direccion:</strong><br> Alameda Franklin Delano Roosevelt, San Salvador.<br>
				<strong>Telefono:</strong><br> 7244-0887.<br>
				<strong>email:</strong><br> library@gmail.com
			</p>
		</div>
		<div class="col-md-4">
			<h4 class="text-center text-muted">
				<strong>UBICACION</strong>
			</h4>
			<hr>
			<!--Codigo para agregar la API de google maps-->
			
			<iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.28259846828!2d-89.22662258573826!3d13.701326590380122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6330410eacae2d%3A0xf3bd10411c7f3afb!2sMonumento+al+Divino+Salvador+del+Mundo!5e0!3m2!1ses!2ssv!4v1496853147833" 
                        width="400" height="300" frameborder="0" style="border:0" allowfullscreen>
                        </iframe>

                        <script src="http://code.jquery.com/jquery-latest.js"></script>
		    <!--Fin de codigo para el mapa de Google maps-->

		</div>
		<div class="col-md-4">
			<form role="form">
				<div class="form-group">
					<h4 class="text-center text-muted">
					<strong>CONTACTANOS</strong>
					</h4>
					<hr>
					<label for="exampleInputEmail1">
						Nombre
					</label>
					<input type="text" class="form-control" id="exampleInputEmail1">
					</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Email
					</label>
					<input type="email" class="form-control" id="exampleInputEmail1">
				</div>
				<div class="form-group"> 
					<label for="exampleInputPassword1">
						Mensaje
					</label>
					<textarea class="form-control" id="areaTexto"></textarea>
				</div>
				<button type="submit" class="btn btn-default">
					Enviar
				</button>
			</form>
		</div>
	</div>
 		';
 	}
 	function footer(){
 		print '
	<!--/////////////////////////////////Redes sociales y footer/////////////////////////////////-->
	<div class="row6">
		<div class="col-md-12" id="redes">	 
				<a><i id="icono"  class="fa fa-facebook-square" style="font-size:36px"></i></a>
				<a><i id="icono"  class="fa fa-twitter-square" style="font-size:36px"></i></a>
				<a><i id="icono"  class="fa fa-google-plus-square" style="font-size:36px"></i></a>
		</div>
	</div>
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
