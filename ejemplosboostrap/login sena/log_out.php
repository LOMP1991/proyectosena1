<?php

require'class/sessions.php';

$objSe = new Sessions();
$objSe->init();
$objSe->destroy();

header('location: login.php');

?>