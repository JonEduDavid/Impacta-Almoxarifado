<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelProduto,
    App\Persistencia\PersistenciaProduto;

class ViewConsultaProduto extends ViewDinamicaPadrao { 

    protected function setTitle() {
        return 'Consulta Produto';
    }

    protected function setTelaConteudo() {
        $aDadosTabela = (new ModelProduto())->getDados(new PersistenciaProduto);
        $aDadosGeral = ['title' => 'Consulta Produto',
                        'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroProduto',
                        'label' => 'Cadastrar um novo Produto.',
                        'NomeColunas' => (new PersistenciaProduto)->getNomeColunasTelaPadrao(),
                        'NomeColunasTabela' => (new PersistenciaProduto)->getNomeColunasTabela()];
        return $this->montaTelaConteudo($aDadosTabela, $aDadosGeral);
    }

}