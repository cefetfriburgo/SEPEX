<?php
	require "./../../../controller/gerenciar_inscricao.php";
	$id_inscrito = $_POST['participantes'];
	var_dump($id_inscrito);
	$presenca = $_POST['presenca'];
	var_dump($presenca);

	// $inscritos = [];
	// //array_push($inscritos, "id" );
	// foreach ($id_inscrito as $i) {
	// 	if(array_key_exists($i, $presenca))
	// 		echo "$presenca[$i] existe";
	// }
?> 