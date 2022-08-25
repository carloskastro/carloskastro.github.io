<!DOCTYPE html>
<html lang="es-CO" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="MASE">
	<meta name="description" content="Aplicativo web para matriculas del Sena">
	<meta name="keywords" content="Sena, SENA, sena">
	<meta name="theme-color" content="#ff2e01">
	<meta name="MobileOptimized" content="width">
	<meta name="HandhledFriendly" content="true">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-traslucent">
	<title>&copy; mase</title>
	<!--Favicon-->
	<link rel="icon" type="image/x-icon" href="../assets/img/logosena.png">

	<!--Bootstrap 5-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>

	
	<!--
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.js"></script>-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">	
</head>
<body class="bg-light d-flex flex-column h-100">

	<?php
	require_once 'conn.php';
	session_start();

	if (isset($_SESSION['aprendiz'])) {
		$search=$conn->prepare('SELECT * FROM aprendiz WHERE idaprendiz=?');
		$search->bindparam(1,$_SESSION['aprendiz']);
		$search->execute();

		$data=$search->fetch(PDO::FETCH_ASSOC);

		$user=null;

		if (count($data)>0) {
			$user=$data;
		}

	if (!empty($user)) { //comprobar que la variable $user contega información
		?>

		<!--Navbar-->
		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<div class="container-fluid">
					<a class="navbar-brand" href="#"><img src="../assets/img/logosena.png" style="width: 40px;"></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">

						<ul class="nav navbar-nav me-auto" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="home">Home</a>
							</li>
						</ul>

						<kbd class="bg-warning">Hola <?php echo $user['nombre']; ?></kbd>
						<div class="navbar-brand dropdown">
							<button type="button" class="navbar-brand btn btn-link dropdown-toggle" data-bs-toggle="dropdown">
								<img src="../assets/img/img_avatar.png" alt="Logo" style="width:40px;" class="rounded-pill">
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Datos</a></li>
								<li><a class="dropdown-item" href="logout">Salir</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</nav>
		</header>
		<!--Navbar-->

		<!--Content-->
		<main class="mt-5 pt-5">

				<div class="container text-center">
					<h3>Bienvenido</h3>
					<p>Hola usuario aquí podrás diligenciar los datos para generar los formatos correspondientes a la matrícula Sena.</p>
					<div class="row">
						<div class="col-4">
							<div class="card-body bg-dark">
							  	<a href="#" class="card-title"><i class="fa-solid fa-id-card fa-2x text-primary"></i></a>
							  	<p class="card-text text-white">Ficha</p>
							</div>
						</div>
						<div class="col-4">
							<div class="card-body bg-dark text-center">
							  	<a href="#" class="card-title"><i class="fa-solid fa-hand fa-2x text-danger"></i></a>
							  	<p class="card-text text-white">Compromiso</p>
							</div>
						</div>
						<div class="col-4">
							<div class="card-body bg-dark">
							  	<a href="#" class="card-title"><i class="fa-solid fa-id-card-clip fa-2x text-warning"></i></a>
							  	<p class="card-text text-white">Tratamiento</p>
							</div>
						</div>						
					</div>
					<img src="../assets/img/logoasem.png" alt="LogoAsem"  style="width:260px;">
				</div>

		</main>
		<!--Content-->

		<!--Footer-->
		<footer class="footer mt-auto py-3 bg-dark">
			<div class="container text-center">
				<span class="text-muted">&copy; Copyright ASEM.</span>
			</div>
		</footer>
		<!--Footer-->
		
		<?php
	}
}else{
	header('location: ./');
}
?>

</body>
</html>