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
 * Inserta un registro en la tabla usuario
 * @param array $usuario
 * @return array Devuelve un arreglo con los errores durante el registro. Si no hubo errores devuelve un arreglo vacio
 */
function registrar_usuario($usuario){
	//ANTES DE PROCESAR LOS DATOS RECIBIDOS DESDE EL USUARIO, HAY QUE VALIDAR
	$errores = validar_usuario($usuario);
	if (!empty($errores)) {
		return $errores;
	}
	
	$pdo = conectar();
	
	//paso 3. ejecutar la consulta, primero armamos la consulta
	//notese como se escapan los valores a ser insertados, para evitar ataques de sql injection,
	//con la funcion mysql_real_escape
	$sql_insertar = 'INSERT INTO `usuario`(nombre, apellido, email, `login`, `password`) '
		. 'VALUES( :nombre , :apellido , :email , :login , :password )';
	
	$parametros_consulta = [
		':nombre' => ['value'=>$usuario['nombre'], 'type'=>PDO::PARAM_STR, 'length'=>100],
		':apellido' => ['value'=>$usuario['apellido'], 'type'=>PDO::PARAM_STR, 'length'=>100],
		':email' => ['value'=>$usuario['email'], 'type'=>PDO::PARAM_STR, 'length'=>255],
		':login' => ['value'=>$usuario['login'], 'type'=>PDO::PARAM_STR, 'length'=>50],
		':password' => ['value'=>$usuario['password'], 'type'=>PDO::PARAM_STR, 'length'=>50]
	];
	$resp = seleccionar($pdo, $sql_insertar, $parametros_consulta);
	
	if ($resp===false) {
		//fallo la consulta de insercion, 
		//la funcion mysql_errno nos devuelve el codigo (numero identificador) de la ultima consulta
		//la funcion mysql_error nos devuelve el mensaje de error de la ultima consulta
		$error_message = "Error al registrar al usuario.";
		return array('general'=>$error_message);
	} else {
		//se inserto correctamente
		return array();
	}
}

$usuario_vacio = $usuario = [
	'nombre' =>'',
	'apellido' =>'',
	'email' =>'',
	'login' =>'',
	'password' =>''
];

if ($_SERVER['REQUEST_METHOD']=='GET') {
	//Si esta pagina se solicita mediante GET
	$usuario = $usuario_vacio;
} else {
	//sino, se solicita mediante post, es decir, al enviar el formulario
	
	//La primera validacion
	$errores = [];
	if (!isset($_POST['usuario'])) {
		$errores = ['general' => "Falta la informaci&oacute;n del usuario."];
	} else {
		$usuario = $_POST['usuario'];
		$errores = registrar_usuario($usuario);
		if (empty($errores)) {
			$success_message = "Usuario registrado.";
			$usuario = $usuario_vacio;
		}
	}
}

require_once 'parciales/before.php';
?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<i class="fa fa-user"></i> Registrar usuario
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
					<li><a href="listar_usuarios.php"><i class="fa fa-user"></i> Usuarios</a></li>
					<li class="active"><i class="fa fa-user-plus"></i> Registrar usuario</li>
				</ol>
			</section>
			<section class="content">
				<div class="row justify-content-center">
					<div class="col-md-6 col-md-offset-3">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar Usuario</h3>
							</div>
							<form role="form" method="post" action="">
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
									<button type="submit" class="btn btn-primary">Registrar</button>
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