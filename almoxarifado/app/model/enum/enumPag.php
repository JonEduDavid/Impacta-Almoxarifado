<?php

namespace App\Model\Enum;

class EnumPag { //alterar para o nome EnumNomeArquivo.

    const PAG_COMPLETA_LOGIN = 'pageCompleta/login';
 



    public static function getPagDinamica() {
        return ["telaPadrao"];
    }

    public static function getPagCompleta() {
        return ["login", "telaCadastro"];
    }


    public static function getHeaderTipoUsuario() {
        return [
            'Alto Nivel' => 'altoNivel',
            'Medio Nivel' => 'medioNivel',
            'Baixo Nivel' => 'baixoNivel'
        ];
    }

    public static function getNomeConteudoTelaDinamica() {
        return [
            "consultaUsuario" => 'telaConsultaUsuario'
        ];
    }

    public static function getPagNomeCompleta() { //ajustar para ter o nome getPagNomeTelaCompleta.
        return [
            "login" => 'pageCompleta/login'
        ];
    }

}