<?php
require_once 'functions.php';

$pdo = conectar();

function listar_usuarios($pagina, $tamano_pagina=10){
	global $pdo;
	
	$sql_contar = "SELECT COUNT(*) FROM `usuario`";
	$resp = seleccionar($pdo, $sql_contar);
	if ($resp===false) {
		return array('error'=>'Ocurri&oacute; un error al contar los registros.');
	}
	$resp = reset(reset($resp));
	
	//la funcion mysql_fetch_field nos permite obtener el primer campo del primer registro
	//en el resultado (recordset) de la ultima consulta realizada
	$num_registros = (int) $resp;
	$num_paginas = ceil($num_registros/$tamano_pagina);
	
	$pagina = ($pagina<1) ? 1 : $pagina;
	$pagina = ($pagina>$num_paginas) ? $num_paginas : $pagina;
	
	//consulta para obtener los usuarios
	$sql = "SELECT * FROM `usuario` "
		. "ORDER BY `apellido`, `nombre` "
		. "LIMIT ".( ($pagina-1) * $tamano_pagina).", ".$tamano_pagina;
	$rows = seleccionar($pdo, $sql);
	
	if ($rows===FALSE) {
		return ['error'=>'Ocurri&oacute; un error al ejecutar la consulta de b&uacute;squeda.'];
	}

	return array(
		'paginacion' => [
			'pagina' => $pagina,
			'num_paginas' => $num_paginas,
			'num_registros' => $num_registros,
			'tamano_pagina' => $tamano_pagina
		],
		'datos'=>$rows
	);
}

$pagina = 1;
if (isset($_GET['pagina'])) {
	$pagina = (int) $_GET['pagina'];
}
$usuarios = listar_usuarios($pagina);

require_once 'parciales/before.php';
?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<i class="fa fa-user"></i> Listar usuarios
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
					<li><i class="fa fa-user"></i> Usuarios</li>
					<li class="active"><i class="fa fa-list"></i> Listar usuarios</li>
				</ol>
				<?php
				if (!empty($_GET['error'])) {
				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $_GET['error']; ?>
				</div>
				<?php
				}
				if (!empty($_GET['success'])) {
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $_GET['success']; ?>
				</div>
				<?php
				}
				?>	
			</section>
			
			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<a href="registrar_usuario.php"><i class="fa fa-user-plus"></i> Registrar usuario</a>
					</div>
					<div class="box-body with-border">
						<?php
						if (!empty($usuarios['error'])) {
						?>
						<div class="callout callout-danger">
							<h4>Usuarios</h4>

							<p><?php echo $usuarios['error']; ?></p>
						</div>
						<?php
						} else {
							
						?>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Apellido</th>
									<th>Nombre</th>
									<th>Email</th>
									<th>Login</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($usuarios['datos'] as $usuario){
								?>
								<tr>
									<td><?php echo htmlencode($usuario['apellido']); ?></td>
									<td><?php echo htmlencode($usuario['nombre']); ?></td>
									<td><?php echo htmlencode($usuario['email']); ?></td>
									<td><?php echo htmlencode($usuario['login']); ?></td>
									<td>
										<?php
										$url_editar = 'modificar_usuario.php?id='.$usuario['id'];
										?>
										<a href="<?php echo $url_editar; ?>" class="fa fa-pencil" title="Modificar"></a>
										<?php
										$url_borrar = 'borrar_usuario.php?id='.$usuario['id'];
										?>&nbsp;
										<a href="<?php echo $url_borrar; ?>" class="fa fa-trash link-borrar" title="Borrar"></a>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<?php 
						}
						?>
					</div>
					<!-- /.box-body -->
					<?php 
					if (isset($usuarios['paginacion'])) { 
					?>
					<div class="box-footer  ">
						<div class="row">
							<div class="col-sm-5">
								<div class="dataTables_info">
									<?php 
									$paginacion = $usuarios['paginacion'];
									echo "Mostrando ".((($paginacion['pagina']-1)*$paginacion['tamano_pagina'])+1)
										." al ".($paginacion['pagina']*$paginacion['tamano_pagina'])
										." de ".($paginacion['num_registros']);
									?>
								</div>
							</div>
							<?php
							if ($paginacion['num_paginas']>1) {
							?>
							<div class="col-sm-7 dataTables_wrapper">
								<div class="dataTables_paginate paging_simple_numbers">
									<ul class="pagination">
										<?php
										for($i=1; $i<=$paginacion['num_paginas']; $i++){
										?>
										<li class="paginate_button <?php echo ($paginacion['pagina']==$i) ? 'active' : ''; ?>">
											<a href="<?php echo $_SERVER['PHP_SELF'].'?pagina='.$i; ?>"><?php echo $i; ?></a>
										</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
					<!-- /.box-footer-->
					<?php 
					}
					?>
				</div>
				<!-- /.box -->
			</section>
		  <!-- /.content -->
		</div>
		<script>
			jQuery('.link-borrar').on('click', function(e){
				var resp = window.confirm('Confirma que desea eliminar el usuario?');
				if (!resp) {
					e.preventDefault();
				}
			});
		</script>
<?php
require_once 'parciales/after.php';