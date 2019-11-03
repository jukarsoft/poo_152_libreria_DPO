<?php 
	class Conexion {
		protected $conn;

		public function Conexion() {
			try { 
				$this->conn=new PDO ('mysql:host=localhost; dbname=libreria','root','');
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->conn->exec("SET CHARACTER SET utf8");
				return $this->conn;
			} catch (DPOException $e) {
				echo "la linea error es: ".$e->getLine();
			}	


		}		
		
	}		




/*		//________________________________________
		private $tipo_de_base = 'mysql';
		private $host = 'localhost';
		private $nombre_de_base='libreria';
		private $usuario = 'root';
		private $contrasena = '';
		public function __construct() {
			//sobreescribo el metodo constructor de la clase PDO
			try {
				parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contrasena);
			} catch (PDOException $e) {
				//throw new Exception($e->getCode().' '.$e->getMessage());
				echo $e->getCode().' - '.$e->getMessage();
			}
		}
	}


*/
/*	
	//Prueba de conexión	
	$conn = new Conexion();
*/

?>