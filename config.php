<?php
/* informacion de conexion a la base de datos */
$mysql = [
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'dbname' => 'tienda'
];

/* configuracion de las imagenes y los thumbnails */
$pictures = [
    'dir' => __DIR__.'/pictures',
    'thumbs' => [
        'small' => ['width'=>30, 'height'=>30, 'crop'=>true],
        'medium' => ['width'=>200, 'height'=>100],
        'large'=> ['width'=>300, 'height'=>200]
    ]
];