<?php 

	class EmpresasCliente2{

		private $conn,$db,$empresas2;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->empresas2 = array();
		}

		public function getEmpresas2($inicio=false,$no_registros=false)
		{
			if($inicio!=false && $no_registros!=false)
			{
				
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE,ROW_NUMBER() OVER(ORDER BY ID ASC) RN FROM EMPRESAS_CLIENTELA) WHERE RN>$inicio AND ROWNUM <=$no_registros";
			}

			else
			{
				$sql = "SELECT * FROM EMPRESAS_CLIENTELA ORDER BY ID ASC";
			}

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->empresas2[] = $row;
			}

			return $this->empresas2;
		}

		public function insertar($nombre,$descripcion,$direccion,$responsable)
		{
			$sql = "INSERT INTO EMPRESAS_CLIENTELA(NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE) VALUES('$nombre','$descripcion','$direccion','$responsable')";
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
			$sql = "DELETE FROM EMPRESAS_CLIENTELA WHERE ID='$id'";
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

		public function editar($id,$nombre,$descripcion,$direccion,$responsable)
		{
			$sql = "UPDATE EMPRESAS_CLIENTELA SET NOMBRE='$nombre', DESCRIPCION='$descripcion', DIRECCION='$direccion', RESPONSABLE='$responsable' WHERE ID='$id'";
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
			$sql = "SELECT COUNT(*) FROM EMPRESAS_CLIENTELA";
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;
		}

	}
/*	$r = new Servicios();
	$n = $r->numRegistros();
	echo $n;

	$r = new Servicios();
	$m = $r->getServicios();
	print_r($m);  
	//echo json_encode($r->getServicios());

	$r = new Servicios();
	echo $r->editar(10,'Prueba 1','Prueba 1'); */
 ?>