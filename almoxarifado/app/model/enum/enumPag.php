<?php

namespace App\Model\Enum;

class EnumPag { //alterar para o nome EnumNomeArquivo.

    public static function getPagCompleta() {
        return ["login", "cadastroUsuario", "cadastroFornecedor", "cadastroProduto"];
    }

    public static function getPagNomeCompleta() { //ajustar para ter o nome getPagNomeTelaCompleta.
        return [
            "login" => 'pageCompleta/login',
            "cadastroUsuario" => 'pageCompleta/telaCadastroUsuario',
            "cadastroFornecedor" => 'pageCompleta/telaCadastroFornecedor',
            "cadastroProduto" => 'pageCompleta/telaCadastroProduto'
        ];
    }

}