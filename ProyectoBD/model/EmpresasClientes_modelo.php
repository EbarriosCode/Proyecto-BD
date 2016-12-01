<?php 

	class Clientes_modelo{

		private $db, $conn;
		private $clientes;
		private $buscarClientes;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();

			//$this->buscarClientes = array();
			$this->clientes = array();
		}

		public function busquedaClientes($valor,$inicio=false,$no_registros=false)
		{

			//$pagnation = $pag;
			if($inicio !== false && $no_registros !== false)
			{
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE,ROW_NUMBER()
													OVER(ORDER BY ID ASC) RN FROM EMPRESAS_CLIENTELA WHERE UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
																						OR UPPER(DESCRIPCION) LIKE ('%".$valor."%')
																						OR UPPER (DIRECCION) LIKE UPPER ('%".$valor."%')
																						OR UPPER (RESPONSABLE) LIKE UPPER ('%".$valor."%')
																						) WHERE RN >$inicio AND ROWNUM <=$no_registros";
			}

			else{
			$sql = "SELECT * FROM EMPRESAS_CLIENTELA WHERE UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
											OR UPPER (DESCRIPCION) LIKE UPPER('%".$valor."%')
											OR UPPER (DIRECCION) LIKE UPPER ('%".$valor."%')
											OR UPPER (RESPONSABLE) LIKE UPPER ('%".$valor."%') ORDER BY ID ASC ";
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

		public function busquedaClientes1($valor,$inicio=false,$no_registros=false)
		{

			if($inicio != false && $no_registros != false)
			{
				/*$sql = "SELECT * FROM (SELECT ID,ROW_NUMBER()
										OVER(ORDER BY ID ASC) RN FROM EMPRESAS_CLIENTELA) TEMP WHERE RN>'$inicio' AND ROWNUM <='$no_registros'";*/
				/*$sql = "SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE,ROW_NUMBER()
													OVER(ORDER BY ID ASC) RN FROM EMPRESAS_CLIENTELA WHERE (ID) LIKE ('%".$valor."%')
																									OR UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
																									OR UPPER (DESCRIPCION) LIKE UPPER ('%".$valor."%')
																									OR UPPER (DIRECCION) LIKE UPPER ('%".$valor."%')
																									OR UPPER (RESPONSABLE) LIKE UPPER ('%".$valor."%')
																													 ) WHERE RN >'$inicio' AND ROWNUM <='$no_registros'"; */
				/*$sql = "SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE,ROW_NUMBER()
													OVER(ORDER BY ID ASC) RN FROM EMPRESAS_CLIENTELA) WHERE RN >$inicio AND RN <=$no_registros";*/

				/*$sql = 	"SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE,ROW_NUMBER() OVER(ORDER BY ID ASC) RN FROM EMPRESAS_CLIENTELA) WHERE RN >30 AND RN <=35";*/
				$sql = "
						SELECT *
									FROM (
								SELECT ROWNUM RNUM, AUX.*
								FROM (
									SELECT *
									FROM EMPRESAS_CLIENTELA
									WHERE UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
									OR UPPER (DESCRIPCION) LIKE UPPER ('%".$valor."%')
									OR UPPER (DIRECCION) LIKE UPPER ('%".$valor."%')
									OR UPPER (RESPONSABLE) LIKE UPPER ('%".$valor."%')
									ORDER BY ID ASC
								) AUX
								WHERE ROWNUM <= '$no_registros'
								)
								WHERE RNUM > '$inicio'";	
			}

			else{
			$sql = "SELECT * FROM EMPRESAS_CLIENTELA WHERE UPPER (NOMBRE) LIKE UPPER('%".$valor."%')
													OR UPPER (DESCRIPCION) LIKE UPPER ('%".$valor."%') ORDER BY ID ASC";
			}

			$result = $this->conn->prepare($sql);
			$result->execute();

			while($fila = $result->fetch(PDO::FETCH_ASSOC))
			{
				
				$this->clientes[] = $fila;

			}

				return $this->clientes;
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT (*) FROM EMPRESAS_CLIENTELA";
				
				$resultado = $this->conn->query($sql);
				$num = $resultado->fetchColumn();
				return $num;
		}
	}

/*
		$clientes = new Clientes_modelo();
		$r = $clientes->busquedaClientes('',10,15);
		echo "<br>registros afectados ".count($r)."<br><br>";
		echo json_encode($r); 
*/			
 ?>