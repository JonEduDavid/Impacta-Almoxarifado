<?php

namespace App\Persistencia;

use App\Persistencia\Client\ClientSession as ClientClientSession;
use App\Persistencia\Connection\Connection;
use App\Persistencia\Querry\Querry;

/**
 * Summary of PersistenciaPadrao
 */
class PersistenciaPadrao extends ClientClientSession {

    protected function getNomeSchemaTabela() { }

    protected function getNomeColunasTabela() { }

    protected function getNomeColunasTelaPadrao() { }

    public function getAllDados() {
        $oQuery = new Querry;
        $sScrit = $oQuery->set_select('*');
        $sScrit .= $oQuery->set_tabela($this->getNomeSchemaTabela());
        return $this->select($sScrit);
    }

    protected function select($sQuerry) {
        $oConnection = (new Connection())->connection();
        $oResult = pg_query($oConnection, $sQuerry);
        $aData = [];
        while ($aResultado = pg_fetch_assoc($oResult)){
            $aData[] = $aResultado;
        }
        return $aData;
    }

    public function insert($sQuerry) {
        $oConnection = (new Connection())->connection();
        $sSql = 'INSERT INTO '.$this->getNomeSchemaTabela(). '('.implode(',', array_keys($sQuerry)). ') VALUES ('.implode(',', array_values($sQuerry)). ') ';
        return pg_query($oConnection, $sSql);
    }

    protected function update() {
        //pega a query e execulta a alteracao no banco.
    }

    protected function delete() {
        //pega a query e execulta a exclusao do dados se possivel.
    }

}