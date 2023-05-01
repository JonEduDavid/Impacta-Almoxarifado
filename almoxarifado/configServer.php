<?php 

/**
 * Summary of ConfigServer
 */
class ConfigServer {

    /**
     * Colocar aqui as configurações referentes 
     * ao ambiente de desenvolvimento 
     * @return array
     */
    public function getConfigServer() {
        return ["host=localhost",
                "port=5432",
                "dbname=almoxarifado",
                "user=postgres",
                "password=123"];
    }
}

