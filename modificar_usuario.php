<?php
require_once 'functions.php';

/**
 * Realiza la validacion de los campos de usuario
 * @param array $usuario
 * @return array
 */
function validar_usuario($usuario){
	$errores = [];
	if (empty($usuario['nombre'])) {
		//no existe nombre o tiene un valor considerado vacio
		$errores['nombre'] = "El nombre es requerido.";
	}
	
	if (empty($usuario['apellido'])) { 
		//no existe apellido o tiene un valor considerado vacio
		$errores['apellido'] = "El apellido es requerido.";
	}
	
	if (empty($usuario['email'])) {
		//no existe email o tiene un valor considerado vacio
		$errores['email'] = "El email es requerido.";
	} else {
		//sino, existe email, entonces hay que verificar si es una direccion de correo valida
		if (!filter_var($usuario['email'], FILTER_VALIDATE_EMAIL)) {
			$errores['email'] = "No es una direcci&oacute;n de correo v&aacute;lida.";
		}
	}
	
	if (empty($usuario['login'])) {
		//no existe login o tiene un valor considerado vacio
		$errores['login'] = "El login es requerido.";
	}
	
	if (empty($usuario['password'])) {
		//no existe password o tiene un valor considerado vacio
		$errores['password'] = "El password es requerido.";
	}
	
	return $errores;
}

/**
 * Modifica un registro en la tabla usuario
 * @param array $usuario
 * @return array Devuelve un arreglo con los errores durante la modificacion. Si no hubo errores devuelve un arreglo vacio
 */
function modificar_usuario($usuario){
	//ANTES DE PROCESAR LOS DATOS RECIBIDOS DESDE EL USUARIO, HAY QUE VALIDAR
	$errores = validar_usuario($usuario);
	if (!empty($errores)) {
		return $errores;
	}
	
	$pdo = conectar();
	
	$sql = "UPDATE `usuario` SET "
		. "`nombre` = :nombre , "
		. "`apellido` = :apellido , "
		. "`email` = :email , "
		. "`login` = :login , "
		. "`password` = :password "
		. "WHERE `id`=".((int) $usuario['id']);
	
	$parametros_consulta = [
		':nombre' => ['value'=>$usuario['nombre'], 'type'=>PDO::PARAM_STR, 'length'=>100],
		':apellido' => ['value'=>$usuario['apellido'], 'type'=>PDO::PARAM_STR, 'length'=>100],
		':email' => ['value'=>$usuario['email'], 'type'=>PDO::PARAM_STR, 'length'=>255],
		':login' => ['value'=>$usuario['login'], 'type'=>PDO::PARAM_STR, 'length'=>50],
		':password' => ['value'=>$usuario['password'], 'type'=>PDO::PARAM_STR, 'length'=>50]
	];
	
	$resp = seleccionar($pdo, $sql, $parametros_consulta);
	
	if ($resp===false) {
		//fallo la consulta de insercion, 
		
		$error_message = "Error en la consulta de modificación.";
		return array('general'=>$error_message);
	} else {
		//se inserto correctamente
		return array();
	}
}

function buscar_usuario($id){
	if (empty($id)) {
		return array('error'=>'id de usuario no definido.');
	}
	
	$pdo = conectar();
	
	$sql = "SELECT * FROM usuario WHERE `id`=".((int) $id);
	$resp = seleccionar($pdo, $sql);
	
	if (empty($resp)) {
		return array('error'=>'No encontre el usuario '.$_GET['id'].'.');
	}
	
	return reset($resp);
}

$errores = [];
$usuario_vacio = $usuario = [
	'nombre' =>'',
	'apellido' =>'',
	'email' =>'',
	'login' =>'',
	'password' =>''
];

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		$usuario = buscar_usuario(@$_GET['id']);
		if (isset($usuario['error'])) {
			$errores['general'] = $usuario['error'];
			$usuario = $usuario_vacio;
		}
		break;
	case 'POST':
		$usuario = $_POST['usuario'];
		
		if (isset($usuario['error'])) {
			$errores['general'] = $usuario['error'];
			$usuario = $usuario_vacio;
		} else {
			$errores = modificar_usuario($usuario);
			if (empty($errores)) {
				$success_message = "Usuario modificado";
			}
		}
		break;
}

require_once 'parciales/before.php';
?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<i class="fa fa-user"></i> Modificar usuario
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
					<li><a href="listar_usuarios.php"><i class="fa fa-user"></i> Usuarios</a></li>
					<li class="active"><i class="fa fa-user-plus"></i> Modificar usuario</li>
				</ol>
			</section>
			<section class="content">
				<div class="row justify-content-center">
					<div class="col-md-6 col-md-offset-3">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-user-plus"></i> Modificar Usuario</h3>
							</div>
							<form role="form" method="post" action="">
								<input type="hidden" name="usuario[id]" value="<?php echo $usuario['id']; ?>">
								<div class="box-body">
									<?php if (!empty($errores['general'])) {
									?>
									<div class="callout callout-danger">
										<p><?php echo $errores['general']; ?></p>
									</div>
									<?php
									}
									if (!empty($success_message)) {
									?>
									<div class="callout callout-success">
										<p><?php echo $success_message; ?></p>
									</div>
									<?php
									}
									
									?>
									<div class="form-group <?php echo empty($errores['nombre']) ? "" : "has-error"; ?>">
										<label>Nombre</label>
										<input type="text" class="form-control" name="usuario[nombre]" value="<?php echo htmlencode($usuario['nombre']); ?>">
										<?php
										echo empty($errores['nombre']) ? '' : '<span class="help-block">'.$errores['nombre'].'</span>';
										?>
									</div>
									<div class="form-group <?php echo empty($errores['apellido']) ? "" : "has-error"; ?>">
										<label>Apellido</label>
										<input type="text" class="form-control" name="usuario[apellido]" value="<?php echo htmlencode($usuario['apellido']); ?>">
										<?php
										echo empty($errores['apellido']) ? '' : '<span class="help-block">'.$errores['apellido'].'</span>';
										?>
									</div>
									<div class="form-group <?php echo empty($errores['email']) ? "" : "has-error"; ?>">
										<label>Email</label>
										<input type="text" class="form-control" name="usuario[email]" value="<?php echo htmlencode($usuario['email']); ?>">
										<?php
										echo empty($errores['email']) ? '' : '<span class="help-block">'.$errores['email'].'</span>';
										?>
									</div>
									<div class="form-group <?php echo empty($errores['login']) ? "" : "has-error"; ?>">
										<label>Login</label>
										<input type="text" class="form-control" name="usuario[login]" value="<?php echo htmlencode($usuario['login']); ?>">
										<?php
										echo empty($errores['login']) ? '' : '<span class="help-block">'.$errores['login'].'</span>';
										?>
									</div>
									<div class="form-group <?php echo empty($errores['password']) ? "" : "has-error"; ?>">
										<label>Password</label>
										<input type="password" class="form-control" name="usuario[password]" value="<?php echo htmlencode($usuario['password']); ?>">
										<?php
										echo empty($errores['password']) ? '' : '<span class="help-block">'.$errores['password'].'</span>';
										?>
									</div>
								</div>
								<div class="box-footer">
									<button type="submit" class="btn btn-primary">Modificar</button>
									<a class="btn btn-default" href="listar_usuarios.php">Volver a la lista de usuarios</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
<?php
require_once 'parciales/after.php';