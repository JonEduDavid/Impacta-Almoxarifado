<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelFornecedor,
    App\Persistencia\PersistenciaFornecedor;

class ViewConsultaFornecedor extends ViewDinamicaPadrao { 

    protected function setTitle() {
        return ['title' => 'Consulta Fornecedor',
                'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroFornecedor',
                'label' => 'Cadastrar um novo Fornecedor.'];
    }

    protected function setHeader() {
        $sCaminhoNomeArquivo = 'pageDinamica/header/altoNivel';
        return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
    }

    protected function setTelaConteudo() {
        $aDados = (new ModelFornecedor())->getDados(new PersistenciaFornecedor);
        return $this->montaTelaConteudo($this->setTitle(), $aDados, (new PersistenciaFornecedor)->getNomeColunasTelaPadrao(), (new PersistenciaFornecedor)->getNomeColunasTabela());
    }

}