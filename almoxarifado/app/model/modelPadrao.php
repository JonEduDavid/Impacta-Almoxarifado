<?php

namespace App\Model;

class ModelPadrao {

    protected function getCamposModel() { }


    protected function carregaDadosModel($aCamposModel, $aDadosPersistencia) {
        return array_merge($aCamposModel, $aDadosPersistencia);
    }
}
