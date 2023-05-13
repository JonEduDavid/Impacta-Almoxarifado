<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelFornecedor,
    App\Persistencia\PersistenciaFornecedor;

class ViewConsultaFornecedor extends ViewDinamicaPadrao { 

    protected function setTitle() {
        return 'Consulta Fornecedor';
    }

    protected function setTelaConteudo() {
        $aDadosTabela = (new ModelFornecedor())->getDados(new PersistenciaFornecedor);
        $aDadosGeral = ['title' => 'Consulta Fornecedor',
                        'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroFornecedor',
                        'label' => 'Cadastrar um novo Fornecedor.',
                        'NomeColunas' => (new PersistenciaFornecedor)->getNomeColunasTelaPadrao(),
                        'NomeColunasTabela' => (new PersistenciaFornecedor)->getNomeColunasTabela()];
        return $this->montaTelaConteudo($aDadosTabela, $aDadosGeral);
    }

}