<?php

namespace App\Persistencia;

use App\Persistencia\PersistenciaPadrao;

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
}