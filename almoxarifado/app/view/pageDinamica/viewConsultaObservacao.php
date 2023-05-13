<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelObservacao,
    App\Persistencia\PersistenciaObservacao;

class ViewConsultaObservacao extends ViewDinamicaPadrao {

    protected function setTitle() {
        return 'Consulta Observação';
    }

    protected function setTelaConteudo() {
        $aDadosTabela = (new ModelObservacao())->getDados(new PersistenciaObservacao);
        $aDadosGeral = ['title' => 'Consulta Observação',
                        'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroObservacao',
                        'label' => 'Cadastrar uma nova Observação',
                        'NomeColunas' => (new PersistenciaObservacao)->getNomeColunasTelaPadrao(),
                        'NomeColunasTabela' => (new PersistenciaObservacao)->getNomeColunasTabela()];
        return $this->montaTelaConteudo($aDadosTabela, $aDadosGeral);
    }
}