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
                return (new \App\Controller\ControllerConsultaUsuario)->processamentoPadrao($sPag);
            case 'cadastroUsuario' :
                return (new \App\Controller\ControllerCadastroUsuario)->processamentoPadrao($sPag);
            case 'consultaFornecedor' :
                return (new \App\Controller\ControllerConsultaFornecedor)->processamentoPadrao($sPag);
            case 'cadastroFornecedor' :
                // return (new \App\Controller\)->processamentoPadrao($sPag);
            case 'consultaProduto' :
                return (new \App\Controller\ControllerConsultaProduto)->processamentoPadrao($sPag);
            case 'cadastroProduto' :
                // return (new \App\Controller\)->processamentoPadrao($sPag);
        }
        return "Nao encontrado a pagina";
    }
    
} 