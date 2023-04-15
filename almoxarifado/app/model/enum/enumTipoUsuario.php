<?php

namespace App\Model\Enum;

class EnumTipoUsuario {

    public static function getHeaderTipoUsuario() {
        return [
            'Alto Nivel' => 'altoNivel',
            'Medio Nivel' => 'medioNivel',
            'Baixo Nivel' => 'baixoNivel'
        ];
    }

}