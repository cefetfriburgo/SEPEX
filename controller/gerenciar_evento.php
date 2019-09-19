<?php
    require_once dirname(__FILE__)."./../model/evento.php";
	
	$id_atual = $_POST['id_evento_atual'];
	$id_novo =  $_POST['evento'];

	if($id_novo != $id_atual){
		$d = new Evento();
		$despublicar = $d->despublicarEvento($id_atual);
		
		$p = new Evento();
		$publicado = $p->publicarEvento($id_novo);
	}	
?>