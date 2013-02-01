<?php 
include("prueba-consultas.php");
$db = new NewsSQL($DBName); 

// PARA FECHAS
$date = date_create();
$fechatime = date_timestamp_get($date);
$fechagraba = date_format($date, 'Y-m-d H:i:s');

$rl2 = $db->getCamaras();
if (!empty($rl2)) {
	while ( list($key,$val)=each($rl2) ) {
	      $idcamara = stripslashes($val["idcamara"]);
		  $ipaddress = stripslashes($val["ipaddress"]);
		  $nombreid = stripslashes($val["nombreid"]);
		  
		  // Arma el nombre
		  $img = RUTA.BARCO.$nombreid.'_'.$fechatime.'.jpg';
		  $imgguarda = BARCO.$nombreid.'_'.$fechatime.'.jpg';

		//CAPTURA Y GRABADO
		if (!file_exists(RUTA)) {
			mkdir(RUTA, 0755, true);
			file_put_contents($img, file_get_contents($ipaddress));
		 } else {
			 
			file_put_contents($img, file_get_contents($ipaddress));
		} 
		
		$db->agregarFotos($idcamara,$fechagraba,$fechatime,$imgguarda);
		
		
	} // Cierra While
}  // Cierra Consulta



?>
