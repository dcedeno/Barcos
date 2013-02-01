<?php

include("prueba-config.php");

Class DBSQL
{
     
   function DBSQL($DBName)
   {     
      global $DBHost,$DBUser,$DBPassword;
      $conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($DBHost, $DBUser, $DBPassword)); 
		if (!$conn) {
			die('Sin Conexion '); 
		}


	  ((bool)mysqli_query($conn, "USE $DBName")); 
	  $this->CONN = $conn;
      return true;
   }
   
   function select($sql="")
   {
  // echo $sql;
   global $cuantasconsultas;
   $cuantasconsultas++;
      if (empty($sql)) return false;
      if (empty($this->CONN)) return false;
      $conn = $this->CONN;
      $results = mysqli_query($conn, $sql);
      if ((!$results) or (empty($results)))
      {       
         return false;
      }
      $count = 0;
      $data = array();
      while ($row = mysqli_fetch_array($results)) {
         $data[$count] = $row;
         $count++;
      }
      ((mysqli_free_result($results) || (is_object($results) && (get_class($results) == "mysqli_result"))) ? true : false);
      return $data;
   }

   
   function insert($sql="")
   {
      if (empty($sql)) return false;
      if (empty($this->CONN)) return false;

      $conn = $this->CONN;
      $results = mysqli_query($conn, $sql);
      if (!$results) return false;
      $results = ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
      return $results;
   }

   
   function update($sql="")
   {
      if(empty($sql)) return false;
      if(empty($this->CONN)) return false;

      $conn = $this->CONN;
      $result = mysqli_query($conn, $sql);
      return $result;
   }


}

?>