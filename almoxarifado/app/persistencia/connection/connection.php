<?php

namespace App\Persistencia\Connection;

use ConfigServer;

class Connection {

    public function connection() {
        $sParam = $this->getConfigServer();
        $db = pg_connect($sParam);
            if(!$db) {
                $errormessage=pg_last_error();
                echo "Error 0: " . $errormessage;
                exit();
            }
        return $db;
    }

    private function getConfigServer() {
        $aConfig = (new ConfigServer())->getConfigServer();
        return $this->trataConfigServer($aConfig);
    }

    private function trataConfigServer($aConfig) {
        $sConfig = '';
        foreach($aConfig as $dadosConfig) {
            $sConfig .= $dadosConfig.' ';
        }
        return $sConfig;
    }
}