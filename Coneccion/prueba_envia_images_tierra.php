<?php
include("prueba-consultas.php");
$db = new NewsSQL($DBName); 

$conn_id = ftp_connect($ftp_server); 

// iniciar una sesión con nombre de usuario y contraseña
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
ftp_pasv($conn_id, true); 
// verificar la conexión
if ((!$conn_id) || (!$login_result)) {  
    echo "¡La conexión FTP ha fallado!";
 //   echo "Se intentó conectar al $ftp_server por el usuario $ftp_user_name"; 
    exit; 
} else {
 //   echo "Conexión a $ftp_server realizada con éxito, por el usuario $ftp_user_name";
}

// subir un archivo

$rl2 = $db->getCamaras();
if (!empty($rl2)) {
	while ( list($key,$val)=each($rl2) ) {
	      $idcamara = stripslashes($val["idcamara"]);
		  $ipaddress = stripslashes($val["ipaddress"]);
		  $nombreid = stripslashes($val["nombreid"]);


			$notas = $db->getCamarasLast($idcamara);
			$fechadb = $notas[0]["fecha"];
			$timestampdb = $notas[0]["timestamp"];
			$archivo = $notas[0]["archivo"];
		
		
		$source_file = RUTA.$archivo;
		$destination_file = RUTATIERRA.$archivo;
		
		if (ftp_rawlist($conn_id, RUTATIERRA) === FALSE) {
			if (!ftp_mkdir($conn_id, RUTATIERRA)) {
			 // echo "creado con exito";
			} else {
			 echo "Problema creacion de ".RUTATIERRA." \n";
			}
		}
		
		ftp_chdir($conn_id, RUTATIERRA);
		
		$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);  
		
		// comprobar el estado de la subida
		if (!$upload) {  
			echo "¡La subida FTP ha fallado!";
		} else {
		//	echo "Subida de $source_file a $ftp_server\n como $destination_file\n\n";
		}

// ABRIR ARCHIVO
		$fp = fopen('http://URL/get.php?id='.$idcamara.'&archivo='.$archivo.'&times='.$timestampdb.'', 'r');
		echo $timestampdb;
		$content = '';
		while ($l = fread($fp, 2024)) $content .= $l;
		fclose($fp);
			echo $content;	

		
		
				  
	}
}
		


// cerrar la conexión ftp 
ftp_close($conn_id);
?>