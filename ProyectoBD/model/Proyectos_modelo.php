<?php 

	class Proyectos{

		private $conn,$db,$proyectos;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->proyectos = array();
		}

		public function getProyectos($inicio=false,$no_registros=false)
		{
			if($inicio!=false && $no_registros!=false)
			{
				
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,ROW_NUMBER()
							OVER(ORDER BY ID ASC) RN FROM PROYECTO) 
							WHERE RN>'$inicio' AND ROWNUM <='$no_registros'";
			}

			else
			{
				$sql = "SELECT * FROM PROYECTO ORDER BY ID ASC";
			}

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->proyectos[] = $row;
			}

			return $this->proyectos;
		}

		
		public function insertar($proyecto,$descripcion)
		{
			$sql = "INSERT INTO PROYECTO(NOMBRE,DESCRIPCION) VALUES('$proyecto','$descripcion')";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}

		}

		public function eliminar($id)
		{
			$sql = "DELETE FROM PROYECTO WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
		}

		public function editar($id,$proyecto,$descripcion)
		{
			$sql = "UPDATE PROYECTO SET NOMBRE='$proyecto', DESCRIPCION='$descripcion' WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM PROYECTO";
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;

		}

	}
/*	$r = new Proyectos();
	$n = $r->numRegistros();
	echo $n; 

	$r = new Proyectos();
	$m = $r->getProyectos(1,5);
	echo json_encode($m);  
	

/*	$r = new Proyectos();
	$r->insertar('system','system'); */
 ?>