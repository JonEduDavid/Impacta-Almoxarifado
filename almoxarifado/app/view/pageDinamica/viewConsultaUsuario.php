<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelUsuario,
    App\Persistencia\PersistenciaUsuario;

class ViewConsultaUsuario extends ViewDinamicaPadrao { 

    protected function setTitle() {
        return 'Consulta Usuario';
    }

    protected function setTelaConteudo() {
        $aDadosTabela = (new ModelUsuario())->getDados(new PersistenciaUsuario);
        $aDadosGeral = ['title' => 'Consulta Usuario',
                        'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroUsuario',
                        'label' => 'Cadastrar um novo Usuario.',
                        'NomeColunas' => (new PersistenciaUsuario)->getNomeColunasTelaPadrao(),
                        'NomeColunasTabela' => (new PersistenciaUsuario)->getNomeColunasTabela()];
        return $this->montaTelaConteudo($aDadosTabela, $aDadosGeral);
    }

}