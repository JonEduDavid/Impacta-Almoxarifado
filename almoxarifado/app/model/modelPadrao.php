<?php

namespace App\Model;

class ModelPadrao {

    public function getDados($oPersistencia) {
        return $aDados = $oPersistencia->getAllDados();
    }
    
}
