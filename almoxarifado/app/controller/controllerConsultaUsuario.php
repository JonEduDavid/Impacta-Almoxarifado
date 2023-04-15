<?php

namespace App\Controller;

use App\Controller\ControllerPadrao,
    App\Persistencia\PersistenciaUsuario,
    App\View\PageDinamica\Header;

class ControllerConsultaUsuario extends ControllerPadrao {

    protected function setTitle() {
        return 'Consulta Usuario';
    }

    protected function setHeader() {
        $sCaminhoNomeArquivo = 'pageDinamica/header/altoNivel';
        return $this->getArquivoFromCaminhoNome($sCaminhoNomeArquivo);
    }

    protected function setTelaConteudo() {
        // $aDados = $this->getDados(new ModelUsuario, new ModelUsuario);

        $aDados1 = ['usuid' => 1, 
                    'usunome' => 'Joao Eduardo Lima David', 
                    'usucpfcnpj' => '111.222.333-01',
                    'usutelefone' => '+55 011 987606707',
                    'usudescricaopermisao' => 'Alto Nivel'];

        $aDados2 = ['usuid' => 2, 
                    'usunome' => 'Rosililia Lima David', 
                    'usucpfcnpj' => '12345',
                    'usutelefone' => '12345',
                    'usudescricaopermisao' => 'Alto Nivel'];

        $aDados[] = $aDados1; 
        $aDados[] = $aDados2;
        $sNomeTela = 'Consulta Usuario';
        return $this->montaTelaConteudo($sNomeTela, $aDados, (new PersistenciaUsuario)->getNomeColunasTelaPadrao(), (new PersistenciaUsuario)->getNomeColunasTabela());
    }

}