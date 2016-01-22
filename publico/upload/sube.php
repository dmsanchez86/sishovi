<?php 

	require_once("subeControlador.php");
	// var_dump($_FILES["soportes"]["name"]);
	for ($i=0; $i <count($_FILES["soportes"]["name"]) ; $i++) { 

		$opciones = array(
			"nom_archivo" => "soportes",
			"Arch_permitido" => array("doc","pdf","png","jpg"),
			"tama_archivo" => 9000, // defecto null
			"ruta_guardado" => '../../soportes/', // defecto carpeta fotos
			"offset" =>$i,
			// "Nombre_Final" => date('U').".jpg",
			// "Reemplazar_Archivo" => TRUE, // defecto false
			);

		$subir = new CargaArchivo($opciones);
	}


 ?>