<?php

namespace App\Persistencia;

use App\Persistencia\PersistenciaPadrao;

class PersistenciaFornecedor extends PersistenciaPadrao {

    protected function getNomeSchemaTabela() {
        return 'WAX.tbfornecedor';
    }

    public function getNomeColunasTabela() {
        return [
            'forid',
            'fornome',
            'forcpfcnpj',
            'foremail',
            'fortelefone',
            'forendereco',
            'foruf'];
    } 

    public function getNomeColunasTelaPadrao() {
        return [
            'Id Fonecedor',
            'Nome Fornecedor',
            'Cpf/Cnpj Fornecedor',
            'E-Mail Fornecedor',
            'Telefone Fornecedor',
            'Endereço Fornecedor',
            'UF Fornecedor'];
    }

}