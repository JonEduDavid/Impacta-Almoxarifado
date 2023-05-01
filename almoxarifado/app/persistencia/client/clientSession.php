<?php

namespace App\Persistencia\Client;

/**
 * Classe de Seção do cliente.
 */
class ClientSession {

    /**
     * Quando chamado a classe inicia a seção.
     */
    function __construct() {
        $this->init();
    }

    /**
     * Inicia a sessão caso ainda não tenha sido iniciada
     * @return void
     */
    private function init() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Armazena o id do usuário na sessão atual se já nao estiver logado.
     * @param $xIdUser mixed
     */
    function login($xIdUser) {
        if ($this->isLogged()) {
            $this->logout();
        }
        $_SESSION['userid'] = $xIdUser;
    }

    /**
     * Remove o usuário da sessão
     * @return bool
     */
    function logout() {
        if ($this->isLogged()) {
            unset($_SESSION['userid']);
            return true;
        }
        return false;
    }

    /**
     * Verifica se tem um usuário logado
     * @return bool
     */
    function isLogged() {
        return isset($_SESSION['userid']) && !empty($_SESSION['userid']);
    }

    /**
     * Retorna o id do usuário armazenado na sessão
     * @return mixed
     */
    function getUserId() {
        if ($this->isLogged()) {
            return $_SESSION['userid'];
        }
        return false;
    }

}