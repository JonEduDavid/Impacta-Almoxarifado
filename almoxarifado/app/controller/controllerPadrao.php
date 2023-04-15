<?php

namespace App\Controller;

use App\View\ViewPadrao,
    App\Model\Enum\EnumPag;
use Exception;
use App\Persistencia\PersistenciaPadrao;

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
        $aBodyPagDinamica = $this->processaTelaDinamica($sPag);
        return $this->renderPageDinamica($aBodyPagDinamica);
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
     * Summary of getArquivoFromNome
     * @param mixed $sNomeArquivo
     * @return bool
     */
    public function getArquivoFromCaminhoNome($sNomeArquivo) {
        return ViewPadrao::getContentView($sNomeArquivo);  
    }

    private function processaTelaDinamica($sPag) {
        return ['title' => $this->setTitle(), //desenvolver o title.
                'header' => $this->setHeader(), //terminar de desenvolver conforme o usuario logado.
                'content' => $this->setTelaConteudo(), //
                'footer' => $this->setFooter()
        ];
    }

    /**
     * Fazer o metodo que busca o Titulo da pagina conforme o nome dela.
     */
    protected function setTitle() { }

    /**
     * 
     */
    protected function setHeader() { }

    /**
     * arruamar para buscar o arquivo corretamente conforme o nome da pagina passada.
     */
    protected function setTelaConteudo() { }
    
    protected function setFooter() { }

    public function getDados(object $oPersistencia, object $oModel) {
        var_dump($oPersistencia, $oModel);
        $aDadosPersistencia = $oPersistencia->getAllDados();
        $oModeloDados = $oModel->carregaDados($aDadosPersistencia);
        return $oModeloDados;
    }

    protected function montaTelaConteudo($sNomeTela, $aDados, $aNomeColunas, $aNomeColunaBanco) {
        return (new ViewPadrao)->montaTelaConteudo($sNomeTela, $aDados, $aNomeColunas, $aNomeColunaBanco);
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

    /**
     * Metodo responsavel por retornar o conteudo generico da pagina.
     * Tratar para ser um metodo dinamico. 
     * 
     * @return array|string
     */
    public static function renderPageDinamica($aBodyPagDinamica) {
        return ViewPadrao::renderPageDinamica('pageCompleta/telaPadrao', [ 
            'title' => $aBodyPagDinamica['title'],
            'header' => $aBodyPagDinamica['header'],  //alterar para comportar as View de Header conforme o usuario.
            'content' => $aBodyPagDinamica['content'], //alterar para possuir o conteudo da tela.
            'footer' => $aBodyPagDinamica['footer']  //alterar para possuir o rodape da pagina.
        ]);
    }
     
}
