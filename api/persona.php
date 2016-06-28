<?php

	$persona = array(
			'0' =>array('nombre' => 'DIego', 'ciudad' => 'Lima' ),
			'1' =>array('nombre' => 'Carlos', 'ciudad' => 'Bogota') 
			);

	header('Content-Type: application/json');
	echo json_encode($persona);
 ?>