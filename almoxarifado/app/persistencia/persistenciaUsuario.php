<?php

namespace App\Persistencia;

use App\Persistencia\PersistenciaPadrao,
    App\Persistencia\Querry\Querry;

class PersistenciaUsuario extends PersistenciaPadrao {

    protected function getNomeSchemaTabela() {
        return 'WAX.tbusuario';
    }

    public function getNomeColunasTabela() {
        return [
            'usuid',
            'usunome',
            'usucpfcnpj',
            'usutelefone',
            'usudescricaopermisao',
        ];
    } 

    public function getNomeColunasTelaPadrao() {
        return [
            'Id Usuario',
            'Nome Completo',
            'CPF/CNPJ',
            'Telefone',
            'Descricao do Nivel do Usuario',
        ];
    }

    public function verificaLogin() {
        $oQuery = New Querry;
        $scrpit = $oQuery->set_select('usuid, ususenha');
        $scrpit .= $oQuery->set_tabela($this->getNomeSchemaTabela());
        return $this->select($scrpit);
    }

    public function tipoUsuarioLogado() {
        $iUsuId = $this->getUserId();
        $oQuery = New Querry;
        $scrpit = $oQuery->set_select('usucodigopermisao');
        $scrpit .= $oQuery->set_tabela($this->getNomeSchemaTabela());
        $scrpit .= $oQuery->set_where('usuid = '.$iUsuId);
        return $this->select($scrpit);
    }

    public function nomeUsuario($aParam) {
        $oQuery = New Querry;
        $scrpit = $oQuery->set_select('usunome');
        $scrpit .= $oQuery->set_tabela($this->getNomeSchemaTabela());
        $scrpit .= $oQuery->set_where('usuid = '.$aParam);
        return $this->select($scrpit);
    }
}