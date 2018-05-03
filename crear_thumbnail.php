<?php 



require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $imagen = file_uploaded('archivo');
	
    if (is_array($imagen)) {
        $resp = procesar_image($imagen);
    }
} else {
	$ruta = "tito.gif";

	$path = pathinfo($ruta);
	//print_r($path);
	//exit();	
}
require_once 'parciales/before.php';
?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Pace page
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
					<li><a href="#">Ejemplos</a></li>
					<li class="active">Crear Thumbnail</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Crear Thumbnail</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
									title="Collapse">
							  <i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							  <i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
                        <form method="post" enctype="multipart/form-data" action="crear_thumbnail.php">
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" name="archivo">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
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

<?php require_once 'parciales/after.php'; ?>