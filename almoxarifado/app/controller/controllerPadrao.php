<?php

namespace App\Controller;

use App\Persistencia\PersistenciaPadrao;
use App\View\ViewPadrao,
    App\Model\Enum\EnumPag,
    App\View\PageDinamica\viewDinamicaPadrao;


/**
 * Classe responsavel pelo comportamento estrutural do sistema.
 */
class ControllerPadrao {

    public function processamentoPadrao($sPag) {
        $this->processaAction($sPag);
        return $this->criaTela($sPag);
    }

    protected function processaAction($sPag) {
        if ($sAction = $_GET['act'] ??= '') {
            $this->verificaTipoAction($sAction);
        }
    }

    private function verificaTipoAction($sAction) {
        switch ($sAction) {
            case 'adicionar':
                return $this->processAdicionar();
            case 'update':
                return $this->processUpdate();
            case 'delete':
                return $this->processDelete();
            case 'logaSistema':
                return $this->processLogin();
        }
        return;
    }

    protected function processAdicionar() { }

    protected function processUpdate() { }

    protected function processDelete() { }

    protected function processLogin() { }

    protected function getChavesRequisicao() { }

    /**
     * Processa a criacao de tela.
     * 
     * @param string $sPag
     * @return string
     */
    private function criaTela($sPag) {
        if ($this->verificaPagCompleta($sPag)) {
            return $this->renderPageCompleta($this->buscaNomeArquivoPag($sPag));
        }
        return (new ViewDinamicaPadrao())->processaPagDinamica($sPag);
    } 

    /**
     * Verifica se a tela é do tipo Tela Completa.
     * 
     * @param string $sPag
     * @return bool
     */
    private function verificaPagCompleta($sPag) {
        foreach(EnumPag::getPagCompleta() as $sPagEnum) {
            if ($sPagEnum == $sPag) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Busca o nome da pagina para renderizar.
     * 
     * @param string $sPag
     * @return string
     */
    private function buscaNomeArquivoPag($sPag) {
            $aPages = EnumPag::getPagNomeCompleta();
            return $aPages[$sPag];
    }

    /**
     * Esse metodo vai ser alterado para uma metodo de chamada de paginas staticas
     * Tratar para ser um metodo dinamico. 
     * 
     * @return string
     */
    public static function renderPageCompleta($sNomePag) {
        return ViewPadrao::renderPageCompleta($sNomePag);
    }
     
}
