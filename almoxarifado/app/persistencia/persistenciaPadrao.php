<?php

namespace App\Persistencia;

use mysqli;

/**
 * Summary of PersistenciaPadrao
 */
class PersistenciaPadrao {

    // static $conexao = pg_pconnect("host=127.0.0.1 port=5432 dbname=postgres user=postgres password=123");

    protected function getNomeSchemaTabela() { }

    /**
     * Summary of getAllDados
     * @return 
     */
    public function getAllDados() { 

        $hostname = 'localhost';
        $dbname = 'almoxarifado';
        $usuario = 'postgres';
        $senha = '123';
        $port = '5432';

        $mysqli = new mysqli($hostname, $dbname, $senha, $usuario, $port);

        if ($mysqli->connect_errno) {
            return "falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
        } else {
            return "Conectado ao Banco de Dados";
        }
    

        // // $sCon = "host=localhost port=5432 dbname=WAX.tbusuario user=postgres password=123";
        // // $oConexao = pg_connect($sCon);
        // // var_dump($oConexao);
        
        // $sQuery = 'SELECT * FROM' .$this->getNomeSchemaTabela();
        // $oResult = pg_query($oConexao, $sQuery);
        // $aData = [];
        // while ($aResultado = pg_fetch_assoc($oResult)) {
        //     $aData[] = $aResultado;
        // }
        // return $aData;
    }


    // public function insert() {
    //     $oConexao = $this->conexao;
    // }

    // public function update() {
    //     $oConexao = $this->conexao;
    // }

    // public function delete() {
    //     $oConexao = $this->conexao;
    // }

}