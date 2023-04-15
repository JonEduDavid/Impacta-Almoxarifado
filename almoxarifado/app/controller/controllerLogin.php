<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\Persistencia\PersistenciaUsuario,
    App\Model\ModelUsuario;

class ControllerLogin extends ControllerPadrao {

    protected function processLogin() {
        $aChavesLogin = $this->getChavesLogin();
        // $aDados = $this->getDados(new PersistenciaUsuario, new ModelUsuario);
        // if ($this->verificaAcesso($aChavesLogin, $aDados)) {
            return header('location: index.php?pag=consultaUsuario');
        // }
    } 

    private function getChavesLogin() {
        return [
            'usuario' => $_POST['usuario'],
            'senha' => $_POST['senha']
        ];
    }

    private function verificaAcesso($aChavesLogin, $aUsuariosSistema) {
        foreach ($aUsuariosSistema as $aUsuario) {
            if ($this->usuarioLogin($aChavesLogin, $aUsuario) && $this->usuarioSenha($aChavesLogin, $aUsuario) ) {
                return true;
            }
        }
        return false;
    }

    private function usuarioLogin($aChavesLogin, $aUsuario) {
        return $aUsuario['usuarioId'] == $aChavesLogin['usuario'];
    }

    private function usuarioSenha($aChavesLogin, $aUsuario) {
        return $aUsuario['usuarioSenha'] == $aChavesLogin['senha'];
    }


 }