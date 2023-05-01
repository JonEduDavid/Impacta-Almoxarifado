<?php

namespace App\View\PageDinamica;

use App\View\ViewPadrao,
    App\View\PageDinamica\Content\MontaTelaConteudo;

class ViewDinamicaPadrao {

    public function processaPagDinamica($sPag) {
        switch($sPag) {
            case 'consultaUsuario' :
                return (new \App\View\PageDinamica\ViewConsultaUsuario)->processaTelaDinamica();
            case 'consultaProduto' :
                return (new \App\View\PageDinamica\ViewConsultaProduto)->processaTelaDinamica();
            case 'consultaFornecedor' :
                return (new \App\View\PageDinamica\ViewConsultaFornecedor)->processaTelaDinamica();
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
    private function setTitle() {
        
    }

    /**
     * 
     */
    protected function setHeader() { }

    /**
     * arruamar para buscar o arquivo corretamente conforme o nome da pagina passada.
     */
    protected function setTelaConteudo() { }
    

    protected function setFooter() { }


    public function montaTelaConteudo($sNomeTela, $aDados, $aNomeColunas, $aNomeColunaBanco) {
        return MontaTelaConteudo::getTelaConteudo($sNomeTela, $aDados, $aNomeColunas , $aNomeColunaBanco);
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