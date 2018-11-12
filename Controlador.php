<?php
	include_once "Empresa.php";

	$content = trim(file_get_contents("php://input"));
	$decoded = json_decode($content, true);

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	header('Content-Type: application/json');

	$peso = $decoded['Peso'];
	$pais = $decoded['Pais'];

	$Empresa = new Empresa();
	$Empresa->setPais($pais);

	try {
		$todo = $Empresa->getTodo($peso);
		echo json_encode($todo);
	} catch (Excepction $e) {
		$return = array(
			'result' => $e->getMessage()
		);
		https_response_code(500);
		echo json_encode($return);
	}

