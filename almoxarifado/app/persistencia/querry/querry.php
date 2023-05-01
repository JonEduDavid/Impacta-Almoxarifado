<?php

namespace App\Persistencia\Querry;

class Querry {

    const JOIN     = 1,
        INNER_JOIN = 2,      
        LEFT_JOIN  = 3,
        RIGHT_JOIN = 4,
        FULL_JOIN  = 5;

    const AND = 1,
        OR = 2;

    public function set_select($sQuerry = null) {
        return 'SELECT ' .$sQuerry;
    } 

    public function set_tabela($sQuerry) {
        return ' FROM ' .$sQuerry;
    }

    public function set_join($iTipoJoin = null, $sTabela, $sUsing) {
        switch($iTipoJoin) {
            case self::JOIN:
                return ' JOIN '.$this->montaJoin($sTabela, $sUsing);
            case self::INNER_JOIN:
                return ' INNER JOIN '.$this->montaJoin($sTabela, $sUsing);
            case self::LEFT_JOIN:
                return ' LEFT JOIN '.$this->montaJoin($sTabela, $sUsing);
            case self::RIGHT_JOIN:
                return ' RIGHT JOIN '.$this->montaJoin($sTabela, $sUsing);
            case self::FULL_JOIN:
                return ' FULL JOIN '.$this->montaJoin($sTabela, $sUsing);
        }
    }

    private function montaJoin($sTabela, $sUsing) {
        return $sTabela. ' USING (' .$sUsing. ')';
    }

    public function set_where($sCondicao) {
        return ' WHERE ' .$sCondicao;
    }

    public function adicionaCondicaoWhere($iTipoCondicao, $sCondicao) {
        switch($iTipoCondicao) {
            case self::AND:
                return ' AND '.$sCondicao;
            case self::OR:
                return ' OR '.$sCondicao;
        }
    }
}