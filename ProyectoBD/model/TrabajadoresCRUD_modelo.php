 <?php 

	class TrabajadoresCRUD{

		private $db, $conn;
		private $trabajadores;
		private $buscarTrabajadores;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();

			$this->buscarTrabajadores = array();
			$this->trabajadores = array();
		}

		public function insertar($nombre, $telefono, $direccion, $puesto)
		{
$sql = "INSERT INTO TRABAJADORES (NOMBRE,TELEFONO,DIRECCION,PUESTO) VALUES ('".$nombre."','".$telefono."','".$direccion."','".$puesto."')";
			
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();

				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function editar($id, $nombre, $telefono, $direccion, $puesto)
		{
			$sql = "UPDATE TRABAJADORES SET NOMBRE='$nombre', TELEFONO='$telefono', DIRECCION='$direccion', PUESTO='$puesto' WHERE ID='$id'";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();

				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function borrar($id)
		{
		  $sql = "DELETE FROM TRABAJADORES WHERE ID = '$id'";
		  $rs = $this->conn->prepare($sql);
		  $result = $rs->execute();

 				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function getTrabajadores()
		{
			$sql = "SELECT * FROM TRABAJADORES ORDER BY ID ASC";

			$result = $this->conn->prepare($sql);
			$result->execute();

			while($fila = $result->fetch(PDO::FETCH_ASSOC))
			{
				
				$this->trabajadores[] = $fila;
			}

				return $this->trabajadores;
		}

		public function busquedaTrabajadores($valor,$inicio=false,$no_registros=false)
		{

			//$pagnation = $pag;
			if($inicio !== false && $no_registros !== false)
			{
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,TELEFONO,DIRECCION,PUESTO,ROW_NUMBER()
													OVER(ORDER BY ID ASC) RN FROM TRABAJADORES WHERE UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
																						OR TELEFONO LIKE ('%".$valor."%')
																						OR UPPER (DIRECCION) LIKE UPPER ('%".$valor."%')
																						OR UPPER (PUESTO) LIKE UPPER ('%".$valor."%')
																						) WHERE RN >$inicio AND ROWNUM <=$no_registros";
			}

			else{
			$sql = "SELECT * FROM TRABAJADORES WHERE UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
											OR TELEFONO LIKE ('%".$valor."%')
											OR UPPER (DIRECCION) LIKE UPPER ('%".$valor."%')
											OR UPPER (PUESTO) LIKE UPPER ('%".$valor."%') ORDER BY ID ASC ";
			}
			$result = $this->conn->prepare($sql);
			$result->execute();
			
			$registros = array();
			while($fila = $result->fetch(PDO::FETCH_ASSOC))
			{
				
				$registros[] = $fila;

			}

				return $registros;
		}
	}
/*

			$clientes = new TrabajadoresCRUD();
			$matrizClientes = $clientes->busquedaTrabajadores('',0,100);
			echo json_encode($matrizClientes); 
			
			$r = new TrabajadoresCRUD();
			echo $r->insertar('Eduardo Barrios','54441004','4ta Calle 9-42 zona 1 Retalhuleu','Programador Sennior');


			//editar

			$r = new TrabajadoresCRUD();
			echo $r->editar(5,'Eduardo Barrios','54441004','4ta Calle 9-42 zona 1 Retalhuleu','Programador JR');
*/			
	
 ?>