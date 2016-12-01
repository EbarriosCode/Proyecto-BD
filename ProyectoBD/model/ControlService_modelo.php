<?php 
	
	class ControlService{

		private $db, $conn;

		private $empresaCliente;
		private $responsable;
		private $proyecto;
		private $servicios;
		private $trabajadores;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();

			$this->empresaCliente = array();
			$this->responsable = array();
			$this->proyecto = array();
			$this->servicios = array();
			$this->trabajadores = array();
		}

		public function insertarServicio($empresaCliente,$responsable,$proyecto,$servicio,$encargadoServicio,$fechaInicio1,$horaInicio,$fechaFin1,$horaFin,$duracionServicio,$descripcion)
		{
			$date = new DateTime($fechaInicio1);
		    $fechaInicio = $date->format('d-m-Y');

			$date1 = new DateTime($fechaFin1);
		    $fechaFin = $date1->format('d-m-Y');
			$sql = "INSERT INTO CONTROL_SERVICIO (EMPRESA_CLIENTE,RESPONSABLE_EMPRESA_CLIENTE,PROYECTO,SERVICIO,ENCARGADO_PRESTAR_SERVICIO,FECHA_INICIO,HORA_INICIO,FECHA_FIN,HORA_FIN,DURACION_SERVICIO,DESCRIPCION)
			             VALUES(?,?,?,?,?,?,?,?,?,?,?)";

			$stmt = $this->conn->prepare($sql);
			$resultSet = $stmt->execute(array($empresaCliente,$responsable,$proyecto,$servicio,$encargadoServicio,$fechaInicio,$horaInicio,$fechaFin,$horaFin,$duracionServicio,$descripcion));             

				if($resultSet)
					return true;

				else
					return false;
		}

		public function getPintarCliente()
		{
			$sql = "SELECT * FROM EMPRESAS_CLIENTELA";
			$obj = $this->conn->prepare($sql);
			$obj->execute();

			while($row = $obj->fetch(PDO::FETCH_ASSOC))
			{
				$this->empresaCliente[] = $row;
			}

			return $this->empresaCliente;
		}

		public function getPintarProyecto()
		{
			$sql = "SELECT NOMBRE FROM PROYECTO ORDER BY ID ASC";
			$inst = $this->conn->prepare($sql);
			$inst->execute();

			while($fila = $inst->fetch(PDO::FETCH_ASSOC))
			{
				$this->proyecto[] = $fila;
			}
			return $this->proyecto;
		}

		public function recuperaResponsable($parametro)
		{
			$sql = "SELECT RESPONSABLE FROM EMPRESAS_CLIENTELA WHERE NOMBRE =?";
			$result = $conect->prepare($sql);
			$result->execute(array($parametro));

			while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
				$this->responsable[] = $fila;
			//echo "<input class='form-control' id='responsable-cliente' disabled value='".$fila['RESPONSABLE']."'>";
			//echo $fila['RESPONSABLE'];
			}
			return $this->responsable;
		} 

		public function getPintarServicio()
		{
			$sql = "SELECT NOMBRE FROM SERVICIOS ORDER BY ID ASC";
			$inst = $this->conn->prepare($sql);
			$inst->execute();

			while($fila = $inst->fetch(PDO::FETCH_ASSOC))
			{
				$this->servicios[] = $fila;
			}
			return $this->servicios;	
		}

		public function getPintarTrabajador()
		{
			$sql = "SELECT NOMBRE FROM TRABAJADORES ORDER BY ID ASC";
			$inst = $this->conn->prepare($sql);
			$inst->execute();

			while($fila = $inst->fetch(PDO::FETCH_ASSOC))
			{
				$this->trabajadores[] = $fila;
			}
			return $this->trabajadores;	
		}
	}

//	$r = new ControlService();
//	$n = $r->insertarServicio('probando---','probando----','probando','probando','probando','11/12/2012','01:12','11/12/2012','01:12','1','probando');
 ?>