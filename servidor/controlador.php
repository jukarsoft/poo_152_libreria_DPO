<?php 
	//controlador
	
	//modelo: clase con todos los servicios para acceder a la bbdd
	require 'modelo.php';
	
	//recuperar los datos de la petición
	$opcion = $_POST['opcion'];
	
	//instanciar un objeto Libreria
	$libreria = new Libreria();

	//evaluar petición
	switch ($opcion) {
		case 'A':
		//alta de libro
			$titulo = $_POST['titulo'];
			$precio = $_POST['precio'];
			//llamar al método de alta
			try {
				$mensaje = $libreria->altalibro($titulo, $precio);
				if ($mensaje['codigo'] == '00') {
					$respuesta=json_encode($mensaje);
				} else {
					throw new Exception($e->getCode().' '.$e->getMessage());
				}
			} catch (Exception $e) {
				$respuesta = $e->getCode().' '.$e->getMessage();
			}
			//respuesta del controlador a la vista
			echo $respuesta;
			break;
		
		case 'M':
		//Modificación info de un libro 
			$idlibro = $_POST['idlibro'];
			$titulo = $_POST['titulo'];
			$precio = $_POST['precio'];
			try {
				$mensaje = $libreria->modifLibro($idlibro, $titulo, $precio);
				$respuesta=json_encode($mensaje);
			} catch (Exception $e) {
				$respuesta = $e->getCode().' '.$e->getMessage();
			}
			//respuesta del controlador a la vista
			echo $respuesta;
		break;
		
		case 'D':
		//borrar un libro 
			$idlibro = $_POST['idlibro'];
			try {
				$mensaje = $libreria->borrarLibro($idlibro);
				$respuesta=json_encode($mensaje);
			} catch (Exception $e) {
				$respuesta = $e->getCode().' '.$e->getMessage();
			}
			//respuesta del controlador a la vista
			echo $respuesta;
		break;
		
		case 'C':
		//consulta libros / relación de libros
			try {
				$pagina = $_POST['pagina'];
				$mensaje = $libreria->consultalibros($pagina);
				//retorna array: control, arraylibros, arrayfilas
				$respuesta=json_encode($mensaje);
				//print_r ($respuesta);
			} catch (Exception $e) {
				$respuesta = $e->getCode().' '.$e->getMessage();
			}
			//respuesta del controlador a la vista
			echo $respuesta;
		break;

		default:
	
		break;	



	}



	



?>