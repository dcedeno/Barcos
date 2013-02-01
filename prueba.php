<?php 
// CODIGO PARA MAQUINA LOCAL 
error_reporting(E_ALL);
ini_set('display_errors', '1');

//FECHA
$fecha = date("d-m-Y-h-i-s");
$date = date_create();
$fechatime = date_timestamp_get($date);

//CONSTANTES
$lugar = 'cam01';
$barco = 'bar01';
$ruta = 'barco-images/'.date('Y').'/'.date('m').'/'; 
$url = 'http://192.168.10.202/axis-cgi/jpg/image.cgi?resolution=640x480';

// IMAGENES
$img2 = $ruta.$barco.$lugar.'_'.$fecha.'.jpg';
$img = $ruta.$barco.$lugar.'_'.$fechatime.'.jpg';


//CAPTURA Y GRABADO
if (!file_exists($ruta)) {
	mkdir($ruta, 0755, true);
	file_put_contents($img, file_get_contents($url));
	file_put_contents($img2, file_get_contents($url));
	echo 'envio';
 } else {
	 
	file_put_contents($img, file_get_contents($url));
	file_put_contents($img2, file_get_contents($url));
	echo 'envio2';
	
	 } 
?>

