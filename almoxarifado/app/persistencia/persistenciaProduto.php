<?php

namespace App\Persistencia;

use App\Persistencia\PersistenciaPadrao;

class PersistenciaProduto extends PersistenciaPadrao {

    protected function getNomeSchemaTabela() {
        return 'WAX.tbproduto';
    }

    public function getNomeColunasTabela() {
        return [
            'proid',
            'forid',
            'pronome',
            'procodigo',
            'provalor',
            'provalidade',
            'proquantidade'
        ];
    } 

    public function getNomeColunasTelaPadrao() {
        return [
            'Id Produto',
            'Id Fornecedor',
            'Nome Produto',
            'Codigo Produto',
            'Valor Produto',
            'Validade Produto',
            'Quantidade Produto'
        ];
    }

}