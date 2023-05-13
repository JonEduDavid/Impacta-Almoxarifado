<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\Persistencia\PersistenciaFornecedor;

class ControllerCadastroFornecedor extends ControllerPadrao {

    protected function processAdicionar() {
        $aChaves = $this->getChavesRequisicao();
        if ((new PersistenciaFornecedor())->insert(($aChaves))) {
            return header('location: index.php?pag=consultaFornecedor');
        }
        echo 'Nao Inseriu';
    }

    protected function getChavesRequisicao() {
        return [
            'fornome'     => "'".$_POST['firstname']."'",
            'fortelefone' => "'".$_POST['telefone']."'",
            'forendereco' => "'".$_POST['address']."'",
            'foruf'       => "'".$_POST['uf']."'",
            'forcpfcnpj'  => "'".$_POST['cnpj']."'",
            'foremail'    => "'".$_POST['email']."'"
        ];
    }

}