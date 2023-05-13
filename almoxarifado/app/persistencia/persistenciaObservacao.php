<?php

namespace App\Persistencia;

use App\Persistencia\PersistenciaPadrao;

class PersistenciaObservacao extends PersistenciaPadrao {

    protected function getNomeSchemaTabela() {
        return 'WAX.tbobservacao';
    }

    public function getNomeColunasTabela() {
        return ['obsobservacao',
                'obsquantidadeproduto'];
    }

    public function getNomeColunasTelaPadrao() {
    return ['Observação',
            'Quantidade Produto'];
    }

}