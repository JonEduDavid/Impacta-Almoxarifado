<?php

namespace App\Model;

use App\Model\ModelPadrao,
    App\Persistencia\PersistenciaUsuario;

/**
 * Summary of ModelUsuario
 */
class ModelUsuario extends ModelPadrao {

    public function carregaDados($aDadosPersistencia) {
        $aCamposModel = $this->getCamposModel();
        return $this->carregaDadosModel($aCamposModel, $aDadosPersistencia);
    }

    protected function getCamposModel() {
        return (new PersistenciaUsuario)->getNomeColunasTabela();
    }

}