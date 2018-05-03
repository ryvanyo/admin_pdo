<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrador - Inicio</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- css combinado: bootsrap, adminlte y skins -->
	<link rel="stylesheet" href="css/bootstrap-adminlte-skin.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>Adm</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Administrador</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Tasks: style can be found in dropdown.less -->
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="img/user2-160x160.jpg" class="user-image" alt="User Image">
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<a href="#" class="btn btn-default btn-flat">Cerrar sesión</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Alexander Pierce</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-user"></i> <span>Usuarios</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="listar_usuarios.php"><i class="fa fa-list"></i> Listar</a></li>
							<li><a href="registrar_usuario.php"><i class="fa fa-user-plus"></i> Registrar</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-cubes"></i> <span>Productos</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="listar_productos.php"><i class="fa fa-list"></i> Listar</a></li>
							<li><a href="registrar_producto.php"><i class="fa fa-plus"></i> Registrar</a></li>
						</ul>
					</li>
				</ul>
			</section>
		  <!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Pace page
					<small>Loading example</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="#">Examples</a></li>
					<li class="active">Pace page</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Title</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
									title="Collapse">
							  <i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							  <i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						Contenido de la página.
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						Footer
					</div>
					<!-- /.box-footer-->
				</div>
				<!-- /.box -->
			</section>
		  <!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0.0
			</div>
			<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">IO1</a>.</strong> Todos los derechos reservados.
		</footer>

	  <!-- Add the sidebar's background. This div must be placed
		   immediately after the control sidebar -->
	</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="js/bootstrap.min.js"></script>
	<!-- AdminLTE javascript -->
	<script src="js/adminlte.min.js"></script>
</body>
</html>
