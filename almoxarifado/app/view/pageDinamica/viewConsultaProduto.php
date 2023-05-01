<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelProduto,
    App\Persistencia\PersistenciaProduto;

class ViewConsultaProduto extends ViewDinamicaPadrao { 

    protected function setTitle() {
        return ['title' => 'Consulta Produto',
                'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroProduto',
                'label' => 'Cadastrar um novo Produto.'];
    }

    protected function setHeader() {
        $sCaminhoNomeArquivo = 'pageDinamica/header/altoNivel';
        return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
    }

    protected function setTelaConteudo() {
        $aDados = (new ModelProduto())->getDados(new PersistenciaProduto);
        return $this->montaTelaConteudo($this->setTitle(), $aDados, (new PersistenciaProduto)->getNomeColunasTelaPadrao(), (new PersistenciaProduto)->getNomeColunasTabela());
    }

}