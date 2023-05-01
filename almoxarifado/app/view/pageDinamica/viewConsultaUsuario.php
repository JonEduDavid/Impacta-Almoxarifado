<?php

namespace App\View\PageDinamica;

use App\View\PageDinamica\ViewDinamicaPadrao,
    App\Model\ModelUsuario,
    App\Persistencia\PersistenciaUsuario;

class ViewConsultaUsuario extends ViewDinamicaPadrao { 

    protected function setTitle() {
        return ['title' => 'Consulta Usuario',
                'href' => 'http://localhost/almoxarifado/index.php?pag=cadastroUsuario',
                'label' => 'Cadastrar um novo usuario.'];
    }

    protected function setHeader() {
        $sCaminhoNomeArquivo = 'pageDinamica/header/altoNivel';
        return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
    }

    protected function setTelaConteudo() {
        $aDados = (new ModelUsuario())->getDados(new PersistenciaUsuario);
        return $this->montaTelaConteudo($this->setTitle(), $aDados, (new PersistenciaUsuario)->getNomeColunasTelaPadrao(), (new PersistenciaUsuario)->getNomeColunasTabela());
    }

}