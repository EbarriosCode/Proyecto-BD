<?php 
	class Resultado_ControlService
	{
		private $db, $conn;

		private $busqueda;


		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();

			$this->busqueda = array();
		}

		public function busqueda($buscar)
		{
			$sql = "SELECT * FROM CONTROL_SERVICIO WHERE (ID) LIKE ('%".$buscar."%')
												OR UPPER (EMPRESA_CLIENTE) LIKE UPPER('%".$buscar."%')
												OR UPPER (RESPONSABLE_EMPRESA_CLIENTE) LIKE UPPER('%".$buscar."%')
												OR UPPER (PROYECTO) LIKE UPPER('%".$buscar."%')
												OR UPPER (SERVICIO) LIKE UPPER('%".$buscar."%')
												OR UPPER (ENCARGADO_PRESTAR_SERVICIO) LIKE UPPER('%".$buscar."%')
												OR UPPER (FECHA_INICIO) LIKE UPPER('%".$buscar."%')
												OR UPPER (HORA_INICIO) LIKE UPPER('%".$buscar."%')
												OR UPPER (FECHA_FIN) LIKE UPPER('%".$buscar."%')
												OR UPPER (HORA_FIN) LIKE UPPER('%".$buscar."%')
												OR UPPER (DURACION_SERVICIO) LIKE UPPER('%".$buscar."%')
												OR UPPER (DESCRIPCION) LIKE UPPER('%".$buscar."%') ORDER BY ID ASC"; 
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->busqueda[] = $fila;
			}

			return $this->busqueda;
		}
	}

/*	$r = new Resultado_ControlService();
	echo json_encode($r->busqueda(''));
*/
 ?>