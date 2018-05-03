<?php
require_once 'config.php';

function htmlencode($str){
	return htmlentities($str, ENT_QUOTES, 'utf-8');
}

/**
 * Conectar a la base de datos
 * @global type $mysql
 * @return \PDO
 */
function conectar() {
	global $mysql;
	
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', $mysql['user'], $mysql['password']);
	} catch (Exception $e) {
		$message = $e->getCode().' : '.$e->getMessage();
		die($message);
	}
	return $pdo;
}

/**
 * 
 * @param PDO $pdo
 * @param string $consulta
 * @param array $parametros
 * @return array
 */
function seleccionar($pdo, $consulta, $parametros=[]){
	try {
		$statement = $pdo->prepare($consulta);
	} catch(Exception $e) {
		return false;
	}
	
	if (!empty($parametros)) {
		foreach($parametros as $key=>$info){
			if (isset($info['length'])) {
				$statement->bindParam($key, $info['value'], $info['type'], $info['length']);
			} else {
				$statement->bindParam($key, $info['value'], $info['type']);
			}
		}
	}
	
	$resp = $statement->execute();
	if ($resp) {
		return $statement->fetchAll();
	} else {
		return false;
	}
}

/**
 * Valida que un archivo subido no tenga errores y tenga un tamanho mayor a cero
 * @param string $field
 * @return string
 */
function file_uploaded($field){
    if (!isset($_FILES[$field])) {
        return "No se recibio el archivo en el campo ".$field;
    }
    $archivo = $_FILES[$field];
    if ($archivo['error']!=0) {
        return "Error ".$archivo['error']." al subir el archivo.";
    }
    if ($archivo['size']==0) {
        return "El archivo recibido esta vacio.";
    }
    return $archivo;
}


/**
  * Genera un nombre de archivo unico dentro de un folder
 * @param string $extension
 * @param type $folder
 * @return boolean|string false si no se pudo crear un nombre de archivo unico o la ruta del archivo creado
 */
function nombre_archivo_unico($extension, $folder){
    if (!is_dir($folder)) {
        return false;
    }
    
    $random_name = date("YmdHis").rand(100,999);
    while(is_file($folder."/".$random_name.".".$extension)) {
        $random_name = date("YmdHis").rand(100,999);
    }
    
    $file_path = $folder."/".$random_name.".".$extension;
    
    /*$fp = fopen($file_path, 'w+');
    fclose($fp);*/
    
    return $file_path;
}

/**
 * procesa una imagen subida desde un formulario en base a la configuracion de $pictures
 * @param array $file el arreglo del archivo en $_FILES
 */
function procesar_image($file){
    global $pictures;
	
    if (!is_uploaded_file($file['tmp_name'])) {
        return "El archivo no se subio adecuadamente";
    }
    
	//al tratar de abrir el archivo con las funciones GD
    //validamos que sea una imagen verdadera
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    switch(strtolower($extension)){
        case 'jpg':
        case 'jpeg':
            $img = imagecreatefromjpeg($file['tmp_name']); //gd
            break;
        case 'gif':
            $img = imagecreatefromgif($file['tmp_name']);
            break;
        case 'png':
            $img = imagecreatefrompng($file['tmp_name']);
            break;
        default:
            $img = false;
    }
    if ($img==false) {
        return "El archivo subido no es una imagen valida.";
    }
    
    $image_path = nombre_archivo_unico($extension, $pictures['dir']);
    if ($image_path==false) {
        return "Error al crear el archivo";
    }
	
	//ruta del archivo unico
	$image_pathinfo = pathinfo($image_path);
    
	$size = getimagesize($file['tmp_name']);
	$width = $size[0];
	$height = $size[1];
	
	
	foreach ($pictures['thumbs'] as $thumb_name => $thumb_info) {
		//ruta de la miniatura
		$thumb_path = $image_pathinfo['dirname'].'/'.$image_pathinfo['filename'].'-'.$thumb_name.'.'.$image_pathinfo['extension'];
		
		if ($width>$thumb_info['width'] || $height>$thumb_info['height']) {
			if (empty($thumb_info['crop'])) {
				$thumb_width = ($height/$width) * $thumb_info['width'];
				$thumb_height = ($width/$height) * $thumb_info['height'];
			} else {
				//corregir para thumbnails con crop
				$thumb_width = ($height/$width) * $thumb_info['width'];
				$thumb_height = ($width/$height) * $thumb_info['height'];
			}
			
			$thumbnail = imagecreatetruecolor($thumb_width, $thumb_height);
			
			$resized = imagecopyresampled(
				$thumbnail, //$dst_image, 
				$img, //$src_image, 
				0, //$dst_x, 
				0, //$dst_y, 
				0, //$src_x, 
				0, //$src_y, 
				$thumb_width, // $dst_w, 
				$thumb_height, //$dst_h, 
				$width, //$src_w, 
				$height //$src_h
			);
			
			switch(strtolower($extension)){
				case 'jpg':
				case 'jpeg':
					imagejpeg($thumbnail, $thumb_path);
					break;
				case 'gif':
					imagegif($thumbnail, $thumb_path);
					break;
				case 'png':
					imagepng($thumbnail, $thumb_path);
			}
		}
	}// end for
	move_uploaded_file($file['tmp_name'], $image_path);
}