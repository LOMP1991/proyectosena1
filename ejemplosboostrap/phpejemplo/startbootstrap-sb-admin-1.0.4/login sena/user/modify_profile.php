<?php

//llamar las sesiones
require'../class/sessions.php';
$objSes = new Sessions();
$objSes->init();

$nameU = $objSes->get('usuario');
$idUse = $objSes->get('id_usuario');

//llamamos la clase file
require'../class/files.php';
$objFile = new Files();

$idUser = $objSes->get('id_usuario');

//print_r($_SESSION);

//vamos a armar la ruta para cargar la imagen
$path = $objFile->fix_path($idUser);

//cambiar el nombre del archivo

$file = $objFile->change_name();

$success = $objFile->upload_file($file, $path);

$newPath = explode('..', $success);

$size = count($newPath);

$path = 'http://localhost:8080/proyectosena\ejemplosboostrap\phpejemplo\startbootstrap-sb-admin-1.0.4\login sena' . $newPath[$size-1];

//llamamos la clase database
require'../class/database.php';

//llamamos la clase users
require'../class/users.php';
$objUser = new Users();
$objUser->modify_login($idUse, $path);


