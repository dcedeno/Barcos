<?php
// Runtime
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('America/Guayaquil');

// Barco y Ruta
define("BARCO", "bar01");
define("RUTA", '../htdocs/videos/barco-images/'.date('Y').'/'.date('m').'/'.date('d').'/');
define("RUTATIERRA", '/barco-images/'.date('Y').'/'.date('m').'/'.date('d').'/');


// Base de Datos
$DBHost = "localhost";
$DBName = "";
$DBUser = "";
$DBPassword = "";

// FTP

$ftp_user_name = "";
$ftp_user_pass = "";
$ftp_server = "";


?>