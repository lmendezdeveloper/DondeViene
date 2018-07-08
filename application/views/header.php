<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="rendicionsostenedor.cl desarrollado para Profesor Luis Pérez Urrutia">
  <meta name="author" content="Luis Méndez Méndez">

  <title>Donde Viene</title>
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/icono.ico">

  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Custom CSS -->	
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" />
  
  <!-- jQuery v3.3.1 -->
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
 
  <!-- Sweet Alert -->
  <script src="<?php echo base_url() ?>assets/js/sweetalert.min.js" type="text/javascript"></script>
  
  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>  
  
  <!-- Custom jQuery -->
  <script src="<?php echo base_url() ?>assets/js/custom/principal.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.rut.js" type="text/javascript"></script>

</head>

<body class="home-body"> 
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
		<!-- Logo -->
		<a class="navbar-brand" href="#" id="item_inicio"><i class="fas fa-map-marker-alt"></i>&nbspDonde Viene</a>
		&nbsp;&nbsp;
		<!-- Navbar -->
		<ul class="navbar-nav">
			<!-- Botones -->
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Mantenedores
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#" id="item_choferes">Choferes</a>
				<a class="dropdown-item" href="#" id="item_proveedor">Microbus</a>
				<a class="dropdown-item" href="#" id="item_proveedor">Lineas</a>
				<a class="dropdown-item" href="#" id="item_proveedor">Horarios</a>
				<a class="dropdown-item" href="#" id="item_proveedor">Tarifas</a>
				<a class="dropdown-item" href="#" id="item_proveedor">Trayectos</a>
			</div>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Gestores
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">a</a>
				<a class="dropdown-item" href="#">b</a>
				<a class="dropdown-item" href="#">c</a>
			</div>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Reportes
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">a</a>
				<a class="dropdown-item" href="#">b</a>
				<a class="dropdown-item" href="#">c</a>
			</div>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
			<a class="nav-link"  href="logout">Cerrar Sesión&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
			</li>
		</ul>
	</nav>
	<main>