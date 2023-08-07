<?php
    include_once('config.php');
	//session_start();
    function connect_db(){
            
	    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
            return $con;
	}
	
?>
