<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\Persistencia\PersistenciaUsuario,
    App\Persistencia\Client\ClientSession;

class ControllerLogin extends ControllerPadrao {

    protected function processLogin() {
        $aChavesLogin = $this->getChavesLogin();
        if ($this->verificaAcesso($aChavesLogin)) {
            return header('location: index.php?pag=consultaUsuario');
        }
        echo '<script>alert("O Usuario ou senha errado.")</script>';
    } 

    private function getChavesLogin() {
        return [
            'usuario' => $_POST['usuario'],
            'senha' => $_POST['senha']
        ];
    }

    private function verificaAcesso($aChavesLogin) {
        $aUsuariosSistema = (new PersistenciaUsuario)->verificaLogin();
        foreach ($aUsuariosSistema as $aUsuario) {
            if ($this->usuarioLogin($aChavesLogin, $aUsuario) && $this->usuarioSenha($aChavesLogin, $aUsuario) ) {
                $oSession = (new ClientSession());
                $oSession->login($aUsuario['usuid']);
                return true;
            }
        }
    }

    private function usuarioLogin($aChavesLogin, $aUsuario) {
        return $aUsuario['usuid'] == $aChavesLogin['usuario'];
    }

    private function usuarioSenha($aChavesLogin, $aUsuario) {
        return $aUsuario['ususenha'] == $aChavesLogin['senha'];
    }


 }