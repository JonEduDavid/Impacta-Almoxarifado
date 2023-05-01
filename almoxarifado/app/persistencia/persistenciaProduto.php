<?php

namespace App\Persistencia;

use App\Persistencia\PersistenciaPadrao;

class PersistenciaProduto extends PersistenciaPadrao {

    protected function getNomeSchemaTabela() {
        return 'WAX.tbusuario';
    }

    public function getNomeColunasTabela() {
        return [
            '',
            '',
            '',
            '',
            '',
        ];
    } 

    public function getNomeColunasTelaPadrao() {
        return [
            '',
            '',
            '',
            '',
            '',
        ];
    }

}