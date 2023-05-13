<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\Persistencia\PersistenciaProduto;

class ControllerCadastroProduto extends ControllerPadrao {

    protected function processAdicionar() {
        $aChaves = $this->getChavesRequisicao();
        if ((new PersistenciaProduto())->insert(($aChaves))) {
            return header('location: index.php?pag=consultaProduto');
        }
        echo 'Nao Inseriu';
    }

    protected function getChavesRequisicao() {
        return [
            'pronome'       => "'".$_POST['firstname']."'",
            'procodigo'     => "'".$_POST['telefone']."'",
            'provalor'      => "'".$_POST['address']."'",
            'provalidade'   => "'".$_POST['uf']."'",
            'proquantidade' => "'".$_POST['cnpj']."'"
        ];
    }

}