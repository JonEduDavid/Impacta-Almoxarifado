<?php

/**
 * 
 */
class Rotas {

    /**
     * Responsavel por chamar o controller responsavel da tela.
     * 
     * @param string $sPag
     * @return object|string
     */
    public static function getRotas($sPag) {
        switch($sPag) {
            case 'login' :
                return (new \App\Controller\ControllerLogin)->processamentoPadrao($sPag); 
            case 'consultaUsuario' :
                return (new \App\Controller\ControllerConsultaUsuario)->processamentoPadrao($sPag);  //verificar o nome da funcao responsavel por renderizar a tela.
            case 'cadastroUsuario' :
                return (new \App\Controller\ControllerCadastroUsuario)->processamentoPadrao($sPag);  //verificar o nome da funcao responsavel por renderizar a tela.
        }
        return "Not Found - 404";
    }
    
} 