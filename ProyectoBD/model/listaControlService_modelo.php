<?php 
	class listaControlService{

		private $conn,$db,$registros;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->registros = array();
		}

		public function getControlService($inicio=false,$no_registros=false)
		{
			if($inicio!=false && $no_registros!=false)
			{
				
				$sql = "SELECT * FROM (SELECT ID,EMPRESA_CLIENTE,RESPONSABLE_EMPRESA_CLIENTE,PROYECTO,SERVICIO,ENCARGADO_PRESTAR_SERVICIO,FECHA_INICIO,HORA_INICIO,FECHA_FIN,HORA_FIN,DURACION_SERVICIO,DESCRIPCION, ROW_NUMBER()
													OVER(ORDER BY ID ASC) RN FROM CONTROL_SERVICIO) TEMP WHERE RN>'$inicio' AND ROWNUM <='$no_registros'";
			}

			else
			{
				$sql = "SELECT * FROM CONTROL_SERVICIO ORDER BY ID ASC";
			}
				
				$stmt = $this->db->prepare($sql);
				$stmt->execute();


				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					$this->registros[] = $row;
				}

			return $this->registros;
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT (*) FROM CONTROL_SERVICIO";
				
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;
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
	}

	/*$r = new listaControlService();
	echo $r->eliminar(82); 
	$r = new listaControlService();
	$n = $r->editar(129,'probando','probando','probando','probando','probando','11/12/2012','01:12','11/12/2012','01:12','1','probando');
	echo $n;*/
/*
	$inst = new listaControlService();
	$r = $inst->getControlService(1,4);
	
	echo json_encode($r); 

	$r = new listaControlService();
	$n = $r->numRegistros();
	echo $n;  */
 ?>