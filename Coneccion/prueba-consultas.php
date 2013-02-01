<?php include("prueba-funciones.php");
Class NewsSQL extends DBSQL
{
   // the constructor
   function NewsSQL($DBName = "")
   {
      $this->DBSQL($DBName);
   }

////////////////// EMBRANS - VIDEOS


// RECOGE LAS CAMARAS TODAS
    function getCamaras()
   {
      $sql = "select * FROM camaras order by idcamara";
      $result = $this->select($sql);
      return $result;
   } 
   
   
// RECOGE LAS CAMARAS TODAS
    function getCamarasLast($id)
   {
      $sql = "select * FROM registro where idcamara = $id order by id DESC limit 0,1 ";
      $result = $this->select($sql);
      return $result;
   }    
   

// INSERTA LAS FOTOS
  function agregarFotos($idcamara,$fecha,$timestamp,$archivo)
   {        
	  $estado = 1;
	 // $timestamp = ; 
      $sql = "insert into registro 
	  (idcamara,fecha,timestamp,archivo,estado) VALUES
	  ($idcamara,'$fecha','$timestamp','$archivo',$estado)";   
	   $results = $this->insert($sql);
      return $results;
   }      
   
      
 

  
   
}

?>