<?php 
	class Correo
	{
		private $para;
		private $asunto;
		private $nombre;
		private $mensaje;

		public function __construct()
		{
			$this->para = "guayoswing@gmail.com";
		}

		public function getDestino(){
			return $this->para;
		}

		public function enviarCorreo($para,$asunto,$mensaje,$de)
		{
			
			$headers = "MINE-Version:1.0;\r\n";
			$headers .= "Content-type: text\html; \r\n charset=utf-8; \r\n";
			$headers .= "From: $de \r\n";
			$headers .= "To: $para; \r\n Subject:$asunto \r\n ";			
			
			if(mail($para, $asunto, $mensaje, $headers))
				return true;
			else
				return false;			
		}
	}	

 ?>