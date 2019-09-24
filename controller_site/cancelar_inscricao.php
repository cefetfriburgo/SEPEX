<?php
    require_once '../model/publico.php';
    $atividade_id = $_POST['atividade_id'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cpf = str_replace(".","",$cpf);
    $cpf = str_replace("-","",$cpf);
    $cpf = str_replace(",","",$cpf);

    class CancelarInscricao{
        private $cancelar;

        public function __construct(){
            $this->cancelar = new Publico();
        }  

        public function cancelar($atividade_id, $email, $cpf){
            $this->cancelar->cancelarInscricao($atividade_id, $email, $cpf);
        }
    }

    $c = new CancelarInscricao();
    $c->cancelar($atividade_id, $email, $cpf);

?>