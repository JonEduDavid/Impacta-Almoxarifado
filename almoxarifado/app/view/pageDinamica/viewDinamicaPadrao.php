<?php

namespace App\View\PageDinamica;

use App\View\ViewPadrao,
    App\View\PageDinamica\Content\MontaTelaConteudo,
    App\Persistencia\PersistenciaUsuario;

class ViewDinamicaPadrao {

    public function processaPagDinamica($sPag) {
        switch($sPag) {
            case 'consultaUsuario' :
                return (new \App\View\PageDinamica\ViewConsultaUsuario)->processaTelaDinamica();
            case 'consultaProduto' :
                return (new \App\View\PageDinamica\ViewConsultaProduto)->processaTelaDinamica();
            case 'consultaFornecedor' :
                return (new \App\View\PageDinamica\ViewConsultaFornecedor)->processaTelaDinamica();
            case 'consultaObservacao' :
                return (new \App\View\PageDinamica\ViewConsultaObservacao)->processaTelaDinamica();
        }
        return "nao achou a pag dinamica";
    }

    protected function processaTelaDinamica() {
        return $this->renderPageDinamica($this->page());
    }

    private function page() {
        return ['title' => $this->setTitle(), 
                'header' => $this->setHeader(), 
                'content' => $this->setTelaConteudo(),
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
    protected function setHeader() { 
        $aDados = (new PersistenciaUsuario())->tipoUsuarioLogado();
        $aTipoUsuario = $aDados[0];
        switch($aTipoUsuario['usucodigopermisao']) {
            case '1':
                $sCaminhoNomeArquivo = 'pageDinamica/header/altoNivel';
                return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
            case '2':
                $sCaminhoNomeArquivo = 'pageDinamica/header/medioNivel';
                return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
            case '3':
                $sCaminhoNomeArquivo = 'pageDinamica/header/baixoNivel';
                return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
        }
    }

    /**
     * arruamar para buscar o arquivo corretamente conforme o nome da pagina passada.
     */
    protected function setTelaConteudo() { }
    

    protected function setFooter() { }


    public function montaTelaConteudo($aDadosTabela, $aDadosGeral) {
        return MontaTelaConteudo::getTelaConteudo($aDadosTabela, $aDadosGeral);
    }

    /**
     * Summary of getArquivoFromNome
     * @param mixed $sNomeArquivo
     * @return bool
     */
    public function getArquivoFromCaminhoNome($sNomeArquivo) {
        return ViewPadrao::getContentView($sNomeArquivo);  
    }

    private function renderPageDinamica($aBodyPagDinamica) {
        return ViewPadrao::renderPageDinamica('pageCompleta/telaPadrao', [ 
            'title' => $aBodyPagDinamica['title'],
            'header' => $aBodyPagDinamica['header'],
            'content' => $aBodyPagDinamica['content'], 
            'footer' => $aBodyPagDinamica['footer'] 
        ]);
    }

}