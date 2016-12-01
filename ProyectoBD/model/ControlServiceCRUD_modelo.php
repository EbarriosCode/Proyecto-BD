<?php 
	class ControlServiceCRUD{

		private $conn,$db,$registros;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->registros = array();
		}

		// METODOS PARA EDITAR Y ELIMINAR ELEMENTOS DEL CONTROL DE SERVICIOS //
		public function editar($id,$empresaCliente,$responsable,$proyecto,$servicio,$encargadoServicio,$fechaInicio,$horaInicio,$fechaFin,$horaFin,$duracionServicio,$descripcion)
		{
			$sql = "UPDATE CONTROL_SERVICIO SET EMPRESA_CLIENTE='$empresaCliente',RESPONSABLE_EMPRESA_CLIENTE='$responsable',
											PROYECTO='$proyecto',SERVICIO='$servicio',ENCARGADO_PRESTAR_SERVICIO='$encargadoServicio',
											FECHA_INICIO='$fechaInicio',HORA_INICIO='$horaInicio',FECHA_FIN='$fechaFin',HORA_FIN='$horaFin',
											DURACION_SERVICIO='$duracionServicio',DESCRIPCION='$descripcion' WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();
				if($result)
					return true;
				else
					return false;
		}

		public function eliminar($id)
		{
			$sql = "DELETE FROM CONTROL_SERVICIO WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();
				if($result)
					return 1;
				else
					return 0;
		}

		public function getRegistros()
		{
			$sql = "SELECT * FROM CONTROL_SERVICIO ORDER BY ID ASC";
			$result = $this->db->prepare($sql);
			$result->execute();

			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$this->registros[] = $row;
			}
			return $this->registros;
		}
	}

	//$r = new ControlServiceCRUD();
	//echo $r->eliminar(82); 
	/*$r = new ControlServiceCRUD();
	$n = $r->editar(129,'CRUD','CRUD','DML','DDL','php','23/10/2016','07:15','23/10/2016','15:30','10','laravel');
	echo $n;*/
?>