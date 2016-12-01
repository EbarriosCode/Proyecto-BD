<?php 
	class Resultado_Empresas
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
			$sql = "SELECT * FROM EMPRESAS_CLIENTELA WHERE (ID) LIKE ('%".$buscar."%')
												OR UPPER (NOMBRE) LIKE UPPER('%".$buscar."%')
												OR UPPER (DESCRIPCION) LIKE UPPER('%".$buscar."%')
												OR UPPER (DIRECCION) LIKE UPPER('%".$buscar."%')
												OR UPPER (RESPONSABLE) LIKE UPPER('%".$buscar."%')
												 ORDER BY ID ASC"; 
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			while($fila = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->busqueda[] = $fila;
			}

			return $this->busqueda;
		}
	}

	/*$r = new Resultado_Servicio();
	echo json_encode($r->busqueda('sennio'));*/
 ?>