<?php 

	class Trabajadores{

		private $conn,$db,$trabajadores;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->trabajadores = array();
		}

		public function getTrabajadores2($inicio=false,$no_registros=false)
		{
			if($inicio!=false && $no_registros!=false)
			{
				
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,TELEFONO,DIRECCION,PUESTO,ROW_NUMBER() OVER(ORDER BY ID ASC) RN FROM TRABAJADORES) WHERE RN>$inicio AND ROWNUM <=$no_registros";
			}

			else
			{
				$sql = "SELECT * FROM TRABAJADORES ORDER BY ID ASC";
			}

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->trabajadores[] = $row;
			}

			return $this->trabajadores;
		}

		public function insertar($nombre,$telefono,$direccion,$puesto)
		{
			$sql = "INSERT INTO TRABAJADORES(NOMBRE,TELEFONO,DIRECCION,PUESTO) VALUES('$nombre','$telefono','$direccion','$puesto')";
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
			$sql = "DELETE FROM TRABAJADORES WHERE ID='$id'";
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

		public function editar($id,$nombre,$telefono,$direccion,$puesto)
		{
			$sql = "UPDATE TRABAJADORES SET NOMBRE='$nombre', TELEFONO='$telefono', DIRECCION='$direccion', PUESTO='$puesto' WHERE ID='$id'";
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
			$sql = "SELECT COUNT(*) FROM TRABAJADORES";
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;
		}

	}

	/*$r = new Trabajadores();
	echo json_encode($r->getTrabajadores2(1,5));*/

 ?>