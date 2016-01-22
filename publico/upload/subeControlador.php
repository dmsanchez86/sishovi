
<?php 
	/**
	* Sube Archivo Al servidor
	*/
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
/*°°°°°°°°|															|°°°°°°°*/
/*°°°°°°°°|		CLASE QUE SE CREA PARA SUBIR EL ARCHIVO AL SERVIDOR	|°°°°°°°*/
/*°°°°°°°°|															|°°°°°°°*/
/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
	class CargaArchivo
	{

		/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
		/*°°°°°°°°|	DEFINIMOS LAS VARIABLES QUE NECESITAMO	|°°°°°°°*/
		/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/

		protected $opciones;
		protected  $errores = array(
			1 => "[ALERTA] NO SE RECIBIO NINGUN ARCHIVO",
			2 => "[ALERTA] NO ESTA PERMITIDO EL ARCHIVO QUE ENVIO",
			3 => "[ALERTA] LA IMAGEN NO CUMPLE EL ANCHO PERMITIDO",
			4 => "[ALERTA] LA IMAGEN NO CUMPLE EL ALTO PERMITIDO",
			4 => "[ALERTA] EL ARCHIVO PESA MAS DE",
			);

	 	function __construct($opciones = null)
	 	{
	 		$this->opciones =  array(
	 			'nom_archivo' => "archivo", 
	 			"Arch_permitido" => array("png","jpg"),
				"alto_permitido" => NULL,
				"ancho_permitido" => NULL,
	            'min_width' => 1,
	            'min_height' => 1,
	            'tama_archivo' => NULL,
				"ruta_guardado" => "fotos",
				"Nombre_Final" => NULL,
				"Reemplazar_Archivo" => FALSE,
				"offset" => 0,
	 			);

	 		 if ($opciones) {
            	$this->opciones = $opciones + $this->opciones;
        	}

       		$this->verificaArray();
       		$this->verificaExtencion();
       		$this->Resolucion();
       		$this->MaxArch();
       		$this->subeFoto();
	 	}

	 	/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
	 	/*°°°°°°°| VERIFICAMOS QUE HAYA UN ARCHIVO QUE SUBIR 	|°°°°°°°°°°°*/
	 	/*°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°*/
	 	protected function verificaArray()
	 	{

	 		if ($_FILES[ $this->opciones["nom_archivo"] ]["name"][$this->opciones["offset"]]) {
	 		 $archivo = $_FILES[$this->opciones["nom_archivo"]]["name"][$this->opciones["offset"]];
	 			if (strlen($archivo) == 0) {
	 			echo $this->errores[1]."/ archivo enviado #".($this->opciones["offset"]+1);
	 			exit();	 		
	 			}
	 		}
	 		else{	
	 			echo $this->errores[1]."/ archivo enviado #".($this->opciones["offset"]+1);
	 			exit();
	 		}
	 	}
	 	protected function verificaExtencion()
	 	{
	 		$extencion = $_FILES[ $this->opciones["nom_archivo"] ]["name"][$this->opciones["offset"]];
            $extencion = pathinfo($extencion,PATHINFO_EXTENSION);
            $extencion = strtolower($extencion);
			if (in_array($extencion, $this->opciones["Arch_permitido"])) {
			     return $extencion;
			}	
            else{
	 			echo $this->errores[2];
	 			exit();
            }
		}
		protected function Resolucion()
		{
		  // Image resolution restrictions:
			$typo = $this->verificaExtencion();
			$Dimensiones = getimagesize($_FILES[ $this->opciones["nom_archivo"] ]["tmp_name"][$this->opciones["offset"]]);
			$ancho = $Dimensiones[0] ;
			$alto = $Dimensiones[1] ; 
			if ($this->opciones["alto_permitido"] && $ancho) {
				if ($alto >$this->opciones["alto_permitido"] ) {
					echo $this->errores[4];
					exit();
				}
				if ($ancho >$this->opciones["ancho_permitido"] ) {
					echo $this->errores[3];
					exit();
				}
			}

			// echo "-----";
			return $Dimensiones;			
			
		}	
		protected function MaxArch()
		{
			$tama = (($_FILES[ $this->opciones["nom_archivo"] ]["size"][$this->opciones["offset"]])/1024);
			if ($this->opciones["tama_archivo"]) {
				
				if ( $this->opciones["tama_archivo"] < $tama) {
				    echo $this->errores[4]." ".$this->opciones["tama_archivo"]." bytes";
					exit();		// echo $tama."M";
				}
			}
		}
		protected function subeFoto()
		{
			 if (!is_dir($this->opciones["ruta_guardado"])) {
                mkdir($this->opciones["ruta_guardado"]);
            }
				$encuentra  = array(' ', '\'', 'ñ', 'á','é','í','ó','ú','(',')','Á','É','Í','Ó','Ú','ü','ä','ë','ï','ö','Ä','Ë','Ï','Ö','Ü','~');
				$remplaza =   array('_', ''  , 'n','a', 'e','i','o','u', '', '','A','E','I','O','U','u','a','e','i','o','A','E','I','O','U','_');
				$this->opciones["Nombre_Final"] ? $nombre = $this->opciones["Nombre_Final"]: $nombre = $_FILES[ $this->opciones["nom_archivo"] ]["name"][$this->opciones["offset"]];
				$nombre = str_replace($encuentra,$remplaza,$nombre);

			if ($this->opciones["Reemplazar_Archivo"]) {
	            $archivo = $_FILES[ $this->opciones["nom_archivo"] ]["name"][$this->opciones["offset"]];
	           	// echo $nombre;
	            move_uploaded_file($archivo,$this->opciones["ruta_guardado"]."/".$nombre);
				echo $nombre;
			}
			else {
	            $archivo = $_FILES[ $this->opciones["nom_archivo"] ]["tmp_name"][$this->opciones["offset"]];
	           	$sepuede = false;
	           	$nombre1 = $nombre;
	           	$i = 0;
	           	while (!$sepuede) {
	           		
					if (is_file($this->opciones["ruta_guardado"]."/".$nombre1)) {
							$i += 1;
							$nombre1 = $i.$nombre;
					}
					else{
			            move_uploaded_file($archivo,$this->opciones["ruta_guardado"]."/".$nombre1);	
						$sepuede = True;
					}
			         
					
	           	}
	           	$this->Nombre_Final = $nombre1;
	           	echo $nombre1." / archivo enviado #".($this->opciones["offset"]+1);
			}
		}
		// nos devuelve el nombre del archivo subido
		protected function obtieneNombre()
		{
			return $this->opciones["Nombre_Final"];
		}
		// funcion que nos borra un archivo del servidor
		public function borrarArchivo($archivo)
		{
			unlink($this->opciones["ruta_guardado"].$archivo);
		}
	}