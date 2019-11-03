<?php 	
	//modelo: clase con todos los servicios para acceder a la bbdd
	require_once 'Conexion_Libreria_PDO.php';
	//conexión a la base de datos Libreria
	

	class Libreria	extends Conexion {

		public function Libreria() {
			parent::__construct();
		}
		
		//Método de consulta
		public function consultaLibros($pagina) {
			
			//variables de paginación // inicialización variables de paginación
			$filaInicial=0;
			$numFilasMostrar=10;
			try {
				$filaInicial=($pagina-1)*$numFilasMostrar;
				
				//Montar la sentencia sql
				//la sentencia es preparada con los parametros //parametro LIMIT filainicial y filas a mostrar
				$sql="SELECT * FROM libros LIMIT $filaInicial,$numFilasMostrar";
				$stmt=$this->conn->PREPARE($sql);
				// Especificar como se quieren devolver los datos
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				//Ejecutar la sentencia
				$stmt->execute();
				//bucle para obtener cada una de las filas obtenidas
				$libros = array();		
				while ($fila = $stmt->fetch()) {
					array_push($libros, $fila);
					//echo "<br>";
					//print_r($libros);
				}	

				//calcular el número de páginas
				//Montar la sentencia sql
				$sql="SELECT COUNT(*) as numeroFilas FROM libros";
				$stmt=$this->conn->PREPARE($sql);
				// Especificar como se quieren devolver los datos
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				//Ejecutar la sentencia
				$stmt->execute();
				$filas=$stmt->fetch();
				//recuperar filas totales
				$numFilas=$filas['numeroFilas'];
				//echo $numFilas;
				//echo "<br>";
				//calcular el número de páginas 
				$paginas=ceil($numFilas/$numFilasMostrar);

				//retorna codigo error + la lista de libros obtenida y el número de paginas a montar
				$codigo='00';
				$mensaje="OK";
				$control=array('codigo'=>$codigo, 'mensaje'=> $mensaje);
				$respuesta=array($control, $libros,$paginas);
				//print_r($respuesta);
				return $respuesta;

			} catch (PDOException $e) {
				throw new PDOException($e->getCode().' '.$e->getMessage());
			}
		}

		//Método de consulta
		public function consultaLibro($idlibros) {
				
			try {
				//Montar la sentencia sql
				$sql="SELECT * FROM libros WHERE idlibros=:idlibros ";
				$stmt=$this->conn->PREPARE($sql);
				$stmt->bindParam(':idlibros', $idlibros);
				// Especificar como se quieren devolver los datos
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				//Ejecutar la sentencia
				$stmt->execute();
				//bucle para obtener cada una de las filas obtenidas
				$libros = array();		
				while ($fila = $stmt->fetch()) {
					array_push($libros, $fila);
					//echo "<br>";
					//print_r($libros);
				}	
				$numFilas=$stmt->rowCount();
				//echo $numFilas;
				//echo "<br>";
				//retorna codigo error + la lista de libros obtenida y el número de paginas a montar
				$codigo='00';
				$mensaje="OK";
				$control=array('codigo'=>$codigo, 'mensaje'=> $mensaje);
				$respuesta=array($control, $libros,$numFilas);
				//print_r($respuesta);
				return $respuesta;

			} catch (PDOException $e) {
				throw new PDOException($e->getCode().' '.$e->getMessage());
			}
		}

		//Método de alta
		public function altaLibro($titulo, $precio) {

			try {
				//validar los datos
				$this->validar($titulo, $precio);
				//montar sql
				$sql = "INSERT INTO libros  VALUES(NULL, :titulo, :precio)";
				$stmt=$this->conn->PREPARE($sql);
				$stmt->bindParam(':titulo', $titulo);
				$stmt->bindParam(':precio', $precio);
				
				// Especificar como se quieren devolver los datos
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				//Ejecutar la sentencia
				$stmt->execute();
								
				//recuperar el id del último insert
				$ultimoId = $this->conn->lastInsertId();
				
				//respuesta
				$codigo='00';
				$mensaje='Alta efectuada';
				$respuesta=array('codigo'=>'00', 'mensaje'=> $mensaje,'ultimoId'=> $ultimoId);
				return $respuesta; 

			} catch (PDOException $e) {
				throw new PDOException($e->getCode().' '.$e->getMessage());
			}
								
			
		}

		//validación datos 
		private function validar($titulo, $precio) {
			if (empty($titulo) || empty($precio)) {
				throw new Exception('20'.' '.'Titulo y/o Precio, son obligatorios');
			}
		}

		//Método de modificación
		public function modifLibro($idlibros,$titulo, $precio) {

			try {
				//validar los datos
				$this->validar($titulo, $precio);
				//montar sql
				$sql = "UPDATE libros  SET titulo=:titulo, precio=:precio WHERE idlibros=:idlibros";

				$stmt=$this->conn->PREPARE($sql);
				$stmt->bindParam(':idlibros', $idlibros);
				$stmt->bindParam(':titulo', $titulo);
				$stmt->bindParam(':precio', $precio);
				
				// Especificar como se quieren devolver los datos
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				//Ejecutar la sentencia
				$stmt->execute();
				//numero de filas modificadas
				$numFilas=$stmt->rowCount();
				if ($numFilas==0) {
					$codigo='10';
					$mensaje='código libro no existe o no se ha modificado ningún dato';
				} else {
					$codigo='00';
					$mensaje='Modificación realizada';
				} 
				//respuesta
				
				$respuesta=array('codigo'=> $codigo, 'mensaje'=> $mensaje);
				return $respuesta; 

			} catch (PDOException $e) {
				throw new PDOException($e->getCode().' '.$e->getMessage());
			}
		}

		//Método de baja	
		public function borrarLibro($idlibros) {

			try {
				//montar sql
				$sql="DELETE FROM libros WHERE idlibros=:idlibros";
				$stmt=$this->conn->PREPARE($sql);
				$stmt->bindParam(':idlibros', $idlibros);
				//inicia una transaction
				$this->conn->beginTransaction();
				//Ejecutar la sentencia
				$stmt->execute();
				//commit a la transacción
				$this->conn->commit();
				//numero de filas modificadas
				$numFilas=$stmt->rowCount();
				if ($numFilas==0) {
					$codigo='11';
					$mensaje='no se relizado ninguna modificación, comprobar bbdd';
				} else {
					$codigo='00';
					$mensaje='petición de BORRADO Libro: '.$idlibros.', realizada';
				} 
				$respuesta=array('codigo'=>'00', 'mensaje'=> $mensaje);
				return $respuesta; 

			} catch (PDOException $e) {
				if ($e->getCode()=='1451') {
					throw new PDOException('tabla con otras relaciones / restricción semántica', $e->getCode());
				} else {
					throw new PDOException($e->getCode().' '.$e->getMessage());
				}
			}
		}

	}	



//secccion para probar 
/*
	//provisional para pruebas
	$libreria = new Libreria();
*/	
/*
	//Consulta libro
	try {
		$mensaje=$libreria->consultaLibros(1);
		print_r($mensaje);
	} catch (Exception $e) {
		echo $e->getCode().' '.$e->getMessage();
	}
*/
/*

	//Consulta libro
	try {
		$mensaje=$libreria->consultaLibro(1);
		print_r($mensaje);
	} catch (Exception $e) {
		echo $e->getCode().' '.$e->getMessage();
	}

*/
/*
	//Alta libro
	try {
		$libreria->altalibro('xxxxxxxxxxxxsss', 99) ;
	} catch (PDOException $e) {
		echo $e->getCode().' '.$e->getMessage();
	}
*/
?>