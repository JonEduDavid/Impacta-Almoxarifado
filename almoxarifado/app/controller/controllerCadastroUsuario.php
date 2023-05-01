<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\Persistencia\PersistenciaUsuario;

class ControllerCadastroUsuario extends ControllerPadrao { 

    protected function processAdicionar() { 
        $aChaves = $this->getChavesRequisicao();
        if ((new PersistenciaUsuario())->insert($aChaves)) {
            return header('location: index.php?pag=consultaUsuario');
        }
        echo 'Nao Inseriu';
    }

    protected function getChavesRequisicao() {  
        $aChaves = [
            'usunome' => "'".$_POST['firstname']."'",
            'usutelefone' => $_POST['tel'],
            'ususenha' => $_POST['senha'],
            'usucpfcnpj' => $_POST['cpfcnpj']
        ];
        $sTipoUsuario[] = $this->getTipoUsuario();
        return array_merge($aChaves, $sTipoUsuario[0]);
    }

    private function getTipoUsuario() {
        if (isset($_POST['altonivel'])) {
            return [
                'usucodigopermisao' => '1',
                'usudescricaopermisao' => "'ALTO NIVEL'"];
        } elseif (isset($_POST['medionivel'])) {
            return [
            'usucodigopermisao' => '2',
            'usudescricaopermisao' => "'MEDIO NIVEL'"];
        } elseif (isset($_POST['baixonivel'])) {
            return [
            'usucodigopermisao' => '3',
            'usudescricaopermisao' => "'BAIXO NIVEL'"];
        }
    }
}